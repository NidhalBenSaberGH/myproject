<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;

class ChannelsController extends Controller
{
    public function index()
    {
        if (! Gate::allows('channels_access')) {
            return abort(401);
        }
        return view('admin.channels.index');
    }

    public function chart()
    {
        $result = DB::table('videos')
            ->select(DB::raw('count(*) as Count_videos, channel_title'))
            ->groupBy('channel_title')
            ->take(10)->get();

        return response()->json($result);
    }
}
