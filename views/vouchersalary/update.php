<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Vouchersalary $model */

$this->title = 'Update Vouchersalary: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Vouchersalaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vouchersalary-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelsPaymentvouchersalary' => $modelsPaymentvouchersalary,
        'modelsDeductionvouchersalary' => $modelsDeductionvouchersalary,
        'modelsNetpayvouchersalary' => $modelsNetpayvouchersalary,
    ]) ?>

</div>
