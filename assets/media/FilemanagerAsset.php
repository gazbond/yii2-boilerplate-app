<?php namespace app\assets\media;

use yii\web\AssetBundle;

class FilemanagerAsset extends AssetBundle
{
    public $sourcePath = '@vendor/pendalf89/yii2-filemanager/assets/source';
    public $css = [
        'css/filemanager.css',
    ];
    public $js = [
        'js/filemanager.js',
    ];
    public $depends = [
        'app\assets\AppAsset',
    ];
}
