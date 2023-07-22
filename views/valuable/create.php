<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Valuable $model */

$this->title = 'Create Valuable';
$this->params['breadcrumbs'][] = ['label' => 'Valuables', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="valuable-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
