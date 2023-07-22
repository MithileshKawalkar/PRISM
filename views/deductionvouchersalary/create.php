<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Deductionvouchersalary $model */

$this->title = 'Create Deductionvouchersalary';
$this->params['breadcrumbs'][] = ['label' => 'Deductionvouchersalaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="deductionvouchersalary-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
