<?php

namespace app\controllers;

use Yii;
use app\models\Challanwork;
use app\models\Logs;
use app\models\ChallanworkSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

/**
 * ChallanworkController implements the CRUD actions for Challanwork model.
 */
class ChallanworkController extends Controller
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
     * Lists all Challanwork models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ChallanworkSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Challanwork model.
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
     * Creates a new Challanwork model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('create-voucherwork'))
        {
            $model = new Challanwork();

            if ($this->request->isPost) {
                if ($model->load($this->request->post()) && $model->save()) {
                    
                    $modelLogs = new Logs();
                    $modelLogs->byUserId = Yii::$app->user->id;
                    $modelLogs->byUserName = Yii::$app->user->identity->username;
                    $modelLogs->description = "Created challan Id: '".$model->id."' in Works section";
                    $modelLogs->save(false);
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            } else {
                $model->loadDefaultValues();
            }

            return $this->render('create', [
                'model' => $model,
            ]);
        }
        else{
            throw new ForbiddenHttpException;
        }
    }

    /**
     * Updates an existing Challanwork model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {

            $modelLogs = new Logs();
            $modelLogs->byUserId = Yii::$app->user->id;
            $modelLogs->byUserName = Yii::$app->user->identity->username;
            $modelLogs->description = "Updated challan Id: '".$id."' in Works section";
            $modelLogs->save(false);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Challanwork model.
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
        $modelLogs->description = "Deleted challan Id: '".$id."' in Works section";
        $modelLogs->save(false);

        return $this->redirect(['index']);
    }

    /**
     * Finds the Challanwork model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Challanwork the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Challanwork::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
