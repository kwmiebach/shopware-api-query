<?php
/**
 * @category  Shopware
 * @package   Shopware\Plugins\KwmiebachExtendApiDql
 */
class Shopware_Plugins_Core_KwmiebachExtendApiDql_Bootstrap extends Shopware_Components_Plugin_Bootstrap
{
    /**
     * @return bool
     */
    public function install()
    {
        $this->subscribeEvents();
        return true;
    }

    /**
     * Register necessary events and hooks
     */
    private function subscribeEvents()
    {
        $this->subscribeEvent(
            'Enlight_Controller_Front_StartDispatch',
            'onEnlightControllerFrontStartDispatch'
        );

        $this->subscribeEvent(
            'Enlight_Controller_Dispatcher_ControllerPath_Api_Query',
            'onGetQueryApiController'
        );
    }

    /**
     * @param Enlight_Event_EventArgs $args
     */
    public function onEnlightControllerFrontStartDispatch(Enlight_Event_EventArgs $args)
    {
        $this->Application()->Loader()->registerNamespace(
            'Shopware\Components',
            $this->Path() . 'Components/'
        );
    }

    /**
     * @return string
     */
    public function onGetQueryApiController()
    {
        return $this->Path() . 'Controllers/Api/Query.php';
    }
}
