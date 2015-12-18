<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Spryker\Zed\Oms\Communication;

use Spryker\Zed\Oms\Communication\Table\TransitionLogTable;
use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;
use Spryker\Zed\Oms\Persistence\OmsQueryContainerInterface;
use Spryker\Zed\Oms\OmsConfig;

/**
 * @method OmsQueryContainerInterface getQueryContainer()
 * @method OmsConfig getConfig()
 */
class OmsCommunicationFactory extends AbstractCommunicationFactory
{

    /**
     * @return Table\TransitionLogTable
     */
    public function createTransitionLogTable()
    {
        $queryContainer = $this->getQueryContainer();

        return new TransitionLogTable($queryContainer);
    }

}
