<?php

use yii\helpers\Html;
use pendalf89\filemanager\Module;
use app\assets\media\FilemanagerAsset;

/* @var $this yii\web\View */

$this->title = Module::t('main', 'Media');
$this->params['breadcrumbs'][] = $this->title;

$assetPath = FilemanagerAsset::register($this)->baseUrl;
?>

<div class="filemanager-default-index">

    <div class="row">
        <div class="col-md-6">

            <div class="text-center">
                <h2>
                    <?= Html::a(Module::t('main', 'Files'), ['file/index']) ?>
                </h2>
                <?= Html::a(
                    Html::img($assetPath . '/images/files.png', ['alt' => 'Files'])
                    , ['file/index']
                ) ?>
            </div>
        </div>

        <div class="col-md-6">

            <div class="text-center">
                <h2>
                    <?= Html::a(Module::t('main', 'Settings'), ['default/settings']) ?>
                </h2>
                <?= Html::a(
                    Html::img($assetPath . '/images/settings.png', ['alt' => 'Tools'])
                    , ['default/settings']
                ) ?>
            </div>
        </div>
    </div>
</div>