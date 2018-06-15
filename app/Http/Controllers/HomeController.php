<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function datatable()
    {
        $data =
        [
            'video_id' => 'video_id',
            'title' => 'title',
            'channel_title' => 'channel_title',
            'category_id' => 'category_id',
            'tags' => 'tags',
            'views' => 'views',
            'likes' => 'likes',
            'dislikes' => 'dislikes',
            'comment_total' => 'comment_total',
            'thumbnail_link' => 'thumbnail_link',
            'date' => 'date'
        ];

    }
}