<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Paymentvoucherwork $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="paymentvoucherwork-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'voucherid')->textInput() ?>

    <?= $form->field($model, 'shortcode')->textInput() ?>

    <?= $form->field($model, 'OldHeadOfAccount')->textInput() ?>

    <?= $form->field($model, 'RationalizedHeadOfAccount')->textInput() ?>

    <?= $form->field($model, 'DrOrCr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Amount')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
