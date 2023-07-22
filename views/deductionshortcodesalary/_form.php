<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Deductionshortcodesalary $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="deductionshortcodesalary-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'shortcode')->textInput() ?>

    <?= $form->field($model, 'OldHeadOfAccount')->textInput() ?>

    <?= $form->field($model, 'RationalizedHeadOfAccount')->textInput() ?>

    <?= $form->field($model, 'Amount')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
