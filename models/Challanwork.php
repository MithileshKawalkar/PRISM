<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "challanwork".
 *
 * @property int $id
 * @property string $ReceivedForm
 * @property int $ReferenceLetterNo
 * @property string $ReferenceLetterDate
 * @property string $NatureOfValuable
 * @property int $Amount
 * @property string $Shortcode
 * @property int $OldHeadOfAccount
 * @property int $RationalizedHeadofAccount
 * @property string $DrOrCr
 * @property int $ShortcodeAmount
 */
class Challanwork extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'challanwork';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ReceivedForm', 'ReferenceLetterNo', 'ReferenceLetterDate', 'NatureOfValuable', 'Amount', 'Shortcode', 'OldHeadOfAccount', 'RationalizedHeadofAccount', 'DrOrCr', 'ShortcodeAmount'], 'required'],
            [['ReferenceLetterNo', 'Amount', 'OldHeadOfAccount', 'RationalizedHeadofAccount', 'ShortcodeAmount'], 'integer'],
            [['ReferenceLetterDate'], 'safe'],
            [['ReceivedForm', 'NatureOfValuable'], 'string', 'max' => 30],
            [['Shortcode'], 'string', 'max' => 20],
            [['DrOrCr'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ReceivedForm' => 'Received Form',
            'ReferenceLetterNo' => 'Reference Letter No',
            'ReferenceLetterDate' => 'Reference Letter Date',
            'NatureOfValuable' => 'Nature Of Valuable',
            'Amount' => 'Amount',
            'Shortcode' => 'Shortcode',
            'OldHeadOfAccount' => 'Old Head Of Account',
            'RationalizedHeadofAccount' => 'Rationalized Headof Account',
            'DrOrCr' => 'Dr Or Cr',
            'ShortcodeAmount' => 'Shortcode Amount',
        ];
    }
}
