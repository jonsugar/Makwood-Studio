<?php

declare(strict_types=1);

namespace MakwoodStudio\Project\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use MakwoodStudio\Project\Models\Project;

class NewProject implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    /** Create a new job instance. */
    public function __construct(
        public Project $project,
    ) {
        Log::debug('Queue Test: Constructor');
    }

    /** Execute the job. */
    public function handle(): void
    {
        Mail::to('jon@example.com')->send(new \MakwoodStudio\Project\Mail\NewProject($this->project));
    }
}
