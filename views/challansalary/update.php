<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Challansalary $model */

$this->title = 'Update Challansalary: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Challansalaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="challansalary-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
