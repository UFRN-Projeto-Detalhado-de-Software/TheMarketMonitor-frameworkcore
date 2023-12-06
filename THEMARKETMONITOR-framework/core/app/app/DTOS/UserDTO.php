<?php

namespace App\DTOS;

class UserDTO
{
    use ArrayableDTO;

    public function __construct(
        public ? int $id,
        public ? FuncionarioDTO $funcionario,
        public ? string $nome,
        public ? string $email,
        public ? bool $isAdm
    ){}
}
