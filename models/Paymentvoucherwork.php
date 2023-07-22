<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "paymentvoucherwork".
 *
 * @property int $id
 * @property int $voucherid
 * @property int $shortcode
 * @property int $OldHeadOfAccount
 * @property int $RationalizedHeadOfAccount
 * @property string $DrOrCr
 * @property int $Amount
 *
 * @property Paymentshortcode $paymentshortcode
 * @property Voucherwork $voucher
 */
class Paymentvoucherwork extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'paymentvoucherwork';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'shortcode', 'OldHeadOfAccount', 'RationalizedHeadOfAccount', 'DrOrCr', 'Amount'], 'required'],
            [[ 'shortcode', 'OldHeadOfAccount', 'RationalizedHeadOfAccount', 'Amount'], 'integer'],
            [['DrOrCr'], 'string', 'max' => 10],
            [['voucherid'], 'exist', 'skipOnError' => true, 'targetClass' => Voucherwork::class, 'targetAttribute' => ['voucherid' => 'id']],
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
     * Gets query for [[Paymentshortcode]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentshortcode()
    {
        return $this->hasOne(Paymentshortcode::class, ['id' => 'voucherid']);
    }

    /**
     * Gets query for [[Voucher]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVoucher()
    {
        return $this->hasOne(Voucherwork::class, ['id' => 'voucherid']);
    }
    
}
