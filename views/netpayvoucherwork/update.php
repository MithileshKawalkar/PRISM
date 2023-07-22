<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Netpayvoucherwork $model */

$this->title = 'Update Netpayvoucherwork: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Netpayvoucherworks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="netpayvoucherwork-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
