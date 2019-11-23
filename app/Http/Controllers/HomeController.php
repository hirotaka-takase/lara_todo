<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */

    /*
    ログインユーザーから名前と投稿（全て）を抽出しviewnに連想配列で渡す
    */
    public function index()
    {
        $user = User::where('name',Auth::user()->name)->first();
        $name = $user->name;
        $posts = Post::where('user_id',Auth::user()->id)->latest()->get();

        $login_user = [
          'name' => $name,
          'posts' => $posts
        ];
        return view('home',['login_user' => $login_user]);
    }

    public function about(Post $post) {
      return view('about',['post' => $post]);
    }
}
