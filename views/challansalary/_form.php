<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Challansalary $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="challansalary-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ReceivedForm')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ReferenceLetterNo')->textInput() ?>

    <?= $form->field($model, 'ReferenceLetterDate')->textInput() ?>

    <?= $form->field($model, 'NatureOfValuable')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Amount')->textInput() ?>

    <div class="row">
    <div class="col-sm-2">
    
    <?= $form->field($model, 'Shortcode')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-sm-3">
    <?= $form->field($model, 'OldHeadOfAccount')->textInput() ?>
    </div>

    <div class="col-sm-3">
    <?= $form->field($model, 'RationalizedHeadofAccount')->textInput() ?>
    </div>

    <div class="col-sm-2">
    <?= $form->field($model, 'DrOrCr')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-sm-2">
    <?= $form->field($model, 'ShortcodeAmount')->textInput() ?>
    </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
