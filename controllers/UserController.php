<?php

namespace app\controllers;
use Yii;
use app\models\User;
use app\models\Logs;
use app\models\UserSearch;
use app\models\AuthItem;
use app\models\AuthAssignment;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

 
/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
            if (Yii::$app->user->isGuest
            //  || !Yii::$app->user->can('admin')
             ) {
                // Redirect guests to the index page
                $this->redirect(['/site/index'])->send();
                return false;
            }
            return true;
        }
        return false;
    }

    public function actionEdit()
    {
    $searchModel = new UserSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('edit', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Lists all User models.
     *
     * @return string
     */
    public function actionIndex()
    {
    $searchModel = new UserSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionPermission()
    {
        $model = new AuthItem();
        // $dataProvider = $model->search($this->request->queryParams);

        return $this->render('permission', [
            'model'=>$model,
        ]);
    }

    /**
     * Displays a single User model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
            $modelLogs = new Logs();
            $model = User::findOne($id);

            $modelLogs->byUserId = Yii::$app->user->id;
            $modelLogs->byUserName = Yii::$app->user->identity->username;
            $modelLogs->description = "Viewed password details of user: '".$model->username."'";
            $modelLogs->save(false);
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
{
    if (Yii::$app->user->can('create-user')) {
        $model = new User();
        $authItems = AuthItem::find()->all();
        $authAssignment = new AuthAssignment();

        if ($this->request->isPost) {
            if ($model->load(Yii::$app->request->post())&& $model->signup()) {
                // print_r($model->username , $model->password_hash);
                // die();
                $selectedPermissions = $this->request->post('AuthAssignment')['permissions'] ?? [];
                $userId = Yii::$app->db->getLastInsertID();

                foreach ($selectedPermissions as $permission) {
                    $assignment = new AuthAssignment();
                    $assignment->user_id = $userId;
                    $assignment->item_name = $permission;
                    $assignment->save();
                }
                Yii::$app->session->setFlash('success', 'User created successfully with selected permissions.');

                $modelLogs = new Logs();
                $model = User::findOne($userId);    
                $modelLogs->byUserId = Yii::$app->user->id;
                $modelLogs->byUserName = Yii::$app->user->identity->username;
                $modelLogs->description = "Created new user: '".$model->username."'";
                $modelLogs->save(false);

                return $this->redirect(['view', 'id' => $userId]);
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
    //         $model = new User();
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
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (Yii::$app->user->isGuest || !Yii::$app->user->can('admin'))
        {
            // Redirect guests to the index page
            $this->redirect(['/site/index'])->send();
            return false;
        }
        else
        {
                 
            $model = $this->findModel($id);
            $authItems = AuthItem::find()->all();
            // print_r($id);
            // die();
            $authAssignment = new AuthAssignment();

            // if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            //     return $this->redirect(['view', 'id' => $model->id]);
            // }

            if ($this->request->isPost) {
                    // print_r($model->username , $model->password_hash);
                    // die();
                    $selectedPermissions = $this->request->post('AuthAssignment')['permissions'] ?? [];
                    AuthAssignment::deleteAll(['AND', ['user_id' => $id], ['NOT IN', 'item_name', $selectedPermissions]]);
                    // $userId = Yii::$app->db->getLastInsertID();
                    $userId = $id;

                    foreach ($selectedPermissions as $permission) {
                        $existingAssignment = AuthAssignment::findOne(['user_id' => $userId, 'item_name' => $permission]);
                        if (!$existingAssignment) 
                        {
                            $assignment = new AuthAssignment();
                            $assignment->user_id = $userId;
                            $assignment->item_name = $permission;
                            $assignment->save();
                        }
                    }
                    Yii::$app->session->setFlash('success', 'User updated successfully with selected permissions.');

                    $modelLogs = new Logs();
                    $model = User::findOne($id);    
                    $modelLogs->byUserId = Yii::$app->user->id;
                    $modelLogs->byUserName = Yii::$app->user->identity->username;
                    $modelLogs->description = "Updated permissions of user: '".$model->username."'";
                    $modelLogs->save(false);

                    return $this->redirect(['view', 'id' => $userId]);
            } else {
                $model->loadDefaultValues();
            }

            return $this->render('update', [
                'model' => $model,
                'authAssignment' => $authAssignment,
                'authItems' => $authItems,
                'selectedPermissions' => [] // Define an empty array initially
            ]);
        }
    }

    public function actionChange($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {

                $modelLogs = new Logs();
                $model = User::findOne($id);    
                $modelLogs->byUserId = Yii::$app->user->id;
                $modelLogs->byUserName = Yii::$app->user->identity->username;
                $modelLogs->description = "Change password user: '".$model->username."'";
                $modelLogs->save(false);

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('change', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
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
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
