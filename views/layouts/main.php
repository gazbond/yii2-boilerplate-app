<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);

$username = Yii::t('app', 'Guest');
if(!Yii::$app->user->isGuest) {
    $username = Yii::$app->user->identity->username;
}
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <base href="">
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>

    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">

    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => Yii::t('app', 'About'), 'url' => ['/site/about']],
            ['label' => Yii::t('app', 'Contact'), 'url' => ['/site/contact']],
            ['label' => Yii::t('app', 'Angular'), 'url' => ['/site/angular']],
            ['label' => Yii::t('app', 'Register'),
                'url' => ['/user/register'],
                'visible' => Yii::$app->user->isGuest
            ],
            ['label' => Yii::t('app', 'Login'),
                'url' => ['/user/login'],
                'visible' => Yii::$app->user->isGuest
            ],
            ['label' => $username,
                'visible' => !Yii::$app->user->isGuest,
                'items' => [
                    ['label' => Yii::t('app', 'Profile'),
                        'url' => ['/user/settings/profile'],
                    ],
                    ['label' => Yii::t('app', 'Account'),
                        'url' => ['/user/settings/account'],
                    ],
                    ['label' => '<li role="separator" class="divider"></li>',
                        'encode' => false,
                        'visible' => Yii::$app->user->can('admin')
                    ],
                    ['label' => Yii::t('app', 'Posts'),
                        'url' => ['/content/post'],
                        'visible' => Yii::$app->user->can('admin')
                    ],
                    ['label' => Yii::t('app', 'Files'),
                        'url' => ['/media/file'],
                        'visible' => Yii::$app->user->can('admin')
                    ],
                    ['label' => Yii::t('app', 'Users'),
                        'url' => ['/user/admin'],
                        'visible' => Yii::$app->user->can('admin')
                    ],
                    ['label' => Yii::t('app', 'Settings'),
                        'url' => ['/settings'],
                        'visible' => Yii::$app->user->can('admin')
                    ],
                    ['label' => '<li role="separator" class="divider"></li>',
                        'encode' => false,
                    ],
                    ['label' => Yii::t('app', 'Logout'),
                        'url' => ['/user/security/logout'],
                        'linkOptions' => ['data-method' => 'post']
                    ],
                ]
            ],
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; gazbond.co.uk <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
