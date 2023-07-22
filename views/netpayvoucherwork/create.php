<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Netpayvoucherwork $model */

$this->title = 'Create Netpayvoucherwork';
$this->params['breadcrumbs'][] = ['label' => 'Netpayvoucherworks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="netpayvoucherwork-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
