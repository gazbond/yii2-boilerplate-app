<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use pendalf89\blog\Module;

/* @var $this yii\web\View */
/* @var $model pendalf89\blog\models\Category */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Module::t('main', 'Content'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Module::t('main', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-view">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> ' . Module::t('main', 'Update'),
            ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-trash"></span> ' . Module::t('main', 'Delete'),
            ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'parent_id',
                'value' => $model->getParentTitle(),
            ],
            'title',
            'alias',
            'position',
        ],
    ]) ?>

</div>
