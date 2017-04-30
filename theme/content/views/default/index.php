<?php

use yii\helpers\Html;
use pendalf89\blog\Module;
use pendalf89\blog\helpers\Helper;
use pendalf89\blog\assets\BlogAsset;
use pendalf89\filemanager\assets\FilemanagerAsset;

/* @var $this yii\web\View */
/* @var $searchModel pendalf89\blog\models\TypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Module::t('main', 'Content');
$this->params['breadcrumbs'][] = $this->title;

$blogAssetPath = BlogAsset::register($this)->baseUrl;
$fileAssetPath = FilemanagerAsset::register($this)->baseUrl;
?>

<div class="blog-default-index">

    <div class="row">
        <div class="col-md-2">

            <div class="text-center">
                <h2>
                    <?= Html::a(Module::t('main', 'Posts'), ['post/index']) ?>
                </h2>
                <?= Html::a(
                    Html::img($blogAssetPath . '/images/posts.png', ['alt' => 'Notepad'])
                    , ['post/index']
                ) ?>
            </div>
        </div>

        <div class="col-md-3">

            <div class="text-center">
                <h2>
                    <?= Html::a(Module::t('main', 'Files'), ['file/index']) ?>
                </h2>
                <?= Html::a(
                    Html::img($fileAssetPath . '/images/files.png', ['alt' => 'Files'])
                    , ['/filemanager/file/index']
                ) ?>
            </div>
        </div>

        <div class="col-md-2">

            <div class="text-center">
                <h2>
                    <?= Html::a(Module::t('main', 'Categories'), ['category/index']) ?>
                </h2>
                <?= Html::a(
                    Html::img($blogAssetPath . '/images/categories.png', ['alt' => 'Categories'])
                    , ['category/index']
                ) ?>
            </div>
        </div>

        <div class="col-md-3">

            <div class="text-center">
                <h2>
                    <?= Html::a(Module::t('main', 'Post types'), ['type/index']) ?>
                </h2>
                <?= Html::a(
                    Html::img($blogAssetPath . '/images/post-types.png', ['alt' => 'Nightstand'])
                    , ['type/index']
                ) ?>
            </div>
        </div>
        <div class="col-md-2">

            <div class="text-center">
                <h2>
                    <?= Html::a(Module::t('main', 'Thumbnails'), ['/filemanager/default/settings']) ?>
                </h2>
                <?= Html::a(
                    Html::img($blogAssetPath . '/images/settings.png', ['alt' => 'Tools'])
                    , ['/filemanager/default/settings']
                ) ?>
            </div>
        </div>
    </div>
</div>