<?php
declare(strict_types=1);


namespace Akki\SyliusMessengerPlugin\Middleware;

use Akki\SyliusMessengerPlugin\Stamp\LocaleContextStamp;
use Akki\SyliusSettableLocalePlugin\Context\SettableLocaleContextInterface;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Middleware\MiddlewareInterface;
use Symfony\Component\Messenger\Middleware\StackInterface;

final class SetLocaleContextMiddleware implements MiddlewareInterface
{
    public function __construct(
        private readonly SettableLocaleContextInterface $settableLocaleContext
    )
    {
    }

    public function handle(Envelope $envelope, StackInterface $stack): Envelope
    {
        $localeContextStamp = $envelope->last(LocaleContextStamp::class);

        if (null !== $localeContextStamp) {
            $this->settableLocaleContext->setLocaleCode($localeContextStamp->localeCode);
        }

        $envelope = $stack->next()->handle($envelope, $stack);

        if (null !== $localeContextStamp) {
            $this->settableLocaleContext->reset();
        }

        return $envelope;
    }

}
