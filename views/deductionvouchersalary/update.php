<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Deductionvouchersalary $model */

$this->title = 'Update Deductionvouchersalary: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Deductionvouchersalaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="deductionvouchersalary-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
