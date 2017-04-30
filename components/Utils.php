<?php
/**
 * User: gazbond
 * Date: 15/04/2015
 * Time: 16:48
 */

namespace app\components;

use yii\db\ActiveRecord;
use yii\helpers\VarDumper;
use Yii;
use yii\db\Expression;

class Utils
{
    public static function log($data, $route = 'info', $visible = true)
    {
        $log = function ($data, $route) {
            switch ($route) {
                case 'info':
                    Yii::info($data);
                    break;
                case 'trace':
                    Yii::trace($data);
                    break;
                case 'warning':
                    Yii::warning($data);
                    break;
                case 'error':
                    Yii::error($data);
                    break;
            }
        };
        if ($visible === false) return;

        if ($data instanceof ActiveRecord) {
            $name = $data::tableName();
            $result = array(
                'name' => $name,
                'attributes' => $data->attributes
            );
            $log("[ActiveRecord]" . VarDumper::dumpAsString($result), $route);
        } else if (is_array($data) && isset($data[0]) && $data[0] instanceof ActiveRecord) {
            $results = array();
            foreach ($data as $i => &$item) {
                $name = $item::tableName();
                $results[] = array(
                    'name' => $name,
                    'attributes' => $item->attributes
                );
            }
            $log("[ActiveRecord]" . VarDumper::dumpAsString($results), $route);
        } else if (is_object($data) || is_array($data)) {
            $log(VarDumper::dumpAsString($data), $route);
        } else $log($data, $route);
    }

    public static function timeSince($since)
    {
        $chunks = array(
            array(60 * 60 * 24 * 365, Yii::t('app', 'year')),
            array(60 * 60 * 24 * 30, Yii::t('app', 'month')),
            array(60 * 60 * 24 * 7, Yii::t('app', 'week')),
            array(60 * 60 * 24, Yii::t('app', 'day')),
            array(60 * 60, Yii::t('app', 'hour')),
            array(60, Yii::t('app', 'minute')),
            array(1, Yii::t('app', 'second'))
        );

        for ($i = 0, $j = count($chunks); $i < $j; $i++) {
            $seconds = $chunks[$i][0];
            $name = $chunks[$i][1];
            if (($count = floor($since / $seconds)) != 0) {
                break;
            }
        }

        $print = ($count == 1) ? '1 ' . $name : "$count {$name}s";
        return $print;
    }
}
