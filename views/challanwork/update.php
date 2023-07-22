<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Challanwork $model */

$this->title = 'Update Challanwork: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Challanworks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="challanwork-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
