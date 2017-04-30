<?php namespace app\tests\fixtures;

use yii\test\Fixture;
use dektrium\rbac\models\Assignment;
use dektrium\rbac\models\Role;
use Yii;
use app\models\User;

/**
 * Class UserFixture
 */
class UserFixture extends Fixture
{
    /**
     * Load the fixture
     */
    public function load()
    {
        // Create Users

        $user = Yii::createObject([
            'class'    => User::className(),
            'scenario' => 'create',
            'id' => 1,
            'email'    => 'gaz@gazbond.co.uk',
            'username' => 'Gazbond',
            'password' => 'password',
        ]);
        $user->create();

        $user = Yii::createObject([
            'class'    => User::className(),
            'scenario' => 'create',
            'id' => 2,
            'email'    => 'dev@gazbond.co.uk',
            'username' => 'root',
            'password' => 'password',
        ]);
        $user->create();

        // Create and assign Roles

        $role = Yii::createObject([
            'class'   => Role::className(),
            'scenario' => 'create',
            'name' => 'admin',
            'description' => 'administrator role'
        ]);
        $role->save();

        $assignment = Yii::createObject([
            'class'   => Assignment::className(),
            'user_id' => $user->id,
        ]);

        $assignment->items[] = $role->name;
        $assignment->updateAssignments();
    }

    /**
     * Unload the fixture
     */
    public function unload()
    {
        $db = Yii::$app->db;

        $db->createCommand()->delete('user')->execute();
        $db->createCommand()->delete('auth_item')->execute();
    }
}
