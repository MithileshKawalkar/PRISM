<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ValuableSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="valuable-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'ReceievedForm') ?>

    <?= $form->field($model, 'ReferenceLetterNo') ?>

    <?= $form->field($model, 'NatureOfValuable') ?>

    <?= $form->field($model, 'Amount') ?>

    <?php // echo $form->field($model, 'SectionToWhichTheValuableBelong') ?>

    <?php // echo $form->field($model, 'ReferenceLetterDate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
