<?php
namespace App\Http\Controllers\Admin;

use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;

class ViewsController extends Controller
{
    public function index()
    {
        if (! Gate::allows('view_access')) {
            return abort(401);
        }

        return view('admin.views.index');
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */

    public function chart()
    {
        $result = DB::table('videos')
            ->orderBy('views', 'DESC')
            ->take(10)->get();
        return response()->json($result);
    }
}
