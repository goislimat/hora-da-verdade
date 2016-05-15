<?php

namespace Verdade\Http\Controllers;

use Illuminate\Http\Request;

use Verdade\Http\Requests;
use Verdade\Repositories\CursoRepository;
use Verdade\Services\CursoService;

class CursoController extends Controller
{
    /**
     * @var CursoRepository
     */
    private $cursoRepository;
    /**
     * @var CursoService
     */
    private $cursoService;

    /**
     * CursoController constructor.
     * @param CursoRepository $
     * @param CursoService $cursoService
     * @internal param CursoRepository $cursoRepository
     */
    public function __construct(CursoRepository $cursoRepository, CursoService $cursoService)
    {
        $this->cursoRepository = $cursoRepository;
        $this->cursoService = $cursoService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = $this->cursoService->index();

        return view('curso.index', compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
        $cursos = $this->cursoService->buscar($request->campo, $request->valor);

        return view('curso.index', compact('cursos'));
    }
}
