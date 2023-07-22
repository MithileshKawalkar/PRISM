<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Challanwork $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Challanworks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="challanwork-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ReceivedForm',
            'ReferenceLetterNo',
            'ReferenceLetterDate',
            'NatureOfValuable',
            'Amount',
            'Shortcode',
            'OldHeadOfAccount',
            'RationalizedHeadofAccount',
            'DrOrCr',
            'ShortcodeAmount',
        ],
    ]) ?>

</div>
