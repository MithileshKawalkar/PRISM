<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/** @var yii\web\View $this */
/** @var app\models\User $model */

$this->title = 'Add new privilege level: ';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['url' => ['view']];
$this->params['breadcrumbs'][] = 'Privileges';
?>
<div class="users-update">

    <h1><?= Html::encode('New privilege') ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true])
    ->label("Privilege identifier")
    ->hint("Enter the unique identifier in the format 'action-section' e.g 'create-voucherworks' for the privilege.") ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>
