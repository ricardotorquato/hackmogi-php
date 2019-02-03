<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pessoa;
use App\Http\Controllers\Controller;


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
        return view('pessoa.view', ['pessoa' => Pessoa::findOrFail($id)]);
    }
}
