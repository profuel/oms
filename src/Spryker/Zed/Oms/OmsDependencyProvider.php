<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Spryker\Zed\Oms;

use Spryker\Zed\Graph\Communication\Plugin\GraphPlugin;
use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class OmsDependencyProvider extends AbstractBundleDependencyProvider
{

    const CONDITION_PLUGINS = 'CONDITION_PLUGINS';

    const COMMAND_PLUGINS = 'COMMAND_PLUGINS';

    const QUERY_CONTAINER_SALES = 'QUERY_CONTAINER_SALES';

    const PLUGIN_GRAPH = 'PLUGIN_GRAPH';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        $container[self::CONDITION_PLUGINS] = function (Container $container) {
            return $this->getConditionPlugins($container);
        };

        $container[self::COMMAND_PLUGINS] = function (Container $container) {
            return $this->getCommandPlugins($container);
        };

        $container[self::PLUGIN_GRAPH] = function (Container $container) {
            return $this->getGraphPlugin();
        };

        return $container;
    }

    /**
     * Overwrite in project
     *
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Oms\Communication\Plugin\Oms\Condition\ConditionInterface[]
     */
    protected function getConditionPlugins(Container $container)
    {
        return [];
    }

    /**
     * Overwrite in project
     *
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Oms\Communication\Plugin\Oms\Command\CommandInterface[]
     */
    protected function getCommandPlugins(Container $container)
    {
        return [
        ];
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return void
     */
    public function providePersistenceLayerDependencies(Container $container)
    {
        $container[self::QUERY_CONTAINER_SALES] = function (Container $container) {
            return $container->getLocator()->sales()->queryContainer();
        };
    }

    /**
     * @return \Spryker\Shared\Graph\GraphInterface
     */
    protected function getGraphPlugin()
    {
        return new GraphPlugin('Statemachine', [], true, false);
    }

}
