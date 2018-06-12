<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;

class DislikesController extends Controller
{
    public function index()
    {
        if (! Gate::allows('dislike_access')) {
            return abort(401);
        }
        return view('admin.dislikes.index');
    }

    public function chart()
    {
        $result = DB::table('videos')
            ->orderBy('dislikes', 'DESC')
            ->take(10)->get();
        return response()->json($result);
    }


}
