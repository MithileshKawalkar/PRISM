<?php

namespace app\controllers;
use Yii;
use app\models\Paymentshortcode;
use app\models\PaymentshortcodeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\JsonParser;

/**
 * PaymentshortcodeController implements the CRUD actions for Paymentshortcode model.
 */
class PaymentshortcodeController extends Controller
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


    // public function beforeAction($action)
    // {
    //     if (parent::beforeAction($action)) {
    //         // Check if the user is a guest
    //         if (Yii::$app->user->isGuest) {
    //             // Redirect guests to the index page
    //             $this->redirect(['/site/index'])->send();
    //             return false;
    //         }
    //         return true;
    //     }
    //     return false;
    // }

    public function actionGetold($shortcodeId)
    {
        // print_r($shortcodeId);
        // die();
        $shortcode = Paymentshortcode::findOne($shortcodeId);

        if ($shortcode) {
            // Assuming the attributes in the Paymentshortcode model are named OldHeadOfAccount, RationalizedHeadOfAccount, and DrOrCr
            $data = [
                'OldHeadOfAccount' => $shortcode->OldHeadOfAccount,
                'RationalizedHeadOfAccount' => $shortcode->RationalizedHeadOfAccount,
                'DrOrCr' => $shortcode->DrOrCr,
            ];

            return json_encode($data);
        }
        return json_encode([]);
    }

    /**
     * Lists all Paymentshortcode models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PaymentshortcodeSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Paymentshortcode model.
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
     * Creates a new Paymentshortcode model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Paymentshortcode();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionGet($shortcodeId)
    {
        $Paymentshortcode = Paymentshortcode::findOne($shortcodeId);
        echo Json::encode($Paymentshortcode);
    }

    /**
     * Updates an existing Paymentshortcode model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Paymentshortcode model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Paymentshortcode model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Paymentshortcode the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Paymentshortcode::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    
    
}

