<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Artisan;

class ImportCSVJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var string
     */
    private $csvFilePath;

    /**
     * @var string
     */
    private $type;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($type, $csvFilePath)
    {
        $this->csvFilePath = $csvFilePath;
        $this->type = $type;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Artisan::call('kpeiz:import-videos', ['csvPath' => $this->csvFilePath]);
    }
}
