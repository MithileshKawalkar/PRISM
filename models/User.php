<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\base\Security;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $verification_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password 
 */
class User extends ActiveRecord implements IdentityInterface
{
    // public $password;

    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    // public static function findByUsername($username)
    // {
    //     foreach (self::$users as $user) {
    //         if (strcasecmp($user['username'], $username) === 0) {
    //             return new static($user);
    //         }
    //     }

    //     return null;
    // }
    public function getAssignedPermissions()
    {
        $permissions = [];
        $authAssignments = AuthAssignment::find()
            ->select('item_name')
            ->where(['user_id' => $this->id])
            ->asArray()
            ->all();

        foreach ($authAssignments as $assignment) {
            $permissions[] = $assignment['item_name'];
        }

        return $permissions;
    }


    public function afterDelete()
    {
        // Delete related auth_assignment records
        AuthAssignment::deleteAll(['user_id' => $this->id]);
        
        parent::afterDelete();
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    /**
     * {@inheritdoc}
     */
    // public function rules()
    // {
    //     return [
    //         ['status', 'default', 'value' => self::STATUS_INACTIVE],
    //         ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE, self::STATUS_DELETED]],
    //     ];
    // }

    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE, self::STATUS_DELETED]],
        
            [['username'], 'required'],
            [['username'], 'string', 'max' => 50],
            [['password_hash'], 'safe'],
            // ['password', 'validatePassword'],
        ];
    }

    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        // $user = new User();
        // $user->username = $this->username;
    //    $user->email = $this->email;

        
    //     $user->generateAuthKey();
    // //    $user->generateEmailVerificationToken();
    //    $user->password_hash  = $this->password_hash;
    //    $user->password_hash  = Yii::$app->getSecurity()->generatePasswordHash($this->password);
        // $user->password_hash=$this->password;
        // return $user->save() ;//&& $this->sendEmail($user);
        $user = new User();
        $user->username = $this->username;
        // print_r($this->username);
        // die();
        $user->generateAuthKey();
        // print_r("aaa: ",$user->password);
        // die();
        // $user->setPassword($this->password);
        $user->password_hash = $this->password_hash;
        return $user->save(false);
        // ----------
    }

    
    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds user by verification email token
     *
     * @param string $token verify email token
     * @return static|null
     */
    public static function findByVerificationToken($token) {
        return static::findOne([
            'verification_token' => $token,
            'status' => self::STATUS_INACTIVE
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    
    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    // public function validatePassword($password)
    // {
    //     // print_r($password);
    //     // print_r($this->password_hash);
    //     // die();
   
    //     return Yii::$app->getSecurity()->validatePassword($password, $this->password_hash);

    // }
    // public function validatePassword($password) {
    //     $hash = $this->password_hash;
    //     return Yii::$app->getSecurity()->validatePassword($password, $hash);
    //   }
      
    // /**
    //  * Generates password hash from password and sets it to the model
    //  *
    //  * @param string $password
    //  */
    // public function setPassword($password)
    // {
    //     $this->password_hash = Yii::$app->getSecurity()->generatePasswordHash($password);
    // }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Generates new token for email verification
     */
    public function generateEmailVerificationToken()
    {
        $this->verification_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
}
