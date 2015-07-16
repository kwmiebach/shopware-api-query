<?php
namespace Shopware\Components\Api\Resource;

use Shopware\Components\Api\Exception as ApiException;

/**
 * @category  Shopware
 * @package   Shopware\Plugins\KwmiebachExtendApiDql
 */
class Query extends Resource
{
    public function getList($q)
    {
        $this->checkPrivilege('read');

        if (empty($q)) {
            throw new ApiException\ParameterMissingException();
        }

        $query = Shopware()->Models()->createQuery($q);
        $query->setHydrationMode(\Doctrine\ORM\AbstractQuery::HYDRATE_ARRAY);

        $paginator = new \Doctrine\ORM\Tools\Pagination\Paginator($query);

        //total count of result rows
        $totalResult = $paginator->count();

        //item data as array
        $items = $paginator->getIterator()->getArrayCopy();

        return array('data' => $items, 'total' => $totalResult);
    }
}
