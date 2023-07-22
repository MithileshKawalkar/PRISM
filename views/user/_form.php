<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Users $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    // Check if the form is being used in update.php or create.php
        $isUpdateForm = isset($isUpdateForm) && $isUpdateForm === true;
    ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'disabled' => $isUpdateForm]) ?>

    <?= 
    $form->field($model, 'password_hash')->passwordInput(['id' => 'password-input' , 'maxlength' => true, 'disabled' => $isUpdateForm])->label("Password") ?>
    

    <?php 
    if($authItems != [])
    {
        // print_r($authItems);
        // die();
        $authItems = ArrayHelper::map($authItems,'name','name');
    }        
    ?>

<label for="authassignment-permissions"><?= (Yii::$app->user->can('admin') || Yii::$app->user->can('create-user'))?'Permissions':''?></label>
    <?php foreach ($authItems as $value => $label): ?>
        <div>
            <input type="checkbox" name="AuthAssignment[permissions][]" value="<?= $value ?>" id="authassignment-permissions-<?= $value ?>" <?= in_array($value, $model->getAssignedPermissions()) ? 'checked' : '' ?>>
            <label for="authassignment-permissions-<?= $value ?>"><?= $label ?></label>
        </div>
    <?php endforeach; ?><br/>
 

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
