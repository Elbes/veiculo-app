<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class Manutencoes extends Model
{
    use HasFactory;
    use SoftDeletes;
	use Notifiable;
	
    protected $table = 'Manutencoes';
    protected $primaryKey = 'id_manutencao';

    protected $fillable = [];
    protected $hidden = [];
    protected $softDelete = true;

    const CREATED_AT = 'dhs_cadastro';
    const UPDATED_AT = 'dhs_atualizacao';
    const DELETED_AT = 'dhs_exclusao';

    public function veiculo()
    {
        return $this->belongsTo('App\Models\Veiculos', 'id_veiculo', 'veiculos_id_veiculo');
    }
}
