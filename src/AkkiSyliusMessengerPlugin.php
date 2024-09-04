<?php
declare(strict_types=1);


namespace Akki\SyliusMessengerPlugin;

use Akki\SyliusMessengerPlugin\DependencyInjection\Compiler\MessengerSettableContextMiddlewarePass;
use Sylius\Bundle\CoreBundle\Application\SyliusPluginTrait;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

final class AkkiSyliusMessengerPlugin extends Bundle
{
    use SyliusPluginTrait;

    public function build(ContainerBuilder $container): void
    {
        parent::build($container);

        $container->addCompilerPass(pass: new MessengerSettableContextMiddlewarePass(), priority: 100);
    }
}
