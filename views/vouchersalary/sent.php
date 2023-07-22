<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Vouchersalary $model */

$this->title = 'Accrej Vouchersalary:' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Vouchersalary', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Accrej';
?>
<div class="vouchersalary-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Yii::$app->session->setFlash('success', 'Voucher sent.'); ?>
    <?php 
        
    // Yii::$app->getResponse()->redirect(['voucherwork']); ?>

</div>