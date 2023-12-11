<?php

namespace App\Services;

use App\DTOS\VendaDTO;

class VendaServiceLoja implements VendaServiceStrategy
{

    public function validate_create(VendaDTO $dados)
    {
        $limiteMinimo = 1000;
        if ($dados->valor < $limiteMinimo) {
            throw new \Exception('O valor da venda deve ser igual ou superior a ' . $limiteMinimo);
        }

        return true;
    }

    public function validate_update(VendaDTO $dados, $id)
    {
        $venda = $this->find($id);
        if ($venda = null) {
            throw new \Exception('Você não tem permissão para atualizar esta venda.');
        }
        return true;
    }

    public function validate_delete($id)
    {
        $venda = $this->find($id);
        if ($venda = null) {
            throw new \Exception('Não é possível excluir esta venda de acordo com as regras da Loja.');
        }

        return true;
    }
}
