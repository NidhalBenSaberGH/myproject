<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function index()
    {
        if (! Gate::allows('categories_access')) {
            return abort(401);
        }
        return view('admin.categories.index');
    }

    public function chart()
    {
        $result = DB::table('videos')
            ->select(DB::raw('count(*) as Count_videos, category_id'))
            ->groupBy('category_id')
            ->get()->all();

        return response()->json($result);
    }
}
