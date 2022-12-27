<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class Marcas extends Model
{
    use HasFactory;
     use HasFactory;
    use SoftDeletes;
	use Notifiable;
	
    protected $table = 'Marcas';
    protected $primaryKey = 'id_marca';

    protected $fillable = [];
    protected $hidden = [];
    protected $softDelete = true;

    const CREATED_AT = 'dhs_cadastro';
    const UPDATED_AT = 'dhs_atualizacao';
    const DELETED_AT = 'dhs_exclusao';

    public function veiculo()
    {
        return $this->belongsTo('App\Models\Veiculos', 'id_marca', 'marcas_id_marca');
    }
}
