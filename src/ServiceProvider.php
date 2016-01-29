<?php

namespace Presentation\Charts;

use Presentation\Framework\Rendering\RendererInterface;
use Presentation\Framework\Rendering\SimpleRenderer;
use Presentation\Framework\Service\Container\WritableContainerInterface;
use Presentation\Framework\Service\ServiceName;
use Presentation\Framework\Service\ServiceProviderInterface;
use RuntimeException;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(WritableContainerInterface $container)
    {
        $this->registerViews(dirname(__DIR__) . '/resources/views', $container);
    }

    protected function registerViews($path, WritableContainerInterface $container)
    {
        $container->extend(
            ServiceName::RENDERER,
            function (RendererInterface $renderer) use ($path) {
                if (!$renderer instanceof SimpleRenderer) {
                    throw new RuntimeException('Charts supports only SimpleRenderer. You have ' . get_class($renderer));
                }
                $renderer->registerViewsPath($path);
            }
        );
    }

}