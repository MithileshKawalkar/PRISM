<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user
 *
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePasswordNew'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    // public function validatePassword($attribute, $params)
    // {
    //     if (!$this->hasErrors()) {
    //         $user = $this->getUser();

    //         if (!$user || !$user->validatePassword($this->password)) {
    //             $this->addError($attribute, 'Incorrect username or password.');
    //             // print_r($this->password);
    //             // die();
    //             // echo $this->password;
    //         }
    //         // else{
    //         //     return true;
    //         // }
    //     }
    // }

    public function validatePasswordNew($attribute, $params)
    {
        $user = $this->getUser();
    
        // if (!$user || !$user->validatePassword($this->password)) {
        //     $this->addError($attribute, 'Incorrect username or password.');
        // }
        if($user != null)
        {
            if($this->password !== $user->password_hash)
            {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
        else{
            $this->addError($attribute, 'User not found. Contact the ADMIN if you think this is a problem');
        }
            
            
    }
    
    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);
            // print_r($this->username);
            // die();
        }

        return $this->_user;
    }
}
