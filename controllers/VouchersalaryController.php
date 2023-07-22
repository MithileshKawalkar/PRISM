<?php

namespace app\controllers;

use Yii;
use app\models\Vouchersalary;
use app\models\Logs;
use app\models\VouchersalarySearch;
use app\models\Paymentvouchersalary;
use app\models\Deductionvouchersalary;
use app\models\Netpayvouchersalary;
use app\models\Model;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\web\ForbiddenHttpException;

/**
 * VouchersalaryController implements the CRUD actions for Vouchersalary model.
 */
class VouchersalaryController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            // Check if the user is a guest
            if (Yii::$app->user->isGuest) {
                // Redirect guests to the index page
                $this->redirect(['/site/index'])->send();
                return false;
            }
            return true;
        }
        return false;
    }


    /**
     * Lists all Vouchersalary models.
     *
     * @return string
     */
    public function actionIndex()
    {
        if(!Yii::$app->user->isGuest && Yii::$app->user->can('create-vouchersalary'))
        {
            $searchModel = new VouchersalarySearch();
            $dataProvider = $searchModel->search($this->request->queryParams);
            // Access the sent2AOA field
            $dataProvider->sort->attributes['sent2AOA'] = [
                'asc' => ['sent2AOA' => SORT_ASC],
                'desc' => ['sent2AOA' => SORT_DESC],
            ];

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        else{
            throw new ForbiddenHttpException('You do not have sufficient permissions to access this page.');
        }
    }

    /**
     * Displays a single Vouchersalary model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Vouchersalary model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    // {
    //     $model = new Vouchersalary();

    //     if ($this->request->isPost) {
    //         if ($model->load($this->request->post()) && $model->save()) {
    //             return $this->redirect(['view', 'id' => $model->id]);
    //         }
    //     } else {
    //         $model->loadDefaultValues();
    //     }

    //     return $this->render('create', [
    //         'model' => $model,
    //     ]);
    // }

    {
        if(Yii::$app->user->can('create-vouchersalary'))
        {
            $model = new Vouchersalary();
            $modelsNetpayvouchersalary = [new Netpayvouchersalary];
            $modelsPaymentvouchersalary = [new Paymentvouchersalary];
            $modelsDeductionvouchersalary = [new Deductionvouchersalary];

            // if ($this->request->isPost) {
            //     if ($modelsNetpayvouchersalary->load($this->request->post()) && $modelsNetpayvouchersalary->save()) {
            //         return $this->redirect(['view', 'id' => $model->id]);
            //     }
            // } else {
            //     $modelsNetpayvouchersalary->loadDefaultValues();
            // }
            if ($model->load(Yii::$app->request->post())) {
    
                $modelsPaymentvouchersalary = Model::createMultiple(Paymentvouchersalary::classname() );
                Model::loadMultiple($modelsPaymentvouchersalary, Yii::$app->request->post());
                $modelsDeductionvouchersalary = Model::createMultiple(Deductionvouchersalary::classname());
                Model::loadMultiple($modelsDeductionvouchersalary, Yii::$app->request->post());
                $modelsNetpayvouchersalary = Model::createMultiple(Netpayvouchersalary::classname());
                Model::loadMultiple($modelsNetpayvouchersalary, Yii::$app->request->post());
                

                // ajax validation
                // if (Yii::$app->request->isAjax) {
                //     Yii::$app->response->format = Response::FORMAT_JSON;
                //     return ArrayHelper::merge(
                //         ActiveForm::validateMultiple($modelsPaymentvouchersalary),
                //         ActiveForm::validate($model)
                //     );
                // }
    
                // validate all models
                $valid = $model->validate();
                $valid = Model::validateMultiple($modelsPaymentvouchersalary) && $valid;
                $valid = Model::validateMultiple($modelsDeductionvouchersalary) && $valid;
                $valid = Model::validateMultiple($modelsNetpayvouchersalary) && $valid;

                $model->sent2AOA = false;
                //Create an instance of the current user
                $user = Yii::$app->user;

                // You can then access properties and methods of the user instance
                $id = $user->id; 
                $model->Created_by= $id;
                $modelLogs = new Logs();
                $modelLogs->byUserId = Yii::$app->user->id;
                $modelLogs->byUserName = Yii::$app->user->identity->username;
                $modelLogs->description = "Created new voucher in salary section";

                
                if ($valid) {
                    $transaction = \Yii::$app->db->beginTransaction();
                    try {
                        if ($flag = $model->save(false)) {
                            foreach ($modelsPaymentvouchersalary as $modelPaymentvouchersalary) {
                                $modelPaymentvouchersalary->voucherid = $model->id;
                                if (! ($flag = $modelPaymentvouchersalary->save(false))) {
                                    $transaction->rollBack();
                                    break;
                                }
                            }

                            foreach ($modelsDeductionvouchersalary as $modelDeductionvouchersalary) {
                                $modelDeductionvouchersalary->voucherid = $model->id;
                                if (! ($flag = $modelDeductionvouchersalary->save(false))) {
                                    $transaction->rollBack();
                                    break;
                                }
                            }

                            foreach ($modelsNetpayvouchersalary as $modelNetpayvouchersalary) {
                                $modelNetpayvouchersalary->voucherid = $model->id;
                                if (! ($flag = $modelNetpayvouchersalary->save(false))) {
                                    $transaction->rollBack();
                                    break;
                                }
                            }
                        }
                        if ($flag) {
                            $modelLogs->save(false);
                            $transaction->commit();                            
                            return $this->redirect(['view', 'id' => $model->id]);
                        }
                    } catch (Exception $e) {
                        $transaction->rollBack();
                    }
                }
            }
    
            return $this->render('create', [
                'model' => $model,
                'modelsPaymentvouchersalary' => (empty($modelsPaymentvouchersalary)) ? [new Paymentvouchersalary] : $modelsPaymentvouchersalary,
                'modelsDeductionvouchersalary' => (empty($modelsDeductionvouchersalary)) ? [new Deductionvouchersalary] : $modelsDeductionvouchersalary,
                'modelsNetpayvouchersalary' => (empty($modelsNetpayvouchersalary)) ? [new Netpayvouchersalary] : $modelsNetpayvouchersalary,
                
            ]);

        }
        else{
            throw new ForbiddenHttpException;
        }
       
    }

    public function actionSent($id)
    {
       
        $model = $this->findModel($id);

        // if ($this->request->isPost && $model->load($this->request->post())) {
            $model->sent2AOA = "1";
            $model->status = "";
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        
    }

    public function getSent($id)
    {
       
        $model = $this->findModel($id);

            return $model->sent2AOA;
        
    }

    public function actionAcc($id)
    {
       
        $model = $this->findModel($id);

        // if ($this->request->isPost && $model->load($this->request->post())) {
            $model->status = "\u{2714}";
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        

        return $this->render('accrej', [
            'model' => $model,
        ]);
    }

    public function actionRej($id)
    {
        $model = $this->findModel($id);

        // if ($this->request->isPost && $model->load($this->request->post())) {
            $model->status = "❌";
            $model->sent2AOA = "0";
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        

        return $this->render('accrej', [
            'model' => $model,
        ]);
    }



    /**
     * Updates an existing Vouchersalary model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    // {
    //     $model = $this->findModel($id);

    //     if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
    //         return $this->redirect(['view', 'id' => $model->id]);
    //     }

    //     return $this->render('update', [
    //         'model' => $model,
    //     ]);
    // }

    {
        $model = $this->findModel($id);
        $modelsPaymentvouchersalary = $model->paymentvouchersalaries;
        $modelsDeductionvouchersalary = $model->deductionvouchersalaries;
        $modelsNetpayvouchersalary = $model->netpayvouchersalaries;
        $modelLogs = new Logs();
        $modelLogs->byUserId = Yii::$app->user->id;
        $modelLogs->byUserName = Yii::$app->user->identity->username;
        $modelLogs->description = "Updated voucher with id= ".$id." in salary section";

        if ($model->load(Yii::$app->request->post())) {

            $oldIDs = ArrayHelper::map($modelsPaymentvouchersalary, 'id', 'id');
            $modelsPaymentvouchersalary = Model::createMultiple(Paymentvouchersalary::classname(), $modelsPaymentvouchersalary);
            Model::loadMultiple($modelsPaymentvouchersalary, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsPaymentvouchersalary, 'id', 'id')));

            $oldIDs = ArrayHelper::map($modelsDeductionvouchersalary, 'id', 'id');
            $modelsDeductionvouchersalary = Model::createMultiple(Deductionvouchersalary::classname(), $modelsDeductionvouchersalary);
            Model::loadMultiple($modelsDeductionvouchersalary, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsDeductionvouchersalary, 'id', 'id')));

            $oldIDs = ArrayHelper::map($modelsNetpayvouchersalary, 'id', 'id');
            $modelsNetpayvouchersalary = Model::createMultiple(Netpayvouchersalary::classname(), $modelsNetpayvouchersalary);
            Model::loadMultiple($modelsNetpayvouchersalary, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsNetpayvouchersalary, 'id', 'id')));


            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsPaymentvouchersalary) && $valid;
            $valid = Model::validateMultiple($modelsDeductionvouchersalary) && $valid;
            $valid = Model::validateMultiple($modelsNetpayvouchersalary) && $valid;
            $model->sent2AOA = false;
            // // Create an instance of the current user
            // $user = Yii::$app->user;

            // // You can then access properties and methods of the user instance
            // $id = $user->id; 
            // print_r($id);
            // die();

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (! empty($deletedIDs)) {
                            Paymentvouchersalary::deleteAll(['id' => $deletedIDs]);
                            Deductionvouchersalary::deleteAll(['id' => $deletedIDs]);
                            Netpayvouchersalary::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelsPaymentvouchersalary as $modelPaymentvouchersalary) {
                            $modelPaymentvouchersalary->voucherid = $model->id;
                            if (! ($flag = $modelPaymentvouchersalary->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                        foreach ($modelsDeductionvouchersalary as $modelDeductionvouchersalary) {
                            $modelDeductionvouchersalary->voucherid = $model->id;
                            if (! ($flag = $modelDeductionvouchersalary->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                        foreach ($modelsNetpayvouchersalary as $modelNetpayvouchersalary) {
                            $modelNetpayvouchersalary->voucherid = $model->id;
                            if (! ($flag = $modelNetpayvouchersalary->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        $modelLogs->save(false);
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
            'modelsDeductionvouchersalary' => (empty($modelsDeductionvouchersalary)) ? [new Deductionvouchersalary] : $modelsDeductionvouchersalary,
            'modelsPaymentvouchersalary' => (empty($modelsPaymentvouchersalary)) ? [new Paymentvouchersalary] : $modelsPaymentvouchersalary,
            'modelsNetpayvouchersalary' => (empty($modelsNetpayvouchersalary)) ? [new Netpayvouchersalary] : $modelsNetpayvouchersalary
        ]);
    }

    /**
     * Deletes an existing Vouchersalary model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        $modelLogs = new Logs();
        $modelLogs->byUserId = Yii::$app->user->id;
        $modelLogs->byUserName = Yii::$app->user->identity->username;
        $modelLogs->description = "Deleted voucher with id= ".$id." in salary section";
        $modelLogs->save(false);

        return $this->redirect(['index']);
    }

    /**
     * Finds the Vouchersalary model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Vouchersalary the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Vouchersalary::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
