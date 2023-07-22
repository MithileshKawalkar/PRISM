<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\DeductionshortcodesalarySearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="deductionshortcodesalary-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'shortcode') ?>

    <?= $form->field($model, 'OldHeadOfAccount') ?>

    <?= $form->field($model, 'RationalizedHeadOfAccount') ?>

    <?= $form->field($model, 'Amount') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
