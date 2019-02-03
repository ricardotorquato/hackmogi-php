<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imovel;
use App\Models\Pessoa;
use App\Http\Controllers\Controller;


class BuscaController extends Controller
{
    public function index(Request $request)
    {
        $lista = [];
        $buscaEfetuada = false;

        if ($request->input('busca')) {

            $buscaEfetuada = true;

            if(!$request->input('filtro') || $request->input('filtro') == 'responsavel') {
                $pessoasItems = Pessoa::where('nome', 'like', '%' . $request->input('busca') . '%')->get();
                foreach( $pessoasItems as $pessoa ) {
                    $lista[] = [
                        'id'    => $pessoa->id,
                        'label' => $pessoa->nome,
                        'tipo'  => 'responsável',
                        'url'   => route('pessoa', [ $pessoa->id ])
                    ];
                }
            }
        }

        return view('busca.index', [ 'lista' => $lista, 'buscaEfetuada' => $buscaEfetuada ]);
    }
}
