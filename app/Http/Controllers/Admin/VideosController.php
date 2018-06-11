<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;

class VideosController extends Controller
{
    public function index()
    {
        if (! Gate::allows('video_access')) {
            return abort(401);
        }
        return view('admin.videos.index');
    }
}