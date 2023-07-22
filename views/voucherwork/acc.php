<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Voucherwork $model */

$this->title = 'Accrej Voucherwork: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Voucherworks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Accrej';
?>
<div class="voucherwork-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Yii::$app->session->setFlash('success', 'Voucher Accepted.'); ?>
    <?php 
        
    // Yii::$app->getResponse()->redirect(['voucherwork']); ?>

</div>