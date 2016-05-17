<?php
/**
 * Created by PhpStorm.
 * User: goisl
 * Date: 17/05/2016
 * Time: 10:52
 */

namespace Verdade\Services;


use Verdade\Repositories\ProvaRepository;

class ProvaService
{
    /**
     * @var ProvaRepository
     */
    private $provaRepository;

    /**
     * ProvaService constructor.
     * @param ProvaRepository $provaRepository
     */
    public function __construct(ProvaRepository $provaRepository)
    {
        $this->provaRepository = $provaRepository;
    }

    public function store($data)
    {
        $data = $this->ajustaDados($data);

        $this->provaRepository->create($data);
    }

    public function edit($id)
    {
        $prova = $this->provaRepository->find($id);

        $prova->notificar = ($prova->notificar) ? 'true' : 'false';
        $prova->data = date_format(date_create($prova->data), 'd/m/Y');
        $prova->data_notificacao = date_format(date_create(explode(' ', $prova->momento_notificacao)[0]), 'd/m/Y');
        $prova->horario_notificacao = explode(' ', $prova->momento_notificacao)[1];

        return $prova;
    }

    public function update($data, $id)
    {
        $data = $this->ajustaDados($data);

        $this->provaRepository->update($data, $id);
    }

    private function ajustaDados($data)
    {
        if($data['notificar'] == 'true')
        {
            $data['notificar'] = true;
            $data['data_notificacao'] = str_replace('/', '-', $data['data_notificacao']);
            $data['data_notificacao'] = date_format(date_create($data['data_notificacao']), 'Y-m-d');
            $data['momento_notificacao'] = $data['data_notificacao'] .' '. $data['horario_notificacao'];
        }
        else
        {
            $data['notificar'] = false;
            $data['momento_notificacao'] = null;
        }

        $data['data'] = str_replace('/', '-', $data['data']);

        $data['data'] = date_format(date_create($data['data']), 'Y-m-d');

        return $data;
    }
}