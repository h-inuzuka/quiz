<?php
namespace Quiz\Validator;

class Quiz extends \Respect\Validation\Validator
{
    static function byArray(array $params)
    {
        $error_list = [];

        if(!static::notEmpty()->validate($params['title'])){
            $error_list['title'] = 'タイトルを入力してください';
        }

        return $error_list;
    }
}