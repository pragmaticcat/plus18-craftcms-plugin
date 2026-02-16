<?php

namespace pragmatic\plus18\controllers;

use Craft;
use craft\helpers\Cp;
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
        $selectedSite = Cp::requestedSite() ?? Craft::$app->getSites()->getPrimarySite();

        return $this->renderTemplate('pragmatic-plus18/general', [
            'settings' => PragmaticPlus18::$plugin->getSettings(),
            'selectedSite' => $selectedSite,
            'selectedSiteId' => (int)$selectedSite->id,
        ]);
    }

    public function actionOptions(): Response
    {
        $selectedSite = Cp::requestedSite() ?? Craft::$app->getSites()->getPrimarySite();

        return $this->renderTemplate('pragmatic-plus18/options', [
            'settings' => PragmaticPlus18::$plugin->getSettings(),
            'selectedSite' => $selectedSite,
            'selectedSiteId' => (int)$selectedSite->id,
        ]);
    }
}
