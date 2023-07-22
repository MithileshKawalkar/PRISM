<?php

use app\models\Deductionvoucherwork;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\DeductionvoucherworkSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Deductionvoucherworks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="deductionvoucherwork-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Deductionvoucherwork', ['create'], ['class' => 'btn btn-success']) ?>
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
                'urlCreator' => function ($action, Deductionvoucherwork $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
