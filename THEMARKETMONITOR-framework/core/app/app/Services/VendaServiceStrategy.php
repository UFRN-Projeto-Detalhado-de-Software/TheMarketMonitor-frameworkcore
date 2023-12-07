<?php

namespace App\Services;
use App\DTOS\VendaDTO;

interface VendaServiceStrategy
{
    public function validate_create(VendaDTO $dados);
    public function validate_update(VendaDTO $dados, $id);
    public function validate_delete($id);

}
