<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "valuable".
 *
 * @property int $id
 * @property string $ReceievedForm
 * @property int $ReferenceLetterNo
 * @property string $NatureOfValuable
 * @property int $Amount
 * @property string $SectionToWhichTheValuableBelong
 * @property string $ReferenceLetterDate
 */
class Valuable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'valuable';
    }

    /** 
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ReceievedForm', 'ReferenceLetterNo', 'NatureOfValuable', 'Amount', 'SectionToWhichTheValuableBelong', 'ReferenceLetterDate'], 'required'],
            [['ReferenceLetterNo', 'Amount'], 'integer'],
            [['ReferenceLetterDate'], 'safe'],
            [['ReceievedForm', 'NatureOfValuable', 'SectionToWhichTheValuableBelong'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ReceievedForm' => 'Receieved Form',
            'ReferenceLetterNo' => 'Reference Letter No',
            'NatureOfValuable' => 'Nature Of Valuable',
            'Amount' => 'Amount',
            'SectionToWhichTheValuableBelong' => 'Section To Which The Valuable Belong',
            'ReferenceLetterDate' => 'Reference Letter Date',
        ];
    }
}
