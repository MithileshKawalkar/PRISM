<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vouchersalary".
 *
 * @property int $id
 * @property int $voucherid
 * @property string $NatureOfPayment
 * @property string $ModeOfPayment
 * @property int $SanctionRefNo
 * @property string $SanctionDate
 * @property string $NameOfEmployee
 *
 * @property Deductionvouchersalary[] $deductionvouchersalaries
 * @property Paymentvouchersalary[] $paymentvouchersalaries
 */
class Vouchersalary extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vouchersalary';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'NatureOfPayment', 'ModeOfPayment', 'SanctionRefNo', 'SanctionDate', 'NameOfEmployee'], 'required'],
            [['voucherid', 'SanctionRefNo'], 'integer'],
            [['SanctionDate'], 'safe'],
            [['NatureOfPayment', 'ModeOfPayment', 'NameOfEmployee'], 'string', 'max' => 30],
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
            'SanctionRefNo' => 'Sanction Ref No',
            'SanctionDate' => 'Sanction Date',
            'NameOfEmployee' => 'Name Of Employee',
            'status' => 'status',
        ];
    }

    /**
     * Gets query for [[Deductionvouchersalaries]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDeductionvouchersalaries()
    {
        return $this->hasMany(Deductionvouchersalary::class, ['voucherid' => 'id']);
    }

    /**
     * Gets query for [[Paymentvouchersalaries]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentvouchersalaries()
    {
        return $this->hasMany(Paymentvouchersalary::class, ['voucherid' => 'id']);
    }
    public function getNetpayvouchersalaries()
    {
        return $this->hasMany(Netpayvouchersalary::class, ['voucherid' => 'id']);
    }
}
