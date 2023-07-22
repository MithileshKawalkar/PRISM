<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contractordetails".
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $vat_tin_no
 * @property string $cst_tin_no
 * @property string $gst
 * @property string $contactPerson
 * @property string $contactPerson2
 * @property string $phoneNo
 * @property string $mobileNo
 * @property string $acHolderName
 * @property int $accountNo
 * @property string $ifscCode
 * @property string $bankName
 * @property string $branch
 * @property int $currentAccount
 */
class Contractordetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contractordetails';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'address', 'vat_tin_no', 'cst_tin_no', 'gst', 'contactPerson', 'contactPerson2', 'phoneNo', 'mobileNo', 'acHolderName', 'accountNo', 'ifscCode', 'bankName', 'branch', 'currentAccount'], 'required'],
            [['accountNo', 'currentAccount'], 'integer'],
            [['name', 'address'], 'string', 'max' => 150],
            [['vat_tin_no', 'cst_tin_no', 'ifscCode'], 'string', 'max' => 15],
            [['gst'], 'string', 'max' => 30],
            [['contactPerson', 'contactPerson2', 'acHolderName'], 'string', 'max' => 25],
            [['phoneNo', 'mobileNo'], 'string', 'max' => 255],
            [['bankName', 'branch'], 'string', 'max' => 20],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'address' => 'Address',
            'vat_tin_no' => 'Vat Tin No',
            'cst_tin_no' => 'Cst Tin No',
            'gst' => 'Gst',
            'contactPerson' => 'Contact Person',
            'contactPerson2' => 'Contact Person2',
            'phoneNo' => 'Phone No',
            'mobileNo' => 'Mobile No',
            'acHolderName' => 'Ac Holder Name',
            'accountNo' => 'Account No',
            'ifscCode' => 'Ifsc Code',
            'bankName' => 'Bank Name',
            'branch' => 'Branch',
            'currentAccount' => 'Current Account',
        ];
    }
}
