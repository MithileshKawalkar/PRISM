<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Deductionvoucherwork $model */

$this->title = 'Create Deductionvoucherwork';
$this->params['breadcrumbs'][] = ['label' => 'Deductionvoucherworks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="deductionvoucherwork-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
