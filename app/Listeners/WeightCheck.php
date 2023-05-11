<?php

namespace App\Listeners;

use App\Events\NewPhysicals;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class WeightCheck
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewPhysicals  $event
     * @return void
     */
    public function handle(NewPhysicals $event)
    {
        $percentage = (($event->oldWeight - $event->newWeight) / $event->oldWeight) * 100;

        if ($percentage < 0)
        {
            $percentage = $percentage * -1;
        }

        if ($percentage >= 5 AND $event->patient->has_weight_warning == false)
        {
            $event->patient->has_weight_warning = true;
        }
        else
        {
            $event->patient->has_weight_warning = false;
        }

        $event->patient->save();
    }
}
