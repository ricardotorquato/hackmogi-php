<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imovel;
use App\Http\Controllers\Controller;

function convertData($str, $hora = true) {
    return date('d/m/Y' . ($hora ? ' H:i' : ''), strtotime($str));
}

function duf($str) {
    return str_pad($str, 4, '0', STR_PAD_LEFT);
}

class ImovelController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
    public function view($id)
    {
        $prazo = convertData('2019-01-31', false);

        $ocorrencias = [
            [
                'id'   => 1,
                'duf'  => duf(1),
                'data'   => convertData('2019-01-12 23:15'),
                'assunto' => 'Perturbação da ordem',
                'tipo'   => 'Auto de infração e intimação',
                'responsavel'  => 'Joao da Silva',
                'observacao' => '',
                'vencimentoPrazo' => convertData('2019-01-31', false)
            ],
            [
                'id'   => 2,
                'duf'  => duf(2),
                'data'  => convertData('2019-01-11 22:10'),
                'assunto' => 'Perturbação da ordem',
                'tipo'  => 'Notificação',
                'responsavel'  => 'Joao da Silva',
                'observacao' => 'Ameaçou o fiscal',
                'vencimentoPrazo' => null
            ],
            [
                'id'   => 3,
                'duf'  => duf(3),
                'data'  => convertData('2019-01-09 21:40'),
                'assunto' => 'Perturbação da ordem',
                'tipo'  => 'Notificação',
                'responsavel'  => 'Chicão da Silva',
                'observacao' => '',
                'vencimentoPrazo' => null
            ]
        ];

        return view('imovel.view', ['imovel' => Imovel::findOrFail($id), 'ocorrencias' => $ocorrencias, 'prazo' => $prazo]);
    }
}
