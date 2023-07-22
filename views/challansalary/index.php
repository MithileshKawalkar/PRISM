<?php

use app\models\Challansalary;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ChallansalarySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Challan -Salary';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="challansalary-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Challansalary', ['create'], ['class' => 'btn btn-success']) ?>
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
                'urlCreator' => function ($action, Challansalary $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
