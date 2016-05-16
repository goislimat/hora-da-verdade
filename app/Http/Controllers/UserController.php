<?php

namespace Verdade\Http\Controllers;

use Illuminate\Database\QueryException;
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
        $usuario = $this->userService->show($id);

        return view('usuario.mostrar', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = $this->userRepository->find($id);
        $cursos = $this->cursoRepository->lists('nome', 'id');

        return view('usuario.editar', compact('usuario', 'cursos'));
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
        $this->userRepository->update($request->all(), $id);

        return redirect()->route('index.usuario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $this->userRepository->delete($id);

            return redirect()->route('index.usuario');
        }
        catch(QueryException $e)
        {
            $usuario = $this->userService->show($id);

            $erro = [
                'mensagem' => 'Esse usuário bloqueou a exclusão pela existência de dependências',
                'solucao' => [
                    'A exclusão desse item, somente será possível após a exclusão de suas dependências',
                    'Para excluir suas dependências, exclua todos as disciplinas e provas exibidas nas listas abaixo',
                    'Para exclusão em massa, contacte o administrador do sistema'
                ]
            ];

            return view('usuario.mostrar', compact('usuario', 'erro'));
        }
    }

    public function buscar(Request $request)
    {
        $usuarios = $this->userService->buscar($request->campo, $request->valor);

        return view('usuario.index', compact('usuarios'));
    }
}
