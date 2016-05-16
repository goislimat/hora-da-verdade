<?php

namespace Verdade\Http\Controllers;

use Illuminate\Http\Request;

use Verdade\Http\Requests;
use Verdade\Http\Requests\UserRequest;
use Verdade\Repositories\CursoRepository;
use Verdade\Repositories\UserRepository;
use Verdade\Services\UserService;

class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var UserService
     */
    private $userService;
    /**
     * @var CursoRepository
     */
    private $cursoRepository;

    /**
     * UserController constructor.
     * @param UserRepository $userRepository
     * @param UserService $userService
     * @param CursoRepository $cursoRepository
     */
    public function __construct(UserRepository $userRepository, UserService $userService, CursoRepository $cursoRepository)
    {
        $this->userRepository = $userRepository;
        $this->userService = $userService;
        $this->cursoRepository = $cursoRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = $this->userService->index();

        return view('usuario.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cursos = $this->cursoRepository->lists('nome', 'id');

        return view('usuario.novo', compact('cursos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request|UserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $this->userService->store($request->all());

        return redirect()->route('index.usuario');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request|UserRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function buscar(Request $request)
    {
        $usuarios = $this->userService->buscar($request->campo, $request->valor);

        return view('usuario.index', compact('usuarios'));
    }
}
