<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "voucherwork".
 *
 * @property int $id
 * @property int $voucherid
 * @property string $NatureOfPayment
 * @property string $ModeOfPayment
 * @property int $WorkOrderRefNo
 * @property string $WorkOrderDate
 * @property string $Description
 * @property string $NameOfContractor
 *
 * @property Paymentvoucherwork[] $paymentvoucherworks
 */
class Voucherwork extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'voucherwork';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'NatureOfPayment', 'ModeOfPayment', 'WorkOrderRefNo', 'WorkOrderDate', 'Description', 'NameOfContractor'], 'required'],
            [[ 'WorkOrderRefNo'], 'integer'],
            [['WorkOrderDate'], 'safe'],
            [['Description'], 'string'],
            [['NatureOfPayment', 'ModeOfPayment'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'voucherid' => 'Voucherid',
            'NatureOfPayment' => 'Nature Of Payment',
            'ModeOfPayment' => 'Mode Of Payment',
            'WorkOrderRefNo' => 'Work Order Ref No',
            'WorkOrderDate' => 'Work Order Date',
            'Description' => 'Description',
            'NameOfContractor' => 'Name Of Contractor',
            'status' => 'status',
        ];
    }

    /**
     * Gets query for [[Paymentvoucherworks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentvoucherworks()
    {
        return $this->hasMany(Paymentvoucherwork::class, ['voucherid' => 'id']);
    }
    public function getDeductionvoucherworks()
    {
        return $this->hasMany(Deductionvoucherwork::class, ['voucherid' => 'id']);
    }
    public function getNetpayvoucherworks()
    {
        return $this->hasMany(Netpayvoucherwork::class, ['voucherid' => 'id']);
    }
}
