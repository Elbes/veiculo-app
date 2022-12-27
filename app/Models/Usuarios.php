<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class Usuarios extends Authenticatable
{
	/** * Overrides the method to ignore the remember token. */
	public function setAttribute($key, $value)
	{ $isRememberTokenAttribute = $key == $this->getRememberTokenName();
		if (!$isRememberTokenAttribute)
		{
			parent::setAttribute($key, $value);
		} 
	}
    use HasFactory;
    use SoftDeletes;
	use Notifiable;
	
    protected $table = 'Usuarios';
    protected $primaryKey = 'id_usuario';

    protected $fillable = [];
    protected $softDelete = true;

    const CREATED_AT = 'dhs_cadastro';
    const UPDATED_AT = 'dhs_atualizacao';
    const DELETED_AT = 'dhs_exclusao';

    function userSearch($email){

    	return DB::table('Usuarios')->where('dsc_email', $email)
    	->get();
    
    }
}
