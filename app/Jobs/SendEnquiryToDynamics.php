<?php

namespace App\Jobs;

use App\Helpers\Dynamics_Helper;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendEnquiryToDynamics implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /** How long the job may run before it’s killed (seconds) */
    public int $timeout = 90;

    /** Max attempts before going to failed_jobs */
    public int $tries   = 5;

    /** The web-enquiry payload */
    public function __construct(private array $payload) {}

    /**
     * Optional: progressive back-off between retries
     * (30 s → 2 m → 10 m → 30 m …)
     */
    public function backoff(): array
    {
        return [30, 120, 600, 1800];
    }

    /** Do the work */
    public function handle(): void
    {
        Dynamics_Helper::send($this->payload);
    }

    /**
     * How long the worker should sleep when the queue is empty.
     */
    public function sleep(): int
    {
        return 3;
    }
}
