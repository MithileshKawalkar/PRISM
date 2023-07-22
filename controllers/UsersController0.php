<?php

namespace app\controllers;
use Yii;
use app\models\Users;
use app\models\UsersSearch;
use app\models\AuthItem;
use app\models\AuthAssignment;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

 
/**
 * UsersController implements the CRUD actions for Users model.
 */
class UsersController extends Controller
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

    /**
     * Lists all Users models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UsersSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Users model.
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
     * Creates a new Users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
{
    if (Yii::$app->user->can('create-user')) {
        $model = new Users();
        $authItems = AuthItem::find()->all();
        $authAssignment = new AuthAssignment();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                $selectedPermissions = $this->request->post('AuthAssignment')['permissions'] ?? [];
                $userId = Yii::$app->db->getLastInsertID();

                foreach ($selectedPermissions as $permission) {
                    $assignment = new AuthAssignment();
                    $assignment->user_id = $userId;
                    $assignment->item_name = $permission;
                    $assignment->save();
                }
                Yii::$app->session->setFlash('success', 'User created successfully with selected permissions.');
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'authAssignment' => $authAssignment,
            'authItems' => $authItems,
            'selectedPermissions' => [] // Define an empty array initially
        ]);
    } else {
        throw new ForbiddenHttpException;
    }
}





    // public function actionCreate()
    // {
    //     if(Yii::$app->user->can('create-user')){
    //         $model = new Users();
    //         $authItems = AuthItem::find()->all();
    //         $authAssignment = new AuthAssignment();
    //         // echo $authItems;
    //         if ($this->request->isPost) {
    //             if ($model->load($this->request->post()) && $model->save()) {
    //                 return $this->redirect(['view', 'id' => $model->id]);
    //             }
    //         } else {
    //             $model->loadDefaultValues();
    //         }
    
    //         return $this->render('create', [
    //             'model' => $model,
    //             'authAssignment' => $authAssignment,
    //             'authItems'=> $authItems,
    //         ]);

    //     }
    //     else
    //     {
    //         throw new ForbiddenHttpException;
    //     }
        
    // }

    /**
     * Updates an existing Users model.
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
     * Deletes an existing Users model.
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
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Users::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
