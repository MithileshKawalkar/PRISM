<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Paymentvoucherwork $model */

$this->title = 'Create Paymentvoucherwork';
$this->params['breadcrumbs'][] = ['label' => 'Paymentvoucherworks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paymentvoucherwork-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
