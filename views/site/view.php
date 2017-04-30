<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use pendalf89\blog\Module;
use pendalf89\blog\helpers\Helper;

/* @var $this yii\web\View */
/* @var $model pendalf89\blog\models\Post */

$this->title = $model->title;
$this->params['breadcrumbs'][] = $model->alias;
?>
<div class="post-view">

    <h1><?= Html::encode($model->title) ?></h1>

    <?= $model->content ?>

</div>