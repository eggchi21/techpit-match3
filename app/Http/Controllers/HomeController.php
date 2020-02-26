<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

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
    public function index()
    {
      $from_user_id = Auth::id();

      $users = User::whereNotIn('id', [$from_user_id])->get();


      $userCount = $users->count();
      return view('home', compact('users','userCount', 'from_user_id'));
    }
}
