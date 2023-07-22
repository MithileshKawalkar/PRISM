<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Paymentshortcodesalary $model */

$this->title = 'Create Paymentshortcodesalary';
$this->params['breadcrumbs'][] = ['label' => 'Paymentshortcodesalaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paymentshortcodesalary-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
