<?php
/**
 * Created by phuong17889.
 * @project yii2-basic
 * @author  Phuong
 * @email   phuong17889[at]gmail.com
 * @date    5/4/2016
 * @time    3:43 PM
 */

namespace phuong17889\base;

use Yii;

class Module extends \yii\base\Module
{

    /**
     * Check if has phuong17889\multilanguage
     * @return bool
     */
    public static function hasMultiLanguage()
    {
        return (Yii::$app->hasModule('language') && Yii::$app->getModule('language') instanceof \phuong17889\language\Module);
    }

    /**
     * Check if has phuong17889\setting
     * @return bool
     */
    public static function hasSetting()
    {
        return (Yii::$app->hasModule('setting') && Yii::$app->getModule('setting') instanceof \phuong17889\setting\Module && in_array('setting', array_keys(Yii::$app->components)) && Yii::$app->components['setting']['class'] == \phuong17889\setting\Setting::className());
    }

    /**
     * Check if has phuong17889\role
     * @return bool
     */
    public static function hasUserRole()
    {
        return (Yii::$app->hasModule('role') && Yii::$app->getModule('role') instanceof \phuong17889\role\Module);
    }

    /**
     * check which Yii kit? basic or advanced
     * @return bool
     */
    public static function isAdvanced()
    {
        return Yii::getAlias('@common', false) !== false;
    }

    /**
     * check which Yii kit? basic or advanced
     * @return bool
     */
    public static function isBasic()
    {
        return !self::isAdvanced();
    }

    /**
     * @return string current base path
     */
    public static function getAppPath()
    {
        if (self::isAdvanced()) {
            return dirname(Yii::getAlias('@common', false));
        } else {
            return Yii::$app->basePath;
        }
    }
}
