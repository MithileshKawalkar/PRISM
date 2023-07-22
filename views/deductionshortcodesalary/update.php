<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Deductionshortcodesalary $model */

$this->title = 'Update Deductionshortcodesalary: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Deductionshortcodesalaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="deductionshortcodesalary-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
