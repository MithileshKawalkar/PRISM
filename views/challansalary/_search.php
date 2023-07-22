<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ChallansalarySearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="challansalary-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'ReceivedForm') ?>

    <?= $form->field($model, 'ReferenceLetterNo') ?>

    <?= $form->field($model, 'ReferenceLetterDate') ?>

    <?= $form->field($model, 'NatureOfValuable') ?>

    <?php // echo $form->field($model, 'Amount') ?>

    <?php // echo $form->field($model, 'Shortcode') ?>

    <?php // echo $form->field($model, 'OldHeadOfAccount') ?>

    <?php // echo $form->field($model, 'RationalizedHeadofAccount') ?>

    <?php // echo $form->field($model, 'DrOrCr') ?>

    <?php // echo $form->field($model, 'ShortcodeAmount') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
