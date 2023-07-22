<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Deductionvoucherwork $model */

$this->title = 'Update Deductionvoucherwork: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Deductionvoucherworks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="deductionvoucherwork-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
