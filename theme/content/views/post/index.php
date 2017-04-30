<?php

use yii\helpers\Html;
use yii\grid\GridView;
use pendalf89\blog\Module;
use pendalf89\blog\models\Post;
use pendalf89\blog\models\Type;
use pendalf89\blog\models\Category;
use pendalf89\blog\helpers\Helper;
use pendalf89\blog\assets\BlogAsset;

/* @var $this yii\web\View */
/* @var $searchModel pendalf89\blog\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Module::t('main', 'Posts');
$this->params['breadcrumbs'][] = ['label' => Module::t('main', 'Content'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = $this->title;

BlogAsset::register($this);
?>
<div class="post-index">

    <div class="row">
        <div class="col-md-4">
            <?= $this->render('_new', ['model' => $model]) ?>
        </div>
        <?php if ($titles = Post::getTitles()) : ?>
            <div class="col-md-4">
                <?php echo $this->render('_search', ['model' => $searchModel, 'titles' => $titles]); ?>
            </div>
        <?php endif; ?>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            [
//                'attribute' => 'original_thumbnail',
//                'format' => 'html',
//                'value' => function($model) {
//                        $thumb = $model->getThumbnail($this->context->module->adminThumbnail);
//                        return !empty($thumb) ? Html::a(
//                            Html::img($thumb),
//                            ['post/update', 'id' => $model->id]
//                        ) : '';
//                    },
//            ],
            [
                'attribute' => 'alias',
                'format' => 'html',
                'value' => function($model) {
                        return Html::a($model->alias, ['post/update', 'id' => $model->id]);
                    },
            ],
            [
                'attribute' => 'title',
            ],
            [
                'attribute' => 'category_id',
                'value' => function($model) {
                        return !empty($model->category) ? $model->category->title : null;
                    },
                'filter' => Category::getList(),
            ],
            [
                'attribute' => 'type_id',
                'value' => function($model) {
                        return $model->type->title;
                    },
                'filter' => Type::getList(),
            ],
            [
                'attribute' => 'views',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'],
            ],
            [
                'attribute' => 'publish_status',
                'value' => function($model) {
                        return $model->getStatus();
                    },
                'filter' => Post::getStatuses(),
            ],
            [
                'header' => Module::t('main', 'Last changes'),
                'value' => function($model) {
                        return Yii::$app->formatter->asDatetime($model->getLastChangesTimestamp());
                    },
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {delete}',
                'buttons' => [
                    'view' => function($url, $model) {
                            return Html::a(
                                '<span class="glyphicon glyphicon-eye-open"></span>',
                                $this->context->getViewPostUrl($model),
                                ['target' => '_blank', 'title' => Module::t('main', 'View post on the site')]
                            );
                        }
                ]
            ],
        ],
    ]); ?>

</div>
