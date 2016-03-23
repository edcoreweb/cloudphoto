<?php

namespace App\Jobs;

use App\Photo;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Queue;
use Shpasser\GaeSupportL5\Queue\GaeJob;

class ProcessPhoto extends GaeJob implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    /**
     * Current photo.
     *
     * @var Photo
     */
    protected $photo;

    /**
     * Create a new job instance.
     *
     * @param Photo $photo
     */
    public function __construct(Photo $photo)
    {
        $this->photo = $photo;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        sleep(5);

        Log::info('processed' . $this->photo->id);

    }
}
