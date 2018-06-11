<?php
namespace App\Console\Commands;
use App\Comment;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ImportCommentsFromCSV extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kpeiz:import-comments {csvPath}';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import comments from CSV to DB';
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
        while (($data = fgetcsv($handle, null, ",",'"','"')) !== FALSE) {

            $rows++;
            $comment = new Comment();
            $comment->video_id = $data[0];
            $comment->comment_text = $data[1];
            //dd(intval($data[2]));
            $comment->likes =  intval($data[2]);
            $comment->replies = intval($data[3]);
            $comment->save();
            $this->info('Comment ' . $rows . 'saved');
        }
        DB::commit();
        $this->info($rows . "Comment imported successfully from CSV " . $csvPath);
    }

}
