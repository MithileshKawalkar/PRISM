<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Vouchersalary $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Vouchersalaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= Html::encode($this->title) ?></title>

    <style>
        /* Custom CSS styles */
        h1 {
            color: #333;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        @media print {
            /* Print-specific styles */
            .hide-on-print {
                display: none;
            }
            
            .page-break {
                page-break-before: always;
            }
            
            /* Adjust margins */
            @page {
                margin: 1cm;
            }
            }

    </style>
</head>
<body>
<div class="vouchersalary-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    <?= ($model->sent2AOA != '1' && !Yii::$app->user->can("is-AOA")&& !Yii::$app->user->can("is-cashier")) ?  Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) : '' ?>
        <?= ($model->sent2AOA != '1' && !Yii::$app->user->can("is-AOA")&& !Yii::$app->user->can("is-cashier")) ?  Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) : '' ?>
       
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'voucherid',
            'NatureOfPayment',
            'ModeOfPayment',
            'SanctionRefNo',
            'SanctionDate',
            'NameOfEmployee',
            'status'
        ],
    ]) ?>

<p>
    <?= (Yii::$app->user->can("is-AOA")) ?  Html::a('Pass', ['acc', 'id' => $model->id], ['class' => 'btn btn-success']) : '' ?>
    <?= (Yii::$app->user->can("is-AOA")) ?  Html::a('Reject', ['rej', 'id' => $model->id], ['class' => 'btn btn-danger']) : '' ?>
    </p>

    <p>
    <?= (Yii::$app->user->can("create-vouchersalary") ) ?  Html::a('Send to AOA', ['sent', 'id' => $model->id], ['class' => 'btn btn-success']) : '' ?>
    </p>
    <?=
    
    (Yii::$app->user->can("is-cashier") ) ? \yii\helpers\Html::button('Generate PDF', [
    'class' => 'btn btn-primary hide-on-print',
    'onclick' => 'window.print()',
]):"" ?>


</div>
</body>
</html>