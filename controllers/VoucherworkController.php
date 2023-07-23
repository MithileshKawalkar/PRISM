<?php

namespace app\controllers;

use Yii;
use Mpdf\Mpdf;
use app\models\Voucherwork;
use app\models\Logs;
use app\models\VoucherworkSearch;
use app\models\Paymentvoucherwork;
use app\models\Deductionvoucherwork;
use app\models\Contractordetails;
use app\models\Netpayvoucherwork;
use app\models\Model;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\web\ForbiddenHttpException;
use yii\db\Expression;
/**
 * VoucherworkController implements the CRUD actions for Voucherwork model.
 */
class VoucherworkController extends Controller
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
     * Lists all Voucherwork models.
     *
     * @return string
     */
    public function actionIndex()
    {
        // if(!Yii::$app->user->isGuest && Yii::$app->user->can('create-voucherwork'))
        // {
        // $model = [new Voucherwork];
        // $voucherSent = Voucherwork::find()->all();
            $searchModel = new VoucherworkSearch();
            $dataProvider = $searchModel->search($this->request->queryParams);
            // Access the sent2AOA field
        $dataProvider->sort->attributes['sent2AOA'] = [
            'asc' => ['sent2AOA' => SORT_ASC],
            'desc' => ['sent2AOA' => SORT_DESC],
        ];

            return $this->render('index', [
                // 'model'=> $model,
                // 'voucherSent'=>$voucherSent,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
    // }
    // else{
    //     throw new ForbiddenHttpException('You do not have sufficient permissions to access this page.
    //     Please contact administrator if you think this is a mistake.');
    // }
    }

    public function actionShowall($showAll = false)
    {
        $searchModel = new VoucherworkSearch();

        if ($showAll) {
            $searchModel->scenario = 'showAll'; // Set the 'showAll' scenario when the button is clicked
        }

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    } 

    /**
     * Displays a single Voucherwork model.
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
     * Creates a new Voucherwork model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('create-voucherwork'))
        {
            $model = new Voucherwork();
            $modelsContractordetails = new Contractordetails();
            $modelLogs = new Logs();
            $modelsNetpayvoucherwork = [new Netpayvoucherwork];
            $modelsPaymentvoucherwork = [new Paymentvoucherwork];
            $modelsDeductionvoucherwork = [new Deductionvoucherwork];

            // if ($this->request->isPost) {
            //     if ($modelsNetpayvoucherwork->load($this->request->post()) && $modelsNetpayvoucherwork->save()) {
            //         return $this->redirect(['view', 'id' => $model->id]);
            //     }
            // } else {
            //     $modelsNetpayvoucherwork->loadDefaultValues();
            // }
            if ($model->load(Yii::$app->request->post()) ) {
    
                $modelsPaymentvoucherwork = Model::createMultiple(Paymentvoucherwork::classname() );
                Model::loadMultiple($modelsPaymentvoucherwork, Yii::$app->request->post());
                $modelsDeductionvoucherwork = Model::createMultiple(Deductionvoucherwork::classname());
                Model::loadMultiple($modelsDeductionvoucherwork, Yii::$app->request->post());
                $modelsNetpayvoucherwork = Model::createMultiple(Netpayvoucherwork::classname());
                Model::loadMultiple($modelsNetpayvoucherwork, Yii::$app->request->post());
                

                // ajax validation
                // if (Yii::$app->request->isAjax) {
                //     Yii::$app->response->format = Response::FORMAT_JSON;
                //     return ArrayHelper::merge(
                //         ActiveForm::validateMultiple($modelsPaymentvoucherwork),
                //         ActiveForm::validate($model)
                //     );
                // }
    
                // validate all models
                $valid = $model->validate();
                $valid = Model::validateMultiple($modelsPaymentvoucherwork)  && $valid;
                $valid = Model::validateMultiple($modelsDeductionvoucherwork) && $valid;
                $valid = Model::validateMultiple($modelsNetpayvoucherwork) && $valid;
                // $valid = Model::validateMultiple($modelsDeductionvoucherwork) && $valid;
                $model->sent2AOA = false;
                //Create an instance of the current user
                $user = Yii::$app->user;

                // You can then access properties and methods of the user instance
                $id = $user->id; 
                $model->Created_by= $id;
                $modelLogs->byUserId = $id;
                $modelLogs->byUserName = Yii::$app->user->identity->username;
                $modelLogs->description = "Created new voucher- works section";
                // $modelLogs->time = new Expression('NOW()');


                
                if ($valid) {
                    $transaction = \Yii::$app->db->beginTransaction();
                    try {
                        if ($flag = $model->save(false)) {
                            foreach ($modelsPaymentvoucherwork as $modelPaymentvoucherwork) {
                                $modelPaymentvoucherwork->voucherid = $model->id;
                                if (! ($flag = $modelPaymentvoucherwork->save(false))) {
                                    $transaction->rollBack();
                                    break;
                                }
                            }

                            foreach ($modelsDeductionvoucherwork as $modelDeductionvoucherwork) {
                                $modelDeductionvoucherwork->voucherid = $model->id;
                                if (! ($flag = $modelDeductionvoucherwork->save(false))) {
                                    $transaction->rollBack();
                                    break;
                                }
                            }
                            foreach ($modelsNetpayvoucherwork as $modelNetpayvoucherwork) {
                                $modelNetpayvoucherwork->voucherid = $model->id;
                                if (! ($flag = $modelNetpayvoucherwork->save(false))) {
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
    
            return $this->render('create', [
                'model' => $model,
                'modelsContractordetails'=>$modelsContractordetails,
                'modelsNetpayvoucherwork' => (empty($modelsNetpayvoucherwork)) ? [new Netpayvoucherwork] : $modelsNetpayvoucherwork,
                'modelsPaymentvoucherwork' => (empty($modelsPaymentvoucherwork)) ? [new Paymentvoucherwork] : $modelsPaymentvoucherwork,
                'modelsDeductionvoucherwork' => (empty($modelsDeductionvoucherwork)) ? [new Deductionvoucherwork] : $modelsDeductionvoucherwork,
                

            ]);

        }
        else{
            throw new ForbiddenHttpException;
        }
       
    }


    public function actionGeneratePdf()
    {
        // Create an instance of the mPDF class
        $mpdf = new Mpdf();

        // Render the form view as HTML
        $html = $this->renderPartial('form-view', [
            'model' => $model, // Replace with your form model
        ]);

        // Generate the PDF from the HTML
        $mpdf->WriteHTML($html);

        // Output the PDF file to the browser
        $mpdf->Output('form.pdf', 'D');
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

            $modelLogs = new Logs();   
            $modelLogs->byUserId = Yii::$app->user->id;
            $modelLogs->byUserName = Yii::$app->user->identity->username;
            $modelLogs->description = "Voucher Id: ".$id." Accepted by AAO and sent to cashier";
            $modelLogs->save(false);

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
            
            $modelLogs = new Logs();   
            $modelLogs->byUserId = Yii::$app->user->id;
            $modelLogs->byUserName = Yii::$app->user->identity->username;
            $modelLogs->description = "Voucher Id: '".$id."' Rejected by AAO, sentback to user";
            $modelLogs->save(false);

            return $this->redirect(['view', 'id' => $model->id]);
        

        return $this->render('accrej', [
            'model' => $model,
        ]);
    }


    /**
     * Updates an existing Voucherwork model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */

         // {
    //     $model = $this->findModel($id);

    //     if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
    //         return $this->redirect(['view', 'id' => $model->id]);
    //     }

    //     return $this->render('update', [
    //         'model' => $model,
    //          'modelsPaymentvoucherwork' => (empty($modelsPaymentvoucherwork)) ? [new Paymentvoucherwork] : $modelsPaymentvoucherwork,
    //     ]);
    // && $modelsNetpayvoucherwork->save()
    // }
    public function actionUpdate($id)

    {
        $model = $this->findModel($id);
        $modelLogs = new Logs();
        $modelsPaymentvoucherwork = $model->paymentvoucherworks;
        $modelsDeductionvoucherwork = $model->deductionvoucherworks;
        $modelsNetpayvoucherwork = $model->netpayvoucherworks;
        
        $modelLogs->byUserId = Yii::$app->user->id;
        $modelLogs->byUserName = Yii::$app->user->identity->username;
        $modelLogs->description = "Updated voucher with id= ".$id." in works section";

        if ($model->load(Yii::$app->request->post()) ) {

            $oldIDs = ArrayHelper::map($modelsPaymentvoucherwork, 'id', 'id');
            $modelsPaymentvoucherwork = Model::createMultiple(Paymentvoucherwork::classname(), $modelsPaymentvoucherwork);
            Model::loadMultiple($modelsPaymentvoucherwork, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsPaymentvoucherwork, 'id', 'id')));


            $oldIDs = ArrayHelper::map($modelsDeductionvoucherwork, 'id', 'id');
            $modelsDeductionvoucherwork = Model::createMultiple(Deductionvoucherwork::classname(), $modelsDeductionvoucherwork);
            Model::loadMultiple($modelsDeductionvoucherwork, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsDeductionvoucherwork, 'id', 'id')));

            
            $oldIDs = ArrayHelper::map($modelsNetpayvoucherwork, 'id', 'id');
            $modelsNetpayvoucherwork = Model::createMultiple(Netpayvoucherwork::classname(), $modelsNetpayvoucherwork);
            Model::loadMultiple($modelsNetpayvoucherwork, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsNetpayvoucherwork, 'id', 'id')));

           
            
            
            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsPaymentvoucherwork) && $valid;
            $valid = Model::validateMultiple($modelsDeductionvoucherwork) && $valid;
            $valid = Model::validateMultiple($modelsNetpayvoucherwork) && $valid;

            if ($valid ) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (! empty($deletedIDs)) {
                            Paymentvoucherwork::deleteAll(['id' => $deletedIDs]);
                            Deductionvoucherwork::deleteAll(['id' => $deletedIDs]);
                            Netpayvoucherwork::deleteAll(['id' => $deletedIDs]);
                            
                        }
                        foreach ($modelsPaymentvoucherwork as $modelPaymentvoucherwork) {
                            $modelPaymentvoucherwork->voucherid = $model->id;
                            if (! ($flag = $modelPaymentvoucherwork->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                        foreach ($modelsDeductionvoucherwork as $modelDeductionvoucherwork) {
                            $modelDeductionvoucherwork->voucherid = $model->id;
                            if (! ($flag = $modelDeductionvoucherwork->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                        foreach ($modelsNetpayvoucherwork as $modelNetpayvoucherwork) {
                            $modelNetpayvoucherwork->voucherid = $model->id;
                            if (! ($flag = $modelNetpayvoucherwork->save(false))) {
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

        return $this->render('update', [
            'model' => $model,
            'modelsNetpayvoucherwork' => (empty($modelsNetpayvoucherwork)) ? [new Netpayvoucherwork] : $modelsNetpayvoucherwork,
            'modelsPaymentvoucherwork' => (empty($modelsPaymentvoucherwork)) ? [new Paymentvoucherwork] : $modelsPaymentvoucherwork,
            'modelsDeductionvoucherwork' => (empty($modelsDeductionvoucherwork)) ? [new Deductionvoucherwork] : $modelsDeductionvoucherwork

        ]);
    }

    /**
     * Deletes an existing Voucherwork model.
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
        $modelLogs->description = "Deleted voucher with id= ".$id." in works section";
        $modelLogs->save(false);

        return $this->redirect(['index']);
    }

    /**
     * Finds the Voucherwork model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Voucherwork the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Voucherwork::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
