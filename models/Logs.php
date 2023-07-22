<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "logs".
 *
 * @property int $id
 * @property int $byUserId
 * @property string $description
 * @property int $time
 */
class Logs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'logs';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'time', // Use 'time' as the timestamp attribute
                'updatedAtAttribute' => false, // If you don't have an 'updated_at' column, set this to false
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // [['byUserId', 'description', 'time'], 'required'],
            [['byUserId', 'time'], 'integer'],
            [['description'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'byUserId' => 'By User ID',
            'description' => 'Description',
            'time' => 'Time',
        ];
    }
}
