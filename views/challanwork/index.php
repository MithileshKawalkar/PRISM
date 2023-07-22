<?php

use app\models\Challanwork;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ChallanworkSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Challanworks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="challanwork-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Challanwork', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'ReceivedForm',
            'ReferenceLetterNo',
            'ReferenceLetterDate',
            'NatureOfValuable',
            //'Amount',
            //'Shortcode',
            //'OldHeadOfAccount',
            //'RationalizedHeadofAccount',
            //'DrOrCr',
            //'ShortcodeAmount',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Challanwork $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
