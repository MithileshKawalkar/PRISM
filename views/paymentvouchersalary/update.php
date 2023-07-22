<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Paymentvouchersalary $model */

$this->title = 'Update Paymentvouchersalary: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Paymentvouchersalaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="paymentvouchersalary-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
