<?php
namespace Tinitter\Test;

use \Tinitter\Model\Post as M_Post;

class Farming
{
    static function farmingPost($num)
    {
        $faker = \Faker\Factory::create();
        for($i = 0; $i < $num; $i++){
            $post = new M_Post;
            $post->nickname = $faker->firstName;
            $post->body = $faker->paragraph(2);
            $post->save();
        }
    }
}