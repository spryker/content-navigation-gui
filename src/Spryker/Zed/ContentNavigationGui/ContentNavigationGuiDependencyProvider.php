<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ContentNavigationGui;

use Spryker\Zed\ContentNavigationGui\Dependency\Facade\ContentNavigationGuiToContentNavigationFacadeBridge;
use Spryker\Zed\ContentNavigationGui\Dependency\Facade\ContentNavigationGuiToContentNavigationFacadeInterface;
use Spryker\Zed\ContentNavigationGui\Dependency\Facade\ContentNavigationGuiToNavigationFacadeBridge;
use Spryker\Zed\ContentNavigationGui\Dependency\Facade\ContentNavigationGuiToNavigationFacadeInterface;
use Spryker\Zed\ContentNavigationGui\Dependency\Service\ContentNavigationGuiToUtilEncodingServiceBridge;
use Spryker\Zed\ContentNavigationGui\Dependency\Service\ContentNavigationGuiToUtilEncodingServiceInterface;
use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

/**
 * @method \Spryker\Zed\ContentNavigationGui\ContentNavigationGuiConfig getConfig()
 */
class ContentNavigationGuiDependencyProvider extends AbstractBundleDependencyProvider
{
    /**
     * @var string
     */
    public const FACADE_CONTENT_NAVIGATION = 'FACADE_CONTENT_NAVIGATION';

    /**
     * @var string
     */
    public const FACADE_NAVIGATION = 'FACADE_NAVIGATION';

    /**
     * @var string
     */
    public const SERVICE_UTIL_ENCODING = 'SERVICE_UTIL_ENCODING';

    public function provideCommunicationLayerDependencies(Container $container): Container
    {
        $container = parent::provideCommunicationLayerDependencies($container);
        $container = $this->addContentNavigationFacade($container);
        $container = $this->addNavigationFacade($container);
        $container = $this->addUtilEncodingService($container);

        return $container;
    }

    protected function addContentNavigationFacade(Container $container): Container
    {
        $container->set(static::FACADE_CONTENT_NAVIGATION, function (Container $container): ContentNavigationGuiToContentNavigationFacadeInterface {
            return new ContentNavigationGuiToContentNavigationFacadeBridge(
                $container->getLocator()->contentNavigation()->facade(),
            );
        });

        return $container;
    }

    protected function addNavigationFacade(Container $container): Container
    {
        $container->set(static::FACADE_NAVIGATION, function (Container $container): ContentNavigationGuiToNavigationFacadeInterface {
            return new ContentNavigationGuiToNavigationFacadeBridge(
                $container->getLocator()->navigation()->facade(),
            );
        });

        return $container;
    }

    protected function addUtilEncodingService(Container $container): Container
    {
        $container->set(static::SERVICE_UTIL_ENCODING, function (Container $container): ContentNavigationGuiToUtilEncodingServiceInterface {
            return new ContentNavigationGuiToUtilEncodingServiceBridge(
                $container->getLocator()->utilEncoding()->service(),
            );
        });

        return $container;
    }
}
