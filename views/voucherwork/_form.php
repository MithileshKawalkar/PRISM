<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use app\models\Paymentvoucherwork;
use app\models\Deductionvoucherwork;
use app\models\Netpayvoucherwork;
use app\models\Paymentshortcode;
use yii\base\Model;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use app\models\ContractorDetails;
// use CHtml;

/** @var yii\web\View $this */
/** @var app\models\Voucherwork $model */
/** @var yii\widgets\ActiveForm $form */
?>


<script>

</script>

<div class="voucherwork-form">

    <?php $form = ActiveForm::begin(['enableAjaxValidation'=>false,'id' => 'dynamic-form']); ?>

    <?= $form->field($model, 'NatureOfPayment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ModeOfPayment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'WorkOrderRefNo')->textInput() ?>

    <?= $form->field($model, 'WorkOrderDate')->textInput() ?>

    <?= $form->field($model, 'Description')->textarea(['rows' => 6]) ?>

    <?= 
    // $form->field($model, 'NameOfContractor')->textInput(['maxlength' => true])
    $form->field($model, 'NameOfContractor')->dropDownList(
    \yii\helpers\ArrayHelper::map(\app\models\ContractorDetails::find()->all(), 'name', 'name'),
    ['prompt' => 'Select Contractor','id' => 'contractor-dropdown']
    ) ?>

   <?= $form->field($model, 'bankName')->dropDownList(
    \yii\helpers\ArrayHelper::map(\app\models\ContractorDetails::find()->select('bankName')->distinct()->all(), 'bankName', 'bankName'),
    ['prompt' => 'Select Bank', 'id' => 'bank-dropdown', 'class' => 'form-control']
) ?>

    
    <!-- <div class="payment" style="display:flex; flex-direction:row">
        <button type="button" class="add-item btn btn-success btn-xs" style="margin-left:72vw;display:flex;justify-content:flex-end;"  id="contractor-dropdown-btn" >Submit</button>    
    </div> -->



    
    <div class="row">
    <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i> Paymentvoucherwork</h4></div>
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 20, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelsPaymentvoucherwork[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'shortcode',
                    'OldHeadOfAccount',
                    'RationalizedHeadOfAccount',
                    'DrOrCr',
                    'Amount',
                ],
            ]); ?>

            <div class="container-items"><!-- widgetContainer -->
            <?php foreach ($modelsPaymentvoucherwork as $i => $modelPaymentvoucherwork): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <!-- <h3 class="panel-title pull-left">Paymentvoucherwork</h3> -->
                        <div class="pull-right">
                            <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelPaymentvoucherwork->isNewRecord) {
                                echo Html::activeHiddenInput($modelPaymentvoucherwork, "[{$i}]id");
                            }
                        ?>
                        <div class="row">
                            <!-- <div class="col-sm-6">
                            <?php //<?= $form->field($modelPaymentvoucherwork, "[{$i}]shortcode")->widget(Select2::classname(),[
                            //'data' => ArrayHelper::map(Paymentshortcode::find()->all(),'id','shortcode'),
                            //'language'=> 'en',
                            //'options' => ['placeholder' => 'Select shortcode','id'=>'shortcode'],
                            
                           //  ]);  ?> -->

                           <div class="col-sm-2"> 
                                <?= $form->field($modelPaymentvoucherwork, "[{$i}]shortcode")->textInput(['maxlength' => true,'id' => 'shortcode']) ?>
                            </div>

                             <div class="col-sm-3">
                                <?= $form->field($modelPaymentvoucherwork, "[{$i}]OldHeadOfAccount")->textInput(['maxlength' => true,'id'  => 'Paymentvoucherwork-OldHeadOfAccount']) ?>
                            </div>
                            <div class="col-sm-3">
                                <?= $form->field($modelPaymentvoucherwork, "[{$i}]RationalizedHeadOfAccount")->textInput(['maxlength' => true,'id'  => 'Paymentvoucherwork-RationalizedHeadOfAccount']) ?>
                            </div>
                            <div class="col-sm-2">
                                <?= $form->field($modelPaymentvoucherwork, "[{$i}]DrOrCr")->textInput(['maxlength' => true,'id'  => 'Paymentvoucherwork-DrOrCr']) ?>
                            </div>
                            <div class="col-sm-2">
                                <?= $form->field($modelPaymentvoucherwork, "[{$i}]Amount")->textInput(['maxlength' => true, 'class' => 'payment-amount']) ?>
                            </div>
                        </div><!-- .row -->
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>
    </div>



    <div class="row">
    <div class="panel2 panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i> Deductionvoucherwork</h4></div>
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper1', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items2', // required: css class selector
                'widgetItem' => '.item2', // required: css class
                'limit' => 20, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item2', // css class
                'deleteButton' => '.remove-item2', // css class
                'model' => $modelsDeductionvoucherwork[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'shortcode',
                    'OldHeadOfAccount',
                    'RationalizedHeadOfAccount',
                    'DrOrCr',
                    'Amount',
                ],
            ]); ?>

            <div class="container-items2"><!-- widgetContainer -->
            <?php foreach ($modelsDeductionvoucherwork as $i => $modelDeductionvoucherwork): ?>
                <div class="item2 panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <!-- <h3 class="panel-title pull-left">Paymentvoucherwork</h3> -->
                        <div class="pull-right">
                            <button type="button" class="add-item2 btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item2 btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelDeductionvoucherwork->isNewRecord) {
                                echo Html::activeHiddenInput($modelDeductionvoucherwork, "[{$i}]id");
                            }
                        ?>
                        <div class="row">
                            <!-- <div class="col-sm-6">
                            <?php //<?= $form->field($modelPaymentvoucherwork, "[{$i}]shortcode")->widget(Select2::classname(),[
                            //'data' => ArrayHelper::map(Paymentshortcode::find()->all(),'id','shortcode'),
                            //'language'=> 'en',
                            //'options' => ['placeholder' => 'Select shortcode','id'=>'shortcode'],
                            
                           //  ]);  ?> -->

                           <div class="col-sm-2">
                                <?= $form->field($modelDeductionvoucherwork, "[{$i}]shortcode")->textInput(['maxlength' => true]) ?>
                            </div>

                             <div class="col-sm-3">
                                <?= $form->field($modelDeductionvoucherwork, "[{$i}]OldHeadOfAccount")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-3">
                                <?= $form->field($modelDeductionvoucherwork, "[{$i}]RationalizedHeadOfAccount")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-2">
                                <?= $form->field($modelDeductionvoucherwork, "[{$i}]DrOrCr")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-2">

                                <?= $form->field($modelDeductionvoucherwork, "[{$i}]Amount")->textInput(['maxlength' => true, 'class' => 'deduction-amount']) ?>

                            </div>
                        </div><!-- .row -->
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>
    </div>

    <div class="payment" style="display:flex; flex-direction:row">
        <!-- <div class="panel-heading" style="display:flex;"><h4><i class="glyphicon glyphicon-envelope"></i> Net Payment</h4></div> -->
        <button type="button" class="add-item btn btn-success btn-xs" style="margin-left:72vw;display:flex;justify-content:flex-end;" id="calc-payment" >Calculate net payment</button>    
    </div>
    

    
    <div class="row">
    <div class="panel3 panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i> Netpayvoucherwork</h4></div>
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper2', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items3', // required: css class selector
                'widgetItem' => '.item3', // required: css class
                'limit' => 20, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item3', // css class
                'deleteButton' => '.remove-item3', // css class
                'model' => $modelsNetpayvoucherwork[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'shortcode',
                    'OldHeadOfAccount',
                    'RationalizedHeadOfAccount',
                    'DrOrCr',
                    'Amount',
                ],
            ]); ?>

            <div class="container-items3"><!-- widgetContainer -->
            <?php foreach ($modelsNetpayvoucherwork as $i => $modelNetpayvoucherwork): ?>
                <div class="item3 panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <!-- <h3 class="panel-title pull-left">Paymentvoucherwork</h3> -->
                        <!-- <div class="pull-right">
                            <button type="button" class="add-item3 btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item3 btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div> -->
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelNetpayvoucherwork->isNewRecord) {
                                echo Html::activeHiddenInput($modelNetpayvoucherwork, "[{$i}]id");
                            }
                        ?>
                          <div class="row">
                            

                           <div class="col-sm-2">
                                <?= $form->field($modelNetpayvoucherwork, "[{$i}]shortcode")->textInput(['maxlength' => true]) ?>
                            </div>

                             <div class="col-sm-3">
                                <?= $form->field($modelNetpayvoucherwork, "[{$i}]OldHeadOfAccount")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-3">
                                <?= $form->field($modelNetpayvoucherwork, "[{$i}]RationalizedHeadOfAccount")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-2">
                                <?= $form->field($modelNetpayvoucherwork, "[{$i}]DrOrCr")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-2">

                                <?= $form->field($modelNetpayvoucherwork, "[{$i}]Amount")->textInput(['maxlength' => true,'id' => 'net-amount']) ?>

                            </div>
                        </div><!-- .row -->
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>
    </div>
    
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <!-- </div> -->
</div>



