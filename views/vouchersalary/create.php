<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Vouchersalary $model */

$this->title = 'Create Vouchersalary';
$this->params['breadcrumbs'][] = ['label' => 'Vouchersalaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vouchersalary-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelsPaymentvouchersalary' => $modelsPaymentvouchersalary,
        'modelsDeductionvouchersalary' => $modelsDeductionvouchersalary,
        'modelsNetpayvouchersalary' => $modelsNetpayvouchersalary,
    ]) ?>

</div>
