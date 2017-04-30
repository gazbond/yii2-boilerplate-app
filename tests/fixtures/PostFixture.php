<?php namespace app\tests\fixtures;

use yii\test\Fixture;
use Yii;
use pendalf89\blog\models\Type;
use pendalf89\blog\models\Post;

/**
 * Class UserFixture
 */
class PostFixture extends Fixture
{
    /**
     * Load the fixture
     */
    public function load()
    {
        // Create Posts/Types

        $pageType = Yii::createObject([
            'class'   => Type::className(),
            'title' => 'Page',
            'alias' => 'page',
        ]);
        $pageType->save();

        $blogType = Yii::createObject([
            'class'   => Type::className(),
            'title' => 'Blog',
            'alias' => 'blog',
        ]);
        $blogType->save();

        $aboutPost = Yii::createObject([
            'class'   => Post::className(),
            'id' => 1,
            'type_id' => $pageType->id,
            'alias' => 'About',
            'title' => 'About Company Name',
            'title_seo' => 'About',
            'preview' => '<p>Comany Info here</p>',
            'content' => '<p>Comany Info here</p>'
        ]);
        $aboutPost->save();

        $contactPost = Yii::createObject([
            'class'   => Post::className(),
            'id' => 2,
            'type_id' => $pageType->id,
            'alias' => 'Contact',
            'title' => 'Contact Company Name',
            'title_seo' => 'Company Name',
            'preview' => '<p>If you have business inquiries or other questions, please fill out the following form to contact us.Thank you.</p>',
            'content' => '<p>If you have business inquiries or other questions, please fill out the following form to contact us.Thank you.</p>'
        ]);
        $contactPost->save();

        $blogPost = Yii::createObject([
            'class'   => Post::className(),
            'id' => 3,
            'type_id' => $blogType->id,
            'alias' => 'test-blog-post',
            'title' => 'Test Blog Post',
            'title_seo' => 'test blog post',
            'preview' => '<p>Test blog post</p>',
            'content' => '<p>Test blog post</p>'
        ]);
        $blogPost->save();
    }

    /**
     * Unload the fixture
     */
    public function unload()
    {
        $db = Yii::$app->db;

        $db->createCommand()->delete('blog_post')->execute();
        $db->createCommand()->delete('blog_type')->execute();
    }
}
