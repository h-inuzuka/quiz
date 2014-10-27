<?php
namespace Quiz\Validator;

class Question extends \Respect\Validation\Validator
{
    static function byArray(array $params)
    {
        $error_list = [];
        /*
        var_dump($params);
        exit;
        */
        if(!static::notEmpty()->validate($params['title'])){
            $error_list['title'] = 'タイトルを入力してください';
        }
        
        if(!static::notEmpty()->validate($params['content'])){
            $error_list['content'] = '問題を入力してください';
        }
        
        if(!static::notEmpty()->validate($params['choice1'])){
            $error_list['choice1'] = '選択肢１を入力してください';
        }
        
        
        if(!static::notEmpty()->validate($params['choice2'])){
            $error_list['choice2'] = '選択肢２を入力してください';
        }
        
        if(!static::notEmpty()->validate($params['choice3'])){
            $error_list['choice3'] = '選択肢３を入力してください';
        }
        
        if(!static::notEmpty()->validate($params['choice4'])){
            $error_list['choice4'] = '選択肢４を入力してください';
        }
        
        if(!static::notEmpty()->validate($params['correct_answer'])){
            $error_list['correct_answer'] = '正答を入力してください';
        }

        return $error_list;
    }
}