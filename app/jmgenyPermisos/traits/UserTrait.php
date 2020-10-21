<?php 

namespace App\jmgenyPermisos\traits;


trait UserTrait {

    public function roles() {

        return $this->belongsToMany('App\jmgenyPermisos\models\Role')->withTimesTamps();

    }

    public function havePermission($permission){

        foreach ($this->roles as $role) {

            if ($role['full-access'] == 'yes') {
                return true;
            } 
              foreach ($role->permissions as $perm) {
                  if ($perm->slug == $permission) {
                      return true;
                  }
              }
                return false;

            }

    }	
}



?>