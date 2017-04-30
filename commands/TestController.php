<?php namespace app\commands;

use yii\console\Controller;
use Yii;

/**
 * Class TestController. An easy to execute space for figuring things out.
 *
 * @package app\commands
 */
class TestController extends Controller
{

    public function actionIndex()
    {
        $db = Yii::$app->db;

        $db->createCommand()->delete('user')->execute();
        $db->createCommand()->delete('auth_item')->execute();
        $db->createCommand()->delete('blog_post')->execute();
        $db->createCommand()->delete('blog_type')->execute();
    }
}
