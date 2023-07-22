<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use app\models\Paymentvouchersalary;
use app\models\Paymentshortcode;
use yii\base\Model;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;


/** @var yii\web\View $this */
/** @var app\models\Vouchersalary $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="vouchersalary-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'voucherid')->textInput() ?>

    <?= $form->field($model, 'NatureOfPayment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ModeOfPayment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SanctionRefNo')->textInput() ?>

    <?= $form->field($model, 'SanctionDate')->textInput() ?>

    <?= $form->field($model, 'NameOfEmployee')->textInput(['maxlength' => true]) ?>

    <div class="row">
    <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i> Paymentvouchersalary</h4></div>
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 20, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelsPaymentvouchersalary[0],
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
            <?php foreach ($modelsPaymentvouchersalary as $i => $modelPaymentvouchersalary): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <!-- <h3 class="panel-title pull-left">Paymentvouchersalary</h3> -->
                        <div class="pull-right">
                            <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelPaymentvouchersalary->isNewRecord) {
                                echo Html::activeHiddenInput($modelPaymentvouchersalary, "[{$i}]id");
                            }
                        ?>
                        <div class="row">
                            <!-- <div class="col-sm-6">
                            <?php //<?= $form->field($modelPaymentvouchersalary, "[{$i}]shortcode")->widget(Select2::classname(),[
                            //'data' => ArrayHelper::map(Paymentshortcode::find()->all(),'id','shortcode'),
                            //'language'=> 'en',
                            //'options' => ['placeholder' => 'Select shortcode','id'=>'shortcode'],
                            
                           //  ]);  ?> -->

                           <div class="col-sm-2">
                                <?= $form->field($modelPaymentvouchersalary, "[{$i}]shortcode")->textInput(['maxlength' => true]) ?>
                            </div>

                             <div class="col-sm-3">
                                <?= $form->field($modelPaymentvouchersalary, "[{$i}]OldHeadOfAccount")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-3">
                                <?= $form->field($modelPaymentvouchersalary, "[{$i}]RationalizedHeadOfAccount")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-2">
                                <?= $form->field($modelPaymentvouchersalary, "[{$i}]DrOrCr")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-2">
                                <?= $form->field($modelPaymentvouchersalary, "[{$i}]Amount")->textInput(['maxlength' => true, 'class' => 'payment-amount']) ?>
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
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i> Deductionvouchersalary</h4></div>
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper1', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items2', // required: css class selector
                'widgetItem' => '.item2', // required: css class
                'limit' => 20, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item2', // css class
                'deleteButton' => '.remove-item2', // css class
                'model' => $modelsDeductionvouchersalary[0],
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
            <?php foreach ($modelsDeductionvouchersalary as $i => $modelDeductionvouchersalary): ?>
                <div class="item2 panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <!-- <h3 class="panel-title pull-left">Paymentvouchersalary</h3> -->
                        <div class="pull-right">
                            <button type="button" class="add-item2 btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item2 btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelDeductionvouchersalary->isNewRecord) {
                                echo Html::activeHiddenInput($modelDeductionvouchersalary, "[{$i}]id");
                            }
                        ?>
                        <div class="row">
                            <!-- <div class="col-sm-6">
                            <?php //<?= $form->field($modelPaymentvouchersalary, "[{$i}]shortcode")->widget(Select2::classname(),[
                            //'data' => ArrayHelper::map(Paymentshortcode::find()->all(),'id','shortcode'),
                            //'language'=> 'en',
                            //'options' => ['placeholder' => 'Select shortcode','id'=>'shortcode'],
                            
                           //  ]);  ?> -->

                           <div class="col-sm-2">
                                <?= $form->field($modelDeductionvouchersalary, "[{$i}]shortcode")->textInput(['maxlength' => true]) ?>
                            </div>

                             <div class="col-sm-3">
                                <?= $form->field($modelDeductionvouchersalary, "[{$i}]OldHeadOfAccount")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-3">
                                <?= $form->field($modelDeductionvouchersalary, "[{$i}]RationalizedHeadOfAccount")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-2">
                                <?= $form->field($modelDeductionvouchersalary, "[{$i}]DrOrCr")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-2">

                                <?= $form->field($modelDeductionvouchersalary, "[{$i}]Amount")->textInput(['maxlength' => true, 'class' => 'deduction-amount']) ?>

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
        <button type="button" class="add-item btn btn-success btn-xs" style="margin-left:63vw;display:flex;justify-content:flex-end;" id="calc-payment" >Calculate net payment</button>    
    </div>
    
    
    <div class="row">
    <div class="panel3 panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i> Netpayvouchersalary</h4></div>
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper2', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items3', // required: css class selector
                'widgetItem' => '.item3', // required: css class
                'limit' => 20, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item3', // css class
                'deleteButton' => '.remove-item3', // css class
                'model' => $modelsNetpayvouchersalary[0],
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
            <?php foreach ($modelsNetpayvouchersalary as $i => $modelNetpayvouchersalary): ?>
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
                            if (! $modelNetpayvouchersalary->isNewRecord) {
                                echo Html::activeHiddenInput($modelNetpayvouchersalary, "[{$i}]id");
                            }
                        ?>
                          <div class="row">
                            

                           <div class="col-sm-2">
                                <?= $form->field($modelNetpayvouchersalary, "[{$i}]shortcode")->textInput(['maxlength' => true]) ?>
                            </div>

                             <div class="col-sm-3">
                                <?= $form->field($modelNetpayvouchersalary, "[{$i}]OldHeadOfAccount")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-3">
                                <?= $form->field($modelNetpayvouchersalary, "[{$i}]RationalizedHeadOfAccount")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-2">
                                <?= $form->field($modelNetpayvouchersalary, "[{$i}]DrOrCr")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-2">

                                <?= $form->field($modelNetpayvouchersalary, "[{$i}]Amount")->textInput(['maxlength' => true,'id' => 'net-amount']) ?>

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


$('#shortcode').change(function(){
    var shortcodeId = $(this).val();
    $.get('index.php?r=Paymentshortcode%2Fget-OldHeadOfAccount-RationalizedHeadOfAccount-Amount',{ shortcodeId : shortcodeId },function(data){
        // console.log(data); 
        var data = $.parseJSON(data);
        $('#Paymentvouchersalary-OldHeadOfAccount').attr('value',data.OldHeadOfAccount);
        $('#Paymentvouchersalary-RationalizedHeadOfAccount').attr('value',data.RationalizedHeadOfAccount);
        $('#Paymentvouchersalary-Amount').attr('value',data.Amount);
    })
});
JS;
$this->registerJS($script);
?>