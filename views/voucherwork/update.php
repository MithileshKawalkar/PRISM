<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Voucherwork $model */

$this->title = 'Update Voucherwork: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Voucherworks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="voucherwork-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelsPaymentvoucherwork' => $modelsPaymentvoucherwork,
        'modelsDeductionvoucherwork' => $modelsDeductionvoucherwork,
        'modelsNetpayvoucherwork' => $modelsNetpayvoucherwork,
    ]) ?>

</div>
