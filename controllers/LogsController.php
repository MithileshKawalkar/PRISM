<?php

namespace app\controllers;

use Yii;
use app\models\Logs;
use app\models\LogSearch;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\web\ForbiddenHttpException;

class LogsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        if(Yii::$app->user->can('admin'))
        {
            $modelLogs = new Logs();
            $searchModel = new LogSearch();

            // $query = (new Query())
            // ->select('*') // Adjust the fields you want to select
            // ->from('logs') // Replace 'your_table_name' with the actual name of your table
            // ->orderBy(['time' => SORT_DESC]); // Assuming 'time' is the name of your timestamp column and you want to sort in descending order

            // $dataProvider = new ActiveDataProvider([
            //     'query' => $query,
            // ]);

            // $dataProvider = new ActiveDataProvider([
            //     'query' => $searchModel->search($this->request->queryParams), // Replace $query with your ActiveRecord query or model search query
            //     'sort' => [
            //         'defaultOrder' => [
            //             'time' => SORT_DESC, // Assuming 'time' is the name of your timestamp column
            //         ],
            //     ],
            // ]);
            $dataProvider = $searchModel->search($this->request->queryParams);
            // Access the sent2AOA field

            $dataProvider->setSort([
                'attributes' => [
                    'time' => [
                        'asc' => ['time' => SORT_ASC],
                        'desc' => ['time' => SORT_DESC],
                        'default' => SORT_DESC,
                    ],
                ],
                'defaultOrder' => [
                    'time' => SORT_DESC
                ]
            ]);

        // $dataProvider->sort->attributes['time'] = [
        //     'asc' => ['time' => SORT_ASC],
        //     'desc' => ['time' => SORT_DESC],
        // ];
            return $this->render('index', [
                'modelLogs' => $modelLogs,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        else{
            throw new ForbiddenHttpException;
        }
    }



}
