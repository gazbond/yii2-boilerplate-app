<?php namespace app\assets\media;

use yii\web\AssetBundle;

class FileInputAsset extends AssetBundle
{
    public $sourcePath = '@vendor/pendalf89/yii2-filemanager/assets/source';

    public $js = [
        'js/fileinput.js',
    ];

    public $depends = [
        'app\assets\AppAsset',
        'pendalf89\filemanager\assets\ModalAsset',
    ];
}
