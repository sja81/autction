<?php

namespace app\models;

use Faker\Provider\bg_BG\PhoneNumber;
use Yii;
use yii\base\Model;

class RegisterForm extends Model
{
    public $username;
    public $password;
    public $firstName;
    public $lastName;
    public $phoneNumber;
    public $email;
    public $password_repeat;

    public function rules()
    {
        return [
            [['username', 'password', 'password_repeat', 'firstName', 'lastName', 'phoneNumber', 'email'], 'required'],
            ['password_repeat', 'compare', 'compareAttribute' => 'password'],
            ['email','email']
        ];
    }

    public function signup()
    {
        $user = new User();
        $user->username = $this->username;
        $user->first_name = $this->firstName;
        $user->last_name = $this->lastName;
        $user->phone_number = $this->phoneNumber;
        $user->email = $this->email;
        $user->password = Yii::$app->security->generatePasswordHash($this->password); 
        $user->access_token =Yii::$app->security->generateRandomString(); 
        $user->auth_key =Yii::$app->security->generateRandomString(); 

        if($user->save())
        {
            return true;
        }

        Yii::error('User was not saved');
        return false;
    }
}
