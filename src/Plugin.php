<?php

namespace GlueAgency\Trigger;

use GlueAgency\Trigger\Controllers\TriggerController;
use GlueAgency\Trigger\Models\Settings;
use craft\events\RegisterCpNavItemsEvent;
use craft\web\twig\variables\Cp;
use yii\base\Event;
use craft\helpers\UrlHelper;
use craft\web\UrlManager;
use craft\events\RegisterUrlRulesEvent;
use yii\web\NotFoundHttpException;
use Craft;

class Plugin extends \craft\base\Plugin
{
    public $controllerNamespace = '\GlueAgency\Trigger\Controllers';
    public $hasCpSettings = true;
    public $hasCpSection = true;
    public $controllerMap = [
        'trigger' => TriggerController::class,
    ];

    public function init()
    {
        Craft::setAlias('@/GlueAgency/Trigger', __DIR__);

        parent::init();

//        Event::on(
//            UrlManager::class,
//            UrlManager::EVENT_REGISTER_CP_URL_RULES,
//            function (RegisterUrlRulesEvent $event) {
//                $event->rules['trigger/go'] = 'trigger/go';
//            }
//        );
    }

    protected function createSettingsModel()
    {
        return new Settings();
    }

    protected function settingsHtml()
    {
        return \Craft::$app->getView()->renderTemplate('gactrigger/settings', [
            'settings' => $this->getSettings()
        ]);
    }
}
