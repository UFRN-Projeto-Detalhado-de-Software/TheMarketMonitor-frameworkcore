<?php

namespace app\Repositories;


use App\DTOS\FuncionarioDTO;

interface FuncionariosRepositoryInterface
{

    public function all();

    public function find($id);

    public function store(FuncionarioDTO $dto);

    public function update(FuncionarioDTO $dto, $id);

    public function destroy($id);

    public function permitir_acesso($id_acessante, $id_acessado);

    public function remover_acesso($id_acessante, $id_acessado);

    public function get_acessos($id_acessante);

    public function desvincular_usuario($id);

    public function vincular_usuario($id_usuario, $id_funcionario);

    public function get_metas($id);

    public function email_ja_cadastrado(string $email):bool;

    public function nome_ja_cadastrado(string $nome):bool;

    public function cpf_ja_cadastrado(string $cpf):bool;

    public function email_eh($id, string $email):bool;

    public function nome_eh($id, string $nome):bool;

    public function cpf_eh($id, string $cpf):bool;

    public function get_cargos();

    public function get_funcionarios_unlinked();

}
