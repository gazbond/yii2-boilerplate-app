<?php namespace app\assets\media;

use yii\web\AssetBundle;

class ModalAsset extends AssetBundle
{
    public $sourcePath = '@vendor/pendalf89/yii2-filemanager/assets/source';
    public $css = [
        'css/modal.css',
    ];
    public $depends = [
        'app\assets\AppAsset',
    ];
}
