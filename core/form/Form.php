<?php
namespace app\core\form;

class Form{

    public static function begin($action,$method)
    {
        echo sprintf('<form class="section" action="%s" method="%s">',$action,$method);
        return new Form();
    }

    public static function end()
    {
        return '</form>';
    }

    public function field($model,$attribute,$label)
    {
        return new Field($model, $attribute, $label);
    }
}