<?php

namespace app\models;
use app\core\Model;

class RegisterModel extends Model{
    public string $username;
    public string $email;
    public string $password;
    public string $confirmPassword;

    
    public function register()
    {
        return "创建一个新用户";
    }

    //定义规则
    
	/**
	 * @return mixed
	 */
	public function rules() {
        return [
            'username' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED,self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED,
                [self::RULE_MIN,'min'=>3],
                [self::RULE_MAX,'max'=>8]],
            'confirmPassword' => [self::RULE_REQUIRED,
                [self::RULE_MIN,'min'=>3],
                [self::RULE_MAX,'max'=>8],
                [self::RULE_MATCH,'match'=>'password']],
        ];
	}
}