<?php

namespace Verdade\Http\Controllers;

use Illuminate\Http\Request;

use Verdade\Http\Requests;
use Verdade\Repositories\DisciplinaRepository;
use Verdade\Repositories\ProvaRepository;

class ProvaController extends Controller
{
    /**
     * @var ProvaRepository
     */
    private $provaRepository;
    /**
     * @var DisciplinaRepository
     */
    private $disciplinaRepository;

    /**
     * ProvaController constructor.
     * @param ProvaRepository $provaRepository
     * @param DisciplinaRepository $disciplinaRepository
     */
    public function __construct(ProvaRepository $provaRepository, DisciplinaRepository $disciplinaRepository)
    {
        $this->provaRepository = $provaRepository;
        $this->disciplinaRepository = $disciplinaRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($disciplinaId)
    {
        $provas = $this->provaRepository->findWhere(['disciplina_id' => $disciplinaId]);
        $disciplina = $this->disciplinaRepository->find($disciplinaId);

        return view('prova.index', compact('provas', 'disciplina'));
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
}
