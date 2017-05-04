<?php

use pendalf89\filemanager\Module;
use app\assets\media\ModalAsset;
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = Module::t('main', 'Files');
$this->params['breadcrumbs'][] = ['label' => Module::t('main', 'Media'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = $this->title;

ModalAsset::register($this);
?>

<iframe src="<?= Url::to(['file/filemanager']) ?>" id="post-original_thumbnail-frame" frameborder="0" role="filemanager-frame"></iframe>