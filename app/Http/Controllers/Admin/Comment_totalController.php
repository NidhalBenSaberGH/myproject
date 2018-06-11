<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;

class Comment_totalController extends Controller
{
    public function index()
    {
        if (! Gate::allows('comment_total_access')) {
            return abort(401);
        }
        return view('admin.comment_total.index');
    }
}
