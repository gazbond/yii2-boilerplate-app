<?php

use pendalf89\blog\Module;
use pendalf89\blog\assets\TranslitAsset;

/* @var $this yii\web\View */
/* @var $model pendalf89\blog\models\Category */

$this->title = Module::t('main', 'New category');
$this->params['breadcrumbs'][] = ['label' => Module::t('main', 'Content'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Module::t('main', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

if ($this->context->module->autoTranslit) {
    TranslitAsset::register($this);
}
?>
<div class="category-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
