<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Netpayvouchersalary $model */

$this->title = 'Create Netpayvouchersalary';
$this->params['breadcrumbs'][] = ['label' => 'Netpayvouchersalaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="netpayvouchersalary-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
