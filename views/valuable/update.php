<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Valuable $model */

$this->title = 'Update Valuable: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Valuables', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="valuable-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
