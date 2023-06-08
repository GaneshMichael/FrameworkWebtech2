<?php

namespace app\Application\EventDispatcher;

use app\Application\EventDispatcher\Interfaces\ListenerProviderInterface;

class EventDispatcher implements EventDispatcherInterface
{
    private ListenerProviderInterface $ListenerProvider;

    public function __construct(ListenerProviderInterface $ListenerProvider)
    {
        $this->ListenerProvider = $ListenerProvider;
    }

    public function dispatch(object $event): void
    {
        foreach ($this->ListenerProvider->getListenersForEvent($event) as $listener) {
            $listener($event);
        }
    }


}