<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Valuable;
use yii\jui\DatePicker;

/** @var yii\web\View $this */
/** @var app\models\Challanwork $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="challanwork-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
        $lastEnteredData = Valuable::find()->orderBy(['id' => SORT_DESC])->one();
        $shortcodeValue = $lastEnteredData ? $lastEnteredData->ReceievedForm : '';
    ?>
    <?= $form->field($model, 'ReceivedForm')->textInput(['value' => $shortcodeValue]); ?>

    <?php
        $lastEnteredData = Valuable::find()->orderBy(['id' => SORT_DESC])->one();
        $shortcodeValue = $lastEnteredData ? $lastEnteredData->ReferenceLetterNo : '';
    ?>
    <?= $form->field($model, 'ReferenceLetterNo')->textInput(['value' => $shortcodeValue]); ?>
    <?php
        $lastEnteredData = Valuable::find()->orderBy(['id' => SORT_DESC])->one();
        $shortcodeValue = $lastEnteredData ? $lastEnteredData->ReferenceLetterDate : '';
    ?>

    <?= $form->field($model, 'ReferenceLetterDate')->textInput(['value' => $shortcodeValue]); ?>

    <?php
        $lastEnteredData = Valuable::find()->orderBy(['id' => SORT_DESC])->one();
        $shortcodeValue = $lastEnteredData ? $lastEnteredData->NatureOfValuable : '';
    ?>
    <?= $form->field($model, 'NatureOfValuable')->textInput(['value' => $shortcodeValue]); ?>
    <?php
        $lastEnteredData = Valuable::find()->orderBy(['id' => SORT_DESC])->one();
        $shortcodeValue = $lastEnteredData ? $lastEnteredData->Amount : '';
    ?>
    <?= $form->field($model, 'Amount')->textInput(['value' => $shortcodeValue]); ?>

    
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
