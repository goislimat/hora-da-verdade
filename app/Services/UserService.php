<?php
/**
 * Created by PhpStorm.
 * User: goisl
 * Date: 15/05/2016
 * Time: 21:41
 */

namespace Verdade\Services;


use Verdade\Repositories\UserRepository;

class UserService
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * UserService constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $usuarios = $this->userRepository->all();

        foreach($usuarios as $usuario)
        {
            $usuario->tipo = $this->getTipoComoTexto($usuario->tipo);
        }

        if(count($usuarios) > 0)
            return $usuarios;
        else
            return ['erro' => 'Ainda não há nenhum curso cadastrado no sistema.'];
    }

    public function store($data)
    {
        $data['password'] = str_random(8);

        $this->userRepository->create($data);

        //envia e-mail com usuário e senha
    }

    public function show($id)
    {
        $usuario = $this->userRepository->find($id);

        $usuario->tipo = $this->getTipoComoTexto($usuario->tipo);

        return $usuario;
    }

    public function buscar($campo, $valor)
    {
        if($valor == null)
            return ['erro' => 'A consulta realizada não retornou nenhum resultado.'];

        if($campo == 'nome' || $campo == 'email')
            $usuarios = $this->userRepository->findWhere([[$campo, 'like', '%'.$valor.'%']]);
        else
        {
            $valor = $this->getTipoComoInteiro($valor);
            $usuarios = $this->userRepository->findWhere([$campo => $valor]);
        }

        foreach($usuarios as $usuario)
        {
            $usuario->tipo = $this->getTipoComoTexto($usuario->tipo);
        }

        if(count($usuarios) > 0)
            return $usuarios;
        else
            return ['erro' => 'A consulta realizada não retornou nenhum resultado.'];
    }

    private function getTipoComoTexto($tipo)
    {
        if($tipo == 1)
            return 'Administrador';
        else if($tipo == 2)
            return 'Professor';
        else
            return 'Aluno';
    }

    private function getTipoComoInteiro($tipo)
    {
        if(strpos('Administrador', $tipo) !== false)
            return 1;
        else if(strpos('Professor', $tipo) !== false)
            return 2;
        else
            return 3;
    }
}