<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Paymentvouchersalary $model */

$this->title = 'Create Paymentvouchersalary';
$this->params['breadcrumbs'][] = ['label' => 'Paymentvouchersalaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paymentvouchersalary-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
