<?php

namespace App\Events;

use App\Events\Event;
use App\Models\Patient;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewPhysicals extends Event
{
    use SerializesModels;

    public $patient;
    public $newWeight;
    public $oldWeight;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Patient $patient, $oldWeight, $newWeight)
    {
        $this->patient = $patient;
        $this->newWeight = $newWeight;
        $this->oldWeight = $oldWeight;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
