<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Paymentshortcode $model */

$this->title = 'Create Paymentshortcode';
$this->params['breadcrumbs'][] = ['label' => 'Paymentshortcodes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paymentshortcode-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
