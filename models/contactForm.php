<?php
namespace app\models;
use \app\core\Model;

class contactForm extends Model
{
    public string $subject='';
    public string $email='';
    public string $body='';
    public function rules(): array
    {
        return[
            'subject'=>[
                self::RULE_REQUIRED
            ],
            'email'=>[
                self::RULE_REQUIRED,self::RULE_EMAIL
            ],
            'body'=>[
                self::RULE_REQUIRED
            ],
        ];

    }

    public function labels():array
    {
        return[
            'subject'=>'Subject',
            'email'=>'Email',
            'body'=>'Enter Your Message',
        ];
    }

    public function send()
    {
        return true;
    }
}