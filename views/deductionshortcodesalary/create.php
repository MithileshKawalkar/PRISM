<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Deductionshortcodesalary $model */

$this->title = 'Create Deductionshortcodesalary';
$this->params['breadcrumbs'][] = ['label' => 'Deductionshortcodesalaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="deductionshortcodesalary-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
