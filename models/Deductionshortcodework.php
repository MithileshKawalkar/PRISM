<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "deductionshortcode".
 *
 * @property int $id
 * @property int $shortcode
 * @property int $OldHeadOfAccount
 * @property int $RationalizedHeadOfAccount
 * @property int $Amount
 */
class Deductionshortcodework extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'deductionshortcode';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['shortcode', 'OldHeadOfAccount', 'RationalizedHeadOfAccount', 'Amount'], 'required'],
            [['shortcode', 'OldHeadOfAccount', 'RationalizedHeadOfAccount', 'Amount'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'shortcode' => 'Shortcode',
            'OldHeadOfAccount' => 'Old Head Of Account',
            'RationalizedHeadOfAccount' => 'Rationalized Head Of Account',
            'Amount' => 'Amount',
        ];
    }
}
