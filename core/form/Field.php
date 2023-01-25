<?php

namespace app\core\form;


class Field{
    public string $type;
    public $model;
    public string $attribute;

    public string $label;

    public const TYPE_TEXT = 'text';
    public const TYPE_PASSWORD = 'password';
    public const TYPE_NUMBER = 'number';


    public function __construct($model,$attribute,$label){
        $this->type = self::TYPE_TEXT;
        $this->model = $model;
        $this->attribute = $attribute;
        $this->label = $label;
    }

    public function __toString()
    {
        return sprintf('
        <div class="field">
            <label class="label">%s</label>
            <div class="control">
                <input class="input%s" type="%s" name="%s" placeholder="请输入%s" value="%s">
            </div>
            <p class="help%s">%s</p>
        </div>',$this->label,
            $this->model->hasError($this->attribute) ?' is-danger':'',
            $this->type,
            $this->attribute,
            $this->label,
            $this->model->{$this->attribute},
            $this->model->hasError($this->attribute) ?' is-danger':'',
            $this->model->getFirstError($this->attribute));
    }

    public function passwordField()
    {
        $this->type = self::TYPE_PASSWORD;
        return $this;
    }
}