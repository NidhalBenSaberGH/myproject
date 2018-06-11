<?php

namespace App\Console\Commands;

use App\Video;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ImportVideosFromCSV extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kpeiz:import-videos {csvPath}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import videos from CSV to DB';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $csvPath = $this->argument('csvPath');
        $handle = fopen($csvPath, "r");
        $header =  fgetcsv($handle, null, ",");
        DB::beginTransaction();
        $rows = 0;
        while (($data = fgetcsv($handle, null, ",")) !== FALSE) {
            $rows++;
            $video = $this->findOrCreateVideo($data[0]);
            $video->video_id = $data[0];
            $video->title = $data[1];
            $video->channel_title = $data[2];
            $video->category_id = $data[3];
            $video->tags = $data[4];
            $video->views = $data[5];
            $video->likes = $data[6];
            $video->dislikes = $data[7];
            $video->comment_total = $data[8];
            $video->thumbnail_link = $data[9];
            $video->date = $data[10];

            $video->save();
            $this->info('Video ' . $rows . 'saved');
        }
        DB::commit();
        $this->info($rows . "Video imported successfully from CSV " . $csvPath);
    }

    private function findOrCreateVideo($videoId) {
        $video = Video::where('video_id', '=', $videoId)->first();

        return $video ?: new Video();
    }
}
