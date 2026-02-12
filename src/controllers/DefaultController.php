<?php

namespace pragmatic\plus18\controllers;

use Craft;
use craft\web\Controller;
use pragmatic\plus18\PragmaticPlus18;
use yii\web\Response;

class DefaultController extends Controller
{
    protected int|bool|array $allowAnonymous = false;

    public function actionIndex(): Response
    {
        return $this->redirect('pragmatic-plus18/general');
    }

    public function actionGeneral(): Response
    {
        return $this->renderTemplate('pragmatic-plus18/general', [
            'settings' => PragmaticPlus18::$plugin->getSettings(),
        ]);
    }

    public function actionOptions(): Response
    {
        $languages = [];
        foreach (Craft::$app->getSites()->getAllSites() as $site) {
            $languages[] = $site->language;
        }

        return $this->renderTemplate('pragmatic-plus18/options', [
            'settings' => PragmaticPlus18::$plugin->getSettings(),
            'languages' => array_values(array_unique($languages)),
        ]);
    }
}
