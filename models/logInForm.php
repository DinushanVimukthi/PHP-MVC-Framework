<?php

namespace app\models;

use app\core\Application;
use app\core\Model;

class logInForm extends Model
{

    public string $email='';
    public string $password='';

    public function rules(): array
    {
        // TODO: Implement rules() method.
        return [
            'email' => [
                self::RULE_REQUIRED,self::RULE_EMAIL
            ],
            'password' => [
                self::RULE_REQUIRED
            ],
        ];

    }

    public function labels():array
    {
        return[
            'email' => 'Your Email',
            'password' => 'Password'
        ];
    }

    public function login()
    {
        $user=User::findOne(['email' => $this->email]);

        if(!$user)
        {
            $this->addError('email','Invalid Account EMAIL!');
            return false;
        }
        if(!password_verify($this->password,$user->password))
        {
            $this->addError('password','Incorrect Password!');
            return false;
        }
//        echo '<pre>';
//        var_dump($user);
//        echo '</pre>';
//        exit();


        Application::$app->login($user);
        return true;
    }
}