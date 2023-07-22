<?php

use Mpdf\Mpdf;
use app\controllers\VoucherworkController;
use yii\helpers\Html;
use yii\db\Query;
use yii\widgets\DetailView;

$script = <<< JS
function generatePdf() {

    var mpdf = new Mpdf();

    var html = '
        <h1>Form Title</h1>
        <p>Form content goes here.</p>
        <table>
            <tr>
                <th>Field 1</th>
                <th>Field 2</th>
            </tr>
            <tr>
                <td>Value 1</td>
                <td>Value 2</td>
            </tr>
        </table>
        ';

    // Generate the PDF from the HTML
    mpdf->WriteHTML(html);

    // Output the PDF file to the browser
    
    // Get the generated PDF as a string
    var pdfContent = mpdf->Output('', 'S');

    // Set the appropriate headers for PDF display in the browser
    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename=form.pdf');
    header('Content-Length: ' . strlen(pdfContent));

    // Output the PDF content
    echo pdfContent;
    exit();
}
JS;
$this->registerJS($script);


/** @var yii\web\View $this */
/** @var app\models\Voucherwork $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Voucherworks', 'url' => ['index'], 'class' => 'hide-on-print'];
$this->params['breadcrumbs'][] = ['class' => 'hide-on-print', 'label' => $this->title];
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
<div class="voucherwork-view">

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
            'WorkOrderRefNo',
            'WorkOrderDate',
            'Description:ntext',
            'NameOfContractor',
            'status'
        ],
    ]) ?>

    <p>
    <?= (Yii::$app->user->can("is-AOA")) ?  Html::a('Pass', ['acc', 'id' => $model->id], ['class' => 'btn btn-success']) : '' ?>
    <?= (Yii::$app->user->can("is-AOA")) ?  Html::a('Reject', ['rej', 'id' => $model->id], ['class' => 'btn btn-danger']) : '' ?>
    </p>

    <p>
    <?= (Yii::$app->user->can("create-voucherwork") ) ?  Html::a('Send to AOA', ['sent', 'id' => $model->id], ['class' => 'btn btn-success']) : '' ?>
    </p>

    <?=
    
    (Yii::$app->user->can("is-cashier") ) ? \yii\helpers\Html::button('Generate PDF', [
    'class' => 'btn btn-primary hide-on-print',
    'onclick' => 'window.print()',
]):"" ?>

</div>
</body>
</html>