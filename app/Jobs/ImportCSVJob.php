<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class ImportCSVJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var string
     */
    private $csvFilePath;


    /**
     * @var String
     */
    private  $command;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($command, $csvFilePath)
    {
        $this->csvFilePath = $csvFilePath;
        $this->command = $command;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::debug('Upload file Running command');

        Artisan::call($this->command, ['csvPath' => $this->csvFilePath]);
    }
}
