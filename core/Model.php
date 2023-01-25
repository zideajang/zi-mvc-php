<?php

namespace app\core;


abstract class Model{

    public const RULE_REQUIRED = 'required';
    public const RULE_EMAIL = 'email';
    public const RULE_MIN = 'min';
    public const RULE_MAX = 'max';
    public const RULE_MATCH = 'match';

    public function loadData($data)
    {
        foreach ($data as $key => $value){
            if(property_exists($this,$key)){
                $this->{$key} = $value;
            }
        }
    }

    abstract public function rules();

    public array $errors = [];


    public function validate(){
        foreach($this->rules() as $attribute => $rules){
            $value = $this->{$attribute};
            foreach ($rules as $rule){
                // Utility::show($rule);
                $ruleName = $rule;

                // self::RULE_REQUIRED 或者 []
                if(!is_string($ruleName)){
                    $ruleName = $rule[0];
                }
                if($ruleName === self::RULE_REQUIRED && !$value){
                    $this->addError($attribute, self::RULE_REQUIRED);
                }
                if($ruleName === self::RULE_EMAIL && !filter_var($value,FILTER_VALIDATE_EMAIL)){
                    $this->addError($attribute, self::RULE_EMAIL);
                }
                // [self::RULE_REQUIRED,[self::RULE_MIN,'min'=>3],[self::RULE_MAX,'max'=>8]]
                if($ruleName === self::RULE_MIN && strlen($value) < $rule['min']){
                    $this->addError($attribute, self::RULE_MIN,$rule);
                }

                if($ruleName === self::RULE_MAX && strlen($value) > $rule['max']){
                    $this->addError($attribute, self::RULE_MAX,$rule);
                }

                if($ruleName === self::RULE_MATCH && $value != $this->{$rule['match']}){
                    $this->addError($attribute, self::RULE_MATCH,$rule);
                }
            }
        }

        return empty($this->errors);
    }

    public function addError($attribute, $rule, $params = [])
    {
        $message = $this->errorMessages()[$rule] ?? '';
        foreach($params as $key=> $value){
            $message = str_replace("{{$key}}", $value, $message);
        }
        $this->errors[$attribute][] = $message;
    }

    public function errorMessages()
    {
        return [
            self::RULE_REQUIRED => '这个字段是必填字段',
            self::RULE_EMAIL => '请输入有效的邮件地址',
            self::RULE_MIN => '字段最小长度为 {min}',
            self::RULE_MAX => '字段的最大长度为 {max}',
            self::RULE_MATCH => '请输出内容给 {match} 字段内容保持一致',
        ];
    }
}