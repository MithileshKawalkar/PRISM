<?php

use app\models\Valuable;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ValuableSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Valuables';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="valuable-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Valuable', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'ReceievedForm',
            'ReferenceLetterNo',
            'NatureOfValuable',
            'Amount',
            //'SectionToWhichTheValuableBelong',
            //'ReferenceLetterDate',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Valuable $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
