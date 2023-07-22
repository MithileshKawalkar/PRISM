<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\VouchersalarySearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="vouchersalary-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'voucherid') ?>

    <?= $form->field($model, 'NatureOfPayment') ?>

    <?= $form->field($model, 'ModeOfPayment') ?>

    <?= $form->field($model, 'SanctionRefNo') ?>

    <?php // echo $form->field($model, 'SanctionDate') ?>

    <?php // echo $form->field($model, 'NameOfEmployee') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
