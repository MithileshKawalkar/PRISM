<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\User $model */

$this->title = 'Create Users';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'authItems'=> $authItems,
        'authAssignment' => $authAssignment,
            'selectedPermissions' => $selectedPermissions,
            'authItems' => $authItems,
            'isUpdateForm' => false,
    ]) ?>

</div>
