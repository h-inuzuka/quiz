<?php
namespace TestCase\Model;

use \Tinitter\Model\Post as M_Post;

class PostTest extends \Tinitter\Test\Base
{
    public function testPostCreate()
    {
        //1件保存する
        $post = new M_Post;
        $post->nickname = 'nickname';
        $post->body = 'body';
        $post->save();
        
        //正しく保存されたか確認
        $id = $post->id;
        $same_post = M_Post::findOrFail($id);
        $this->assertEquals($same_post->nickname, 'nickname');
        $this->assertEquals($same_post->body, 'body');
    }
}
