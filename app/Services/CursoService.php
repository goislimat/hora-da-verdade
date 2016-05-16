<?php
/**
 * Created by PhpStorm.
 * User: goisl
 * Date: 14/05/2016
 * Time: 19:49
 */

namespace Verdade\Services;


use Illuminate\Http\Response;
use Prettus\Validator\Exceptions\ValidatorException;
use Verdade\Repositories\CursoRepository;

class CursoService
{
    /**
     * @var CursoRepository
     */
    private $cursoRepository;

    /**
     * ServiceClass constructor.
     * @param CursoRepository $cursoRepository
     */
    public function __construct(CursoRepository $cursoRepository)
    {
        $this->cursoRepository = $cursoRepository;
    }

    /**
     * @return array|mixed
     */
    public function index()
    {
        $cursos = $this->cursoRepository->all();

        foreach($cursos as $curso)
        {
            $curso->tipo = $this->getTipoCursoComoTexto($curso->tipo);
        }

        if(count($cursos) > 0)
            return $cursos;
        else
            return ['erro' => 'Ainda não há nenhum curso cadastrado no sistema.'];
    }

    public function show($id)
    {
        $curso = $this->cursoRepository->find($id);

        $curso->tipo = $this->getTipoCursoComoTexto($curso->tipo);

        return $curso;
    }

    /**
     * @param $campo
     * @param $valor
     * @return array|mixed
     */
    public function buscar($campo, $valor)
    {
        if($valor == null)
            return ['erro' => 'A consulta realizada não retornou nenhum resultado.'];

        if($campo == 'nome')
            $cursos = $this->cursoRepository->findWhere([[$campo, 'like', '%'.$valor.'%']]);
        else
        {
            $valor = $this->getTipoCursoComoInteiro($valor);
            $cursos = $this->cursoRepository->findWhere([$campo => $valor]);
        }

        foreach($cursos as $curso)
        {
            $curso->tipo = $this->getTipoCursoComoTexto($curso->tipo);
        }

        if(count($cursos) > 0)
            return $cursos;
        else
            return ['erro' => 'A consulta realizada não retornou nenhum resultado.'];
    }

    private function getTipoCursoComoTexto($tipo)
    {
        switch($tipo)
        {
            case 1: return "Bacharelado";
            case 2: return "Licenciatura";
            case 3: return "Tecnólogo";
            case 4: return "Técnico";
        }
    }

    private function getTipoCursoComoInteiro($tipo)
    {
        if(strpos('Bacharelado', $tipo) !== false)
            return 1;
        else if(strpos('Licenciatura', $tipo) !== false)
            return 2;
        else if(strpos('Tecnólogo', $tipo) !== false)
            return 3;
        else if(strpos('Técnico', $tipo) !== false)
            return 4;
        else
            return 0;
    }

}