<?php

use app\models\Deductionshortcodesalary;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\DeductionshortcodesalarySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Deductionshortcodesalaries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="deductionshortcodesalary-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Deductionshortcodesalary', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'shortcode',
            'OldHeadOfAccount',
            'RationalizedHeadOfAccount',
            'Amount',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Deductionshortcodesalary $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
