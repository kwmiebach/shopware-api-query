<?php
/**
 * @category  Shopware
 * @package   Shopware\Plugins\KwmiebachExtendApiDql
 */
class Shopware_Controllers_Api_Query extends Shopware_Controllers_Api_Rest
{

   /**
     * @var Shopware\Components\Api\Resource\Query
     */
    protected $resource = null;

    public function init()
    {
        $this->resource = \Shopware\Components\Api\Manager::getResource('query');
    }

    /**
     * Get DQL query result
     *
     * GET /api/query/?q={dql}
     */

    public function indexAction()
    {
        $q = $this->Request()->getParam('q');

        $result = $this->resource->getList($q);

        $this->View()->assign($result);
        $this->View()->assign('success', true);
    }
}