<?php
$script = <<< JS

// $('#shortcode').on('change',function(e){
//     var shortcodeId = $(this).val();
//     $.get('index.php?r=Paymentshortcode%2Fget-OldHeadOfAccount-RationalizedHeadOfAccount-DrOrCr',{ shortcodeId : shortcodeId },function(data){
//         var data = $.parseJSON(data);
//         $('#Paymentvoucherwork-OldHeadOfAccount').val(data.OldHeadOfAccount);
//         $('#Paymentvoucherwork-RationalizedHeadOfAccount').val(data.RationalizedHeadOfAccount);
//         $('#Paymentvoucherwork-DrOrCr').val(data.DrOrCr);
//     })
// });

// $(document).ready(function() {
    $('#contractor-dropdown-btn').on('click',function(e) {
        // die();
        var selectedContractor = $('#contractor-dropdown').val();
        // $.ajax({
        //     url:'/contractor/GetBankName', // Replace with the actual URL of your controller/action
        //     type: 'POST',
        //     data: {contractor: selectedContractor},
        //     success: function(response) {
        //         $('#bank-name-field').val(response);
        //     }
        // });
        
        if (selectedContractor !== '') {
                $.ajax({
                    url: 'retrieve-data.php', // Replace with the server-side script URL
                    method: 'POST',
                    data: { selectedContractor: selectedContractor },
                    success: function(response) {
                        // Update the autofill-data div with the retrieved data
                        console.log(response);
                        $('#bank-name-field').html(response);
                    }
                });
            }
        


    });
