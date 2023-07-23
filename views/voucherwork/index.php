<?php

use app\models\Voucherwork;
use app\controllers\VoucherworkController;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\VoucherworkSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Voucherworks';
$this->params['breadcrumbs'][] = $this->title;
// print_r($model[0]->sent2AOA);
// die();
?>
<div class="voucherwork-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= (!Yii::$app->user->can("is-AOA") && !Yii::$app->user->can("is-cashier")) ? Html::a('Create Voucherwork', ['create'], ['class' => 'btn btn-success']) : '' ?>
    </p>

    <div style="text-align: right;">
    <?php
         $showAllVouchers = Yii::$app->session->get('showAllVouchers', false);

         if ($showAllVouchers) {
             echo Html::a('Show All Vouchers', ['voucherwork/showall'], ['class' => 'btn btn-primary']);
         } else {
             echo Html::a('Show My Vouchers', ['voucherwork/showall', 'showAll' => true], ['class' => 'btn btn-primary']);
         }
        ?>
        </div>

    <?= 
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'voucherid',
            'NatureOfPayment',
            'ModeOfPayment',
            'WorkOrderRefNo',
            'WorkOrderDate',
            'Description:ntext',
            'NameOfContractor',
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
            ],
            // [
            //     'class' => ActionColumn::class,
                
            //     'template' => (Yii::$app->user->can("is-AOA") || Yii::$app->user->can("is-cashier"))?'{view}':'{view}{update}{delete}',
            //     // 'template' => '',function (Voucherwork $model) {
            //     //     // $sent = VoucherworkController::getSent(['id' => $model->id]);
            //     //         $sent = $model->sent2AOA;
            //     //     return ($sent == '1' || Yii::$app->user->can("is-AOA") || Yii::$app->user->can("is-cashier"))?'{view}':'{view}{update}{delete}';
                    
            //     // },
                    
            //     'urlCreator' => function ($action, Voucherwork $model, $key, $index, $column) {
            //         return Url::toRoute([$action, 'id' => $model->id]);
            //     }
            // ],
            // [
            //     'class' => ActionColumn::class,
            //     'template' => (($this->sent2AOA=='1')||Yii::$app->user->can("is-AOA") || Yii::$app->user->can("is-cashier")) ? '{view}' : '{view}{update}{delete}',
            //     // 'template' => Yii::$app->user->can("is-cashier") ? '{view}' : '{view}{update}{delete}',
            //     'urlCreator' => function ($action, Voucherwork $model, $key, $index, $column) {
            //         return Url::toRoute([$action, 'id' => $model->id]);
            //      }
            // ],
            
        ],
    ]); ?>


</div>
