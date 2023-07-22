<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Valuable $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="valuable-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ReceievedForm')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ReferenceLetterNo')->textInput() ?>

    <?= $form->field($model, 'ReferenceLetterDate')->textInput() ?>

    <?= $form->field($model, 'NatureOfValuable')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Amount')->textInput() ?>

    <?= $form->field($model, 'SectionToWhichTheValuableBelong')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?> 

</div>

