<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class Veiculos extends Model
{
    use HasFactory;
    use SoftDeletes;
	use Notifiable;
	
    protected $table = 'Veiculos';
    protected $primaryKey = 'id_veiculo';

    protected $fillable = [];
    protected $hidden = [];
    protected $softDelete = true;

    const CREATED_AT = 'dhs_cadastro';
    const UPDATED_AT = 'dhs_atualizacao';
    const DELETED_AT = 'dhs_exclusao';

    public function manutencao()
    {
        return $this->belongsTo('App\Models\Manutencoes', 'veiculos_id_veiculo', 'id_veiculo');
    }

    public function cor()
    {
        return $this->belongsTo('App\Models\Cores',  'cores_id_cor', 'id_cor');
    }

    public function marca()
    {
        return $this->belongsTo('App\Models\Marcas',  'marcas_id_marca', 'id_marca');
    }
}
