<?php

namespace App\Http\Controllers;

use App\DTOS\FuncionarioDTO;
use App\DTOS\MetaDTO;
use App\DTOS\PeriodoDTO;
use App\DTOS\PeriodoTipoDTO;
use App\Http\Controllers\Controller;
use App\Models\Meta;
use App\Services\PeriodoService;
use Illuminate\Http\Request;
use App\Services\MetaService;
use function Webmozart\Assert\Tests\StaticAnalysis\null;

class MetaController extends Controller
{
    //

    public function __construct(private readonly MetaService $metaService)
    {

    }

    public function home()
    {
        $metas = $this->metaService->all();
        return view('meta.home', ['metas' => $metas]
        );
    }

    public function create()
    {
        $tipos_periodo = $this->metaService->tipos_periodo();
        return view('meta.create', ['tipos_periodo' => $tipos_periodo]);
    }

    public function formEdit($id)
    {
        $tipos_periodo = $this->metaService->tipos_periodo();
        $meta = $this->metaService->find($id);
        return view('meta.edit', ['meta' => $meta, 'tipos_periodo' => $tipos_periodo]);
    }

    public function store(Request $request)
    {
        $this->metaService->create(new MetaDTO(
            null,
            new PeriodoDTO(
                null,
                new PeriodoTipoDTO(
                    $request->tipo_periodo,
                    null,
                    null
                ),
                $request->data_inicio,
                $request->data_fim
            ),
            $request->valor_meta,
            $request->valor_atual,
            null
        ));
        return redirect()->route('meta.home')->with('msg', 'Meta criada com sucesso!');
    }

    public function edit(Request $request, $id)
    {
        $meta = $this->metaService->find($id);
        $meta->valor_meta = $request->valor_meta;
        $meta->periodo->data_inicio = $request->data_inicio;

        $this->metaService->edit($meta);
        return redirect()->route('meta.home')
            ->with('msg', 'Meta editada com sucesso!');
    }

    public function destroy($id)
    {
        $this->metaService->delete(new MetaDTO(
            $id,
            null,
            null,
            null,
            null
        ));

        return redirect()->route('meta.home')
            ->with('msg', 'Meta destruida com sucesso!');
    }
}