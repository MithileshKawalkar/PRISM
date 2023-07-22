<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "netpayvouchersalary".
 *
 * @property int $id
 * @property int $voucherid
 * @property string $shortcode
 * @property int $OldHeadOfAccount
 * @property int $RationalizedHeadOfAccount
 * @property string $DrOrCr
 * @property int $Amount
 *
 * @property Vouchersalary $voucher
 */
class Netpayvouchersalary extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'netpayvouchersalary';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'shortcode', 'OldHeadOfAccount', 'RationalizedHeadOfAccount', 'DrOrCr', 'Amount'], 'required'],
            [[ 'OldHeadOfAccount', 'RationalizedHeadOfAccount', 'Amount'], 'integer'],
            [['shortcode'], 'string', 'max' => 30],
            [['DrOrCr'], 'string', 'max' => 10],
            [['voucherid'], 'exist', 'skipOnError' => true, 'targetClass' => Vouchersalary::class, 'targetAttribute' => ['voucherid' => 'id']],
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
            'shortcode' => 'Shortcode',
            'OldHeadOfAccount' => 'Old Head Of Account',
            'RationalizedHeadOfAccount' => 'Rationalized Head Of Account',
            'DrOrCr' => 'Dr Or Cr',
            'Amount' => 'Amount',
        ];
    }

    /**
     * Gets query for [[Voucher]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVoucher()
    {
        return $this->hasOne(Vouchersalary::class, ['id' => 'voucherid']);
    }
}
