<?php

use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $model \yii2mod\settings\models\SettingModel */

$this->title = 'Update Setting: ' . $model->section . '.' . $model->key;
$this->params['breadcrumbs'][] = ['label' => 'Settings', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="setting-update">

    <?php echo $this->render('_form', [
        'model' => $model
    ]);
    ?>

</div>
