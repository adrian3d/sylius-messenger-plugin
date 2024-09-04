<?php
declare(strict_types=1);


namespace Akki\SyliusMessengerPlugin\Stamp;

use Symfony\Component\Messenger\Stamp\StampInterface;

final class ChannelContextStamp implements StampInterface
{
    public function __construct(
        public readonly string $channelCode
    )
    {

    }
}
