<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pessoa;
use App\Http\Controllers\Controller;

function convertData($str, $hora = true) {
    return date('d/m/Y' . ($hora ? ' H:i' : ''), strtotime($str));
}

function duf($str) {
    return str_pad($str, 4, '0', STR_PAD_LEFT);
}

class PessoaController extends Controller
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
                'local'  => 'Av Francisco Rodrigues Filho, 100',
                'observacao' => '',
                'vencimentoPrazo' => convertData('2019-01-31', false)
            ],
            [
                'id'   => 2,
                'duf'  => duf(2),
                'data'  => convertData('2019-01-11 22:10'),
                'assunto' => 'Perturbação da ordem',
                'tipo'  => 'Auto de infração e intimação',
                'local' => 'Rua Otto Unger, 500',
                'observacao' => 'Ameaçou o fiscal',
                'vencimentoPrazo' => null
            ],
            [
                'id'   => 3,
                'duf'  => duf(3),
                'data'  => convertData('2019-01-09 21:40'),
                'assunto' => 'Perturbação da ordem',
                'tipo'  => 'Notificação',
                'local' => 'Rua Ricardo Vilela',
                'observacao' => '',
                'vencimentoPrazo' => null
            ]
        ];

        return view('pessoa.view', ['pessoa' => Pessoa::findOrFail($id), 'ocorrencias' => $ocorrencias, 'prazo' => $prazo]);
    }
}
