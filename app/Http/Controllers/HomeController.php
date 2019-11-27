<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\BasicRequest;
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
        $posts = Post::where('user_id',Auth::user()->id)->latest()->Paginate(4);

        $login_user = [
          'user' => $user,
          'posts' => $posts
        ];
        return view('home',['login_user' => $login_user]);
    }

    /* 詳細ページ表示 */
    public function about(Post $post) {
      return view('about',['post' => $post]);
    }

    public function store(BasicRequest $request) {
      $post = new Post;
      $form = $request->all();
      unset($form['_token']);
      $post->fill($form)->save();
      return redirect('home');
    }

    public function edit(Post $post) {
      $user = User::where('name',Auth::user()->name)->first();

      $login_user = [
        'user' => $user,
        'post' => $post
      ];
      return view('edit',['login_user' => $login_user]);
    }

    public function update(Post $post) {
      $post->user_id = request('user_id');
      $post->title = request('title');
      $post->body= request('body');
      $post->save();

      return view('about',['post' => $post]);
    }

    public function delete(Post $post) {
      \App\Post::where('id',$post->id)->delete();
      return redirect('home');
    }
}
