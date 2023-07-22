<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Netpayvouchersalary $model */

$this->title = 'Update Netpayvouchersalary: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Netpayvouchersalaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="netpayvouchersalary-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
