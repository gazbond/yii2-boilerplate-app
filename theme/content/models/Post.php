<?php namespace app\theme\content\models;

use pendalf89\blog\models\Post as BasePost;

class Post extends BasePost
{
    public function rules()
    {
        return [
            [['category_id', 'type_id', 'publish_status', 'created_at', 'updated_at'], 'integer'],
            [['type_id', 'title', 'alias', 'content'], 'required'],
            [['meta_description', 'preview', 'content', 'thumbnail'], 'string'],
            [['title', 'title_seo', 'alias'], 'string', 'max' => 255],
            ['category_id', 'required', 'on' => 'required_category'],
        ];
    }
}
