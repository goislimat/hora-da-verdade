<?php

namespace Verdade\Http\Controllers;

use Illuminate\Auth\AuthManager as Auth;
use Verdade\Http\Requests;

class HomeController extends Controller
{
    /**
     * @var Auth
     */
    private $auth;

    /**
     * Create a new controller instance.
     *
     * @param Auth $auth
     */
    public function __construct(Auth $auth)
    {
        $this->middleware('auth');
        $this->auth = $auth;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = $this->auth->user();

        return view('home', compact('usuario'));
    }
}
