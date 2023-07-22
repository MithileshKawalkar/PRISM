<?php

use app\models\Vouchersalary;
use app\controllers\VouchersalaryController;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\VouchersalarySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Vouchersalaries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vouchersalary-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= (!Yii::$app->user->can("is-AOA") && !Yii::$app->user->can("is-cashier")) ? Html::a('Create Vouchersalary', ['create'], ['class' => 'btn btn-success']) : '' ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'voucherid',
            'NatureOfPayment',
            'ModeOfPayment',
            'SanctionRefNo',
            'SanctionDate',
            'NameOfEmployee',
            'status',
            [
                'class' => ActionColumn::class,
                'template' =>'{view}{update}{delete}',
                'visibleButtons' => [
                    'update' => function ($model) {
                        return $model->sent2AOA != '1';
                    },
                    'delete' => function ($model) {
                        return $model->sent2AOA != '1';
                    },
                ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
                // 'class' => ActionColumn::class,
                // 'template' => (Yii::$app->user->can("is-AOA") || Yii::$app->user->can("is-cashier")) ? '{view}' : '{view}{update}{delete}',
                // // 'template' => Yii::$app->user->can("is-cashier")?'{view}':'{view}{update}{delete}',
                // 'urlCreator' => function ($action, Vouchersalary $model, $key, $index, $column) {
                //     return Url::toRoute([$action, 'id' => $model->id]);
                //  }
            ],
        ],
    ]); ?>


</div>
