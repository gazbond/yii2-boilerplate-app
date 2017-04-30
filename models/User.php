<?php namespace app\models;

use app\components\Utils;
use dektrium\user\models\User as BaseUser;
use OutOfBoundsException;
use Lcobucci\JWT\Token;
use Yii;

class User extends BaseUser
{
    /**
     * @param Token $token
     * @param null $type
     * @return void|\yii\web\IdentityInterface
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        Utils::log('findIdentityByAccessToken');
        try {
            Utils::log('loading token...');
            $id = $token->getClaim('user_id');
            Utils::log('user_id=' . $id);
            $user = self::findOne($id);
            Utils::log($user);
            return $user;

        } catch (OutOfBoundsException $e) {
            Yii::warning("Invalid JWT provided: " . $e->getMessage(), 'jwt');
            return null;
        }
    }
}
