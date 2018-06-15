<?php
namespace App\Http\Controllers\Admin;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;

class Comment_likesController extends Controller
{
    public function index()
    {
        if (! Gate::allows('comment_likes_access')) {
            return abort(401);
        }
        return view('admin.comment_likes.index');
    }
    public function chart()
    {
      //   $result = Comment::with('videos')->get();
        //return response()->json($result);
    }
}