// });

$('#calc-payment').on('click', function(e) {
    // e.preventDefault();

    // Calculate payment amount
    var paymentAmount = 0;
    $('.payment-amount').each(function() {
        var amount = parseFloat($(this).val());
        if (!isNaN(amount)) {
            paymentAmount += amount;
        }
    });

    // Calculate deduction amount
    var deductionAmount = 0;
    $('.deduction-amount').each(function() {
        var amount = parseFloat($(this).val());
        if (!isNaN(amount)) {
            deductionAmount += amount;
        }
    });

    // Calculate net payment
    var netPayment = paymentAmount - deductionAmount;
    var string ="<p>Amount:"+netPayment+"</p>";

    // document.getElementById("#net-amount").appendChild(string);
    // $("#net-amount").html(string);
    $("#net-amount").val(netPayment);

    // Display net payment message
    // alert('Net Payment: ' + netPayment);
});


$(".dynamicform_wrapper").on("beforeInsert", function(e, item) {
    console.log("beforeInsert");
});

$(".dynamicform_wrapper").on("afterInsert", function(e, item) {
    console.log("afterInsert");
});

$(".dynamicform_wrapper").on("beforeDelete", function(e, item) {
    if (! confirm("Are you sure you want to delete this item?")) {
        return false;
    }
    return true;
});
$(".dynamicform_wrapper1").on("beforeDelete", function(e, item1) {
    if (! confirm("Are you sure you want to delete this item?")) {
        return false;
    }
    return true;
});

$(".dynamicform_wrapper2").on("beforeDelete", function(e, item1) {
    if (! confirm("Are you sure you want to delete this item?")) {
        return false;
    }
    return true;
});

$(".dynamicform_wrapper").on("afterDelete", function(e) {
    console.log("Deleted item!");
});

$(".dynamicform_wrapper").on("limitReached", function(e, item) {
    alert("Limit reached");
});
$(".dynamicform_wrapper1").on("limitReached", function(e, item1) {
    alert("Limit reached");
});

$(".dynamicform_wrapper2").on("limitReached", function(e, item1) {
    alert("Limit reached");
});

// $('#shortcode').on('change',function(){
//     var shortcodeId = $(this).val();
//     $.get('index.php?r=paymentshortcode%2Fgetold',{ shortcodeId : shortcodeId },function(data){
//         console.log(data); 
//         var data = $.parseJSON(data);
//         $('#Paymentvoucherwork-OldHeadOfAccount').attr('value',data.OldHeadOfAccount);
//         $('#Paymentvoucherwork-RationalizedHeadOfAccount').attr('value',data.RationalizedHeadOfAccount);
//         $('#Paymentvoucherwork-DrOrCr').attr('value',data.DrOrCr);
//     })
// });

$('#shortcode').on('change', function () {
  var shortcodeId = $(this).val();
  $.get('index.php?r=paymentshortcode%2Fgetold', { shortcodeId: shortcodeId }, function (data) {
    console.log(data);

    // Check if the data is already an object
    if (typeof data === 'object') {
      $('#Paymentvoucherwork-OldHeadOfAccount').val(data.OldHeadOfAccount);
      $('#Paymentvoucherwork-RationalizedHeadOfAccount').val(data.RationalizedHeadOfAccount);
      $('#Paymentvoucherwork-DrOrCr').val(data.DrOrCr);
    } else {
      // If the data is a JSON-encoded string, parse it
      try {
        var parsedData = $.parseJSON(data);
        $('#Paymentvoucherwork-OldHeadOfAccount').val(parsedData.OldHeadOfAccount);
        $('#Paymentvoucherwork-RationalizedHeadOfAccount').val(parsedData.RationalizedHeadOfAccount);
        $('#Paymentvoucherwork-DrOrCr').val(parsedData.DrOrCr);
      } catch (e) {
        console.error('Error parsing JSON data:', e);
      }
    }
  });
});

JS;
$this->registerJS($script);
?>