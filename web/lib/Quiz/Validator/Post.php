<?php
namespace Tinitter\Validator;

class Post extends \Respect\Validation\Validator
{
    static function byArray(array $params)
    {
        $error_list = [];
        
        if(!static::alnum()->validate($params['nickname'])){
            $error_list['nickname'] = '半角の英数字と空白だけにしてください';
        }
        
        if(!static::length(1, 16)->validate($params['nickname'])){
            $error_list['nickname'] = '1〜16文字以内にしてください';
        }
        
        if(!static::length(1, 1000)->validate($params['body'])){
            $error_list['body'] = '1〜1000文字以内にしてください';
        }
        return $error_list;
    }
}