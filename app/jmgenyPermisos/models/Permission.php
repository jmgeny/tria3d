<?php

namespace App\jmgenyPermisos\models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
	protected $fillable = [
        'name', 'slug', 'description',
    ];


	public function roles() {

        return $this->belongsToMany('App\jmgenyPermisos\models\Role')->withTimesTamps();

    }
}
