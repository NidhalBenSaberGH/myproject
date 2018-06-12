<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;

class LikesController extends Controller
{
    public function index()
    {
        if (! Gate::allows('like_access')) {
            return abort(401);
        }
        return view('admin.likes.index');
    }

    public function chart()
    {
        $result = DB::table('videos')
            ->orderBy('likes', 'DESC')
            ->take(10)->get();
        return response()->json($result);
    }
}
