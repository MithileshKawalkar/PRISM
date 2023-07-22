<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Challanwork $model */

$this->title = 'Create Challanwork';
$this->params['breadcrumbs'][] = ['label' => 'Challanworks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="challanwork-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
