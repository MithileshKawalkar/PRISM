<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Challansalary $model */

$this->title = 'Create Challansalary';
$this->params['breadcrumbs'][] = ['label' => 'Challansalaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="challansalary-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
