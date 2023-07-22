<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Voucherwork $model */

$this->title = 'Create Voucherwork';
$this->params['breadcrumbs'][] = ['label' => 'Voucherworks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="voucherwork-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelsPaymentvoucherwork' => $modelsPaymentvoucherwork,
        'modelsDeductionvoucherwork' => $modelsDeductionvoucherwork,
        'modelsNetpayvoucherwork' => $modelsNetpayvoucherwork,
    ]) ?>

</div>
