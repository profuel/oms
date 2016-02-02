<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Spryker\Zed\Oms\Communication\Controller;

use Spryker\Zed\Application\Communication\Controller\AbstractController;
use Spryker\Zed\Oms\Business\OmsFacade;
use Spryker\Zed\Oms\Communication\OmsCommunicationFactory;
use Spryker\Zed\Oms\Persistence\OmsQueryContainerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method OmsFacade getFacade()
 * @method OmsQueryContainerInterface getQueryContainer()
 * @method OmsCommunicationFactory getFactory()
 */
class LogController extends AbstractController
{

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return mixed
     */
    public function indexAction(Request $request)
    {
        $transitionLogTable = $this->getFactory()->createTransitionLogTable();

        return $this->viewResponse(['transitionLogTable' => $transitionLogTable->render()]);
    }

        /**
         * @param \Symfony\Component\HttpFoundation\Request $request
         *
         * @return mixed
         */
    public function tableAjaxAction(Request $request)
    {
        $transitionLogTable = $this->getFactory()->createTransitionLogTable();

        return $this->jsonResponse($transitionLogTable->fetchData());
    }

}