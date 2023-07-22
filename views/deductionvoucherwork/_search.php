<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\DeductionvoucherworkSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="deductionvoucherwork-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'voucherid') ?>

    <?= $form->field($model, 'shortcode') ?>

    <?= $form->field($model, 'OldHeadOfAccount') ?>

    <?= $form->field($model, 'RationalizedHeadOfAccount') ?>

    <?php // echo $form->field($model, 'DrOrCr') ?>

    <?php // echo $form->field($model, 'Amount') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
