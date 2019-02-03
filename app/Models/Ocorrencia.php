<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ocorrencia extends Model {
    public $timestamps = false;
    protected $table = 'ocorrencia2';

    public function imovel()
    {
        return $this->hasOne('App\Models\Imovel', 'id', 'imovelName_Id');
    }

    public function pessoa()
    {
        return $this->hasOne('App\Models\Pessoa', 'id', 'personName_Id');
    }
}
