<?php

use app\models\Netpayvoucherwork;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\NetpayvoucherworkSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Netpayvoucherworks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="netpayvoucherwork-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Netpayvoucherwork', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'voucherid',
            'shortcode',
            'OldHeadOfAccount',
            'RationalizedHeadOfAccount',
            //'DrOrCr',
            //'Amount',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Netpayvoucherwork $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
