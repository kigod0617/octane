<?php

namespace Laravel\Octane\Listeners;

use Illuminate\Contracts\Pipeline\Hub;

class GiveNewApplicationInstanceToPipelineHub
{
    /**
     * Handle the event.
     *
     * @param  mixed  $event
     * @return void
     */
    public function handle($event)
    {
        if (! $event->sandbox->resolved(Hub::class)) {
            return;
        }

        with($event->sandbox->make(Hub::class), function ($hub) use ($event) {
            $hub->setContainer($event->sandbox);
        });
    }
}
