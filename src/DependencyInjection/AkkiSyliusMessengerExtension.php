<?php
declare(strict_types=1);


namespace Akki\SyliusMessengerPlugin\DependencyInjection;

use Akki\SyliusMessengerPlugin\Middleware\SetChannelContextMiddleware;
use Akki\SyliusMessengerPlugin\Middleware\SetLocaleContextMiddleware;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Extension\Extension;

final class AkkiSyliusMessengerExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container): void
    {
        $container
            ->setDefinition('akki.sylius_messenger.set_channel_context_middleware', (new Definition(SetChannelContextMiddleware::class))->setAbstract(true));

        $container
            ->setDefinition('akki.sylius_messenger.set_locale_context_middleware', (new Definition(SetLocaleContextMiddleware::class))->setAbstract(true));
    }
}
