<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "paymentshortcode".
 *
 * @property int $shortcode
 * @property int $OldHeadOfAccount
 * @property int $RationalizedHeadOfAccount
 * @property int $Amount
 * @property int $id
 *
 * @property Paymentvoucherwork $id0
 */
class Paymentshortcode extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'paymentshortcode';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['shortcode', 'OldHeadOfAccount', 'RationalizedHeadOfAccount', 'Amount'], 'required'],
            [['shortcode', 'OldHeadOfAccount', 'RationalizedHeadOfAccount', 'Amount'], 'integer'],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Paymentvoucherwork::class, 'targetAttribute' => ['id' => 'voucherid']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'shortcode' => 'Shortcode',
            'OldHeadOfAccount' => 'Old Head Of Account',
            'RationalizedHeadOfAccount' => 'Rationalized Head Of Account',
            'Amount' => 'Amount',
            'id' => 'ID',
        ];
    }

    /**
     * Gets query for [[Id0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(Paymentvoucherwork::class, ['voucherid' => 'id']);
    }
}
