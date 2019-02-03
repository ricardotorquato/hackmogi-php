<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pessoa;
use App\Models\Ocorrencia;
use App\Http\Controllers\Controller;

function convertData($str, $hora = true) {
    if (!$str) return $str;
    return date('d/m/Y' . ($hora ? ' H:i' : ''), strtotime($str));
}

function duf($str) {
    if (!$str) return $str;
    return str_pad($str, 4, '0', STR_PAD_LEFT);
}

function cpf($str) {
    if (!$str) return $str;
    return substr($str, 0, 3) . '.' . substr($str, 3, 3) . '.' . substr($str, 6, 3). '-' . substr($str, 10, 2);
}

function getAtividade($id) {
    $atividade = [ 'Residência', 'Comércio', 'Desmanche', 'Hospital' ];
    return $atividade[$id];
}

// tipo
function getTipo($id) {
    $tipos = [ 'Notificação/Intimação/Advertência', 'Auto de Infração e Intimação', 'Auto de Apreensão', 'Termo de Fiscalização', 'Termo de ocorrência ou de Ajuste de Conduta' ];
    return $tipos[$id];
}

// assunto
function getAssunto($id) {
    $assuntos = [ 'Perturbação da ordem', 'Obstrução de Calçada' ];
    return $assuntos[$id];
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
        $prazo = null;

        $ocorrenciasList = Ocorrencia::where('personName_Id', $id)->with('imovel')->orderBy('id', 'desc')->get();
        $ocorrencias = [];

        foreach($ocorrenciasList as $ocorrencia) {
            if ($ocorrencia->vencimentoPrazo && !$prazo) {
                $prazo = convertData($ocorrencia->vencimentoPrazo, false);
            }

            $ocorrencias[] = [
                'id'   => $ocorrencia->id,
                'duf'  => duf($ocorrencia->duf),
                'data'   => convertData($ocorrencia->dataDuf),
                'assunto' => getAssunto($ocorrencia->assunto),
                'tipo'   => getTipo($ocorrencia->tipo),
                'imovelId' => $ocorrencia->imovel->id,
                'local'  => $ocorrencia->imovel->logradouro . ($ocorrencia->imovel->bairro ? ' - ' . $ocorrencia->imovel->bairro : ''),
                'observacao' => $ocorrencia->observacao,
                'vencimentoPrazo' => convertData($ocorrencia->vencimentoPrazo, false),
                'fiscal' => $ocorrencia->fiscal
            ];
        }

        return view('pessoa.view', ['pessoa' => Pessoa::findOrFail($id), 'ocorrencias' => $ocorrencias, 'prazo' => $prazo]);
    }
}
