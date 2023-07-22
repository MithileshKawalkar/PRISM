<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Paymentshortcode $model */

$this->title = 'Update Paymentshortcode: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Paymentshortcodes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="paymentshortcode-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
