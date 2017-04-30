<?php

use yii\web\View;

/* @var $this yii\web\View */
/* @var $identity yii\web\IdentityInterface */

$this->title = 'Angular v4';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJsFile('@web/dist/shims.js', [
    'position' => View::POS_END
]);

$this->registerJsFile('@web/dist/bundle.js', [
    'position' => View::POS_END
]);
?>

<app-component>
    <span class="container">Loading...</span>
</app-component>