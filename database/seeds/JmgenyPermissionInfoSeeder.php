<?php

use Illuminate\Database\Seeder;
use App\User;
use App\jmgenyPermisos\models\Role;
use App\jmgenyPermisos\models\Permission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class JmgenyPermissionInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::statement('set foreign_key_checks=0');
      DB::table('role_user')->truncate();
      DB::table('permission_role')->truncate();
      Permission::truncate();
      Role::truncate(); 
      DB::statement('set foreign_key_checks=1');

    	//User admin
    	//busco si ya se encuentra en la base
      $useradmin = User::where('email','admin@admin.com')->first();
      if ($useradmin) {
          $useradmin->delete();
      }
      $useradmin = User::create([
         'name' => 'admin',
         'email' => 'admin@admin.com',
         'password' => Hash::make('admin')
     ]);
      
        // user adicional
//       $userjmgeny = User::where('email','jmgeny@jmgeny.com')->first();
//        if ($userjmgeny) {
//            $userjmgeny->delete();
//        }
//        $userjmgeny = User::create([
//            'name' => 'jmgeny',
//            'email' => 'jmgeny@jmgeny.com',
//            'password' => Hash::make('jmgeny')
//        ]);

    	//Rol admin
      $roladmin= Role::create([
         'name' => 'Admin',
         'slug' => 'admin',
         'description' => 'Administrador',
         'full-access' => 'yes'
     ]);
    	//Rol Registro de Usuario
      $rolreg= Role::create([
         'name' => 'Registered User',
         'slug' => 'registereduser',
         'description' => 'Registered User',
         'full-access' => 'no'
     ]);        

		//vinculo el rol con el usuario
      $useradmin->roles()->sync([$roladmin->id]);

		// Creo los permisos
      $permission_all = [];

		// Permisos para la tabla Role

      $permission = Permission::create([
        'name'          => 'Navegar Roles',
        'slug'          => 'role.index',
        'description'   => 'Lista y navega todos los Roles del sistema',  
    ]);
      $permission_all[] = $permission->id;

      $permission = Permission::create([
        'name'          => 'Ver detalle de rol',
        'slug'          => 'role.show',
        'description'   => 'Ver en detalle cada rol del sistema',    
    ]); 
      $permission_all[] = $permission->id;

      $permission = Permission::create([
        'name'          => 'Edición de Roles',
        'slug'          => 'role.edit',
        'description'   => 'Editar cualquier dato de un rol del sistema',    
    ]);
      $permission_all[] = $permission->id;

      $permission = Permission::create([
        'name'          => 'Crear de Roles',
        'slug'          => 'role.create',
        'description'   => 'Crear cualquier dato de un rol del sistema',    
    ]);  
      $permission_all[] = $permission->id;                                  

      $permission = Permission::create([
        'name'          => 'Eliminar rol',
        'slug'          => 'role.destroy',
        'description'   => 'Eliminar cualquier rol del sistema',  
    ]);
      $permission_all[] = $permission->id;   

      
// Permisos para la tabla usuario
//Users
      
      
      $permission = Permission::create([
          'name'			=> 'Navegar usuarios',
          'slug'			=> 'user.index',
          'description'	=> 'Lista y navega todos los usuarios del sistema',	 
      ]);
      $permission_all[] = $permission->id;

      $permission = Permission::create([
          'name'			=> 'Ver detalle de usuario',
          'slug'			=> 'user.show',
          'description'	=> 'Ver en detalle cada usuario del sistema',	 
      ]); 
      $permission_all[] = $permission->id;

      $permission = Permission::create([
          'name'			=> 'Edición de usuarios',
          'slug'			=> 'user.edit',
          'description'	=> 'Editar cualquier dato de un usuario del sistema',	 
      ]);        	       	
      $permission_all[] = $permission->id;        

      $permission = Permission::create([
          'name'			=> 'Eliminar usuario',
          'slug'			=> 'user.destroy',
          'description'	=> 'Eliminar cualquier usuario del sistema',	 
      ]);
      $permission_all[] = $permission->id;

        //+++++++++++++++++++++++++++++++++++

      $permission = Permission::create([
        'name'          => 'Show own User',
        'slug'          => 'userown.show',
        'description'   => 'Ver en detalle cada usuario del sistema OWN',    
    ]); 
      $permission_all[] = $permission->id;

      $permission = Permission::create([
        'name'          => 'Edit oun User',
        'slug'          => 'userown.edit',
        'description'   => 'Editar cualquier dato de un usuario del sistema OWN',    
    ]);                 
      $permission_all[] = $permission->id; 

        // $roladmin->permissions()->sync($permission_all); 

//Permisos para la tabla productos
      $permission = Permission::create([
       'name'          => 'Navegar Productos',
       'slug'          => 'product.index',
       'description'   => 'Lista y navega todos los Productos del sistema',  
   ]);
      $permission_all[] = $permission->id;
      $permission = Permission::create([
       'name'          => 'Ver detalle de producto',
       'slug'          => 'product.show',
       'description'   => 'Ver en detalle cada producto del sistema',    
   ]); 
      $permission_all[] = $permission->id;
      $permission = Permission::create([
       'name'          => 'Edición de Productos',
       'slug'          => 'product.edit',
       'description'   => 'Editar cualquier dato de un producto del sistema',    
   ]);
      $permission_all[] = $permission->id;
      $permission = Permission::create([
       'name'          => 'Crear de Productos',
       'slug'          => 'product.create',
       'description'   => 'Crear cualquier dato de un producto del sistema',    
   ]);
      $permission_all[] = $permission->id;                                    
      $permission = Permission::create([
       'name'          => 'Eliminar producto',
       'slug'          => 'product.destroy',
       'description'   => 'Eliminar cualquier producto del sistema',  
   ]);
      $permission_all[] = $permission->id;

        //Permisos para la tabla categoria

      $permission = Permission::create([
        'name'          => 'Navegar Categoria',
        'slug'          => 'category.index',
        'description'   => 'Lista y navega todos los Categoria del sistema',  
    ]);
      $permission_all[] = $permission->id;
      $permission = Permission::create([
        'name'          => 'Ver detalle de Categoria',
        'slug'          => 'category.show',
        'description'   => 'Ver en detalle cada Categoria del sistema',    
    ]); 
      $permission_all[] = $permission->id;
      $permission = Permission::create([
        'name'          => 'Edición de Categoria',
        'slug'          => 'category.edit',
        'description'   => 'Editar cualquier dato de un Categoria del sistema',    
    ]);
      $permission_all[] = $permission->id;
      $permission = Permission::create([
        'name'          => 'Crear de Categoria',
        'slug'          => 'category.create',
        'description'   => 'Crear cualquier dato de un Categoria del sistema',    
    ]);
      $permission_all[] = $permission->id;                                    
      $permission = Permission::create([
        'name'          => 'Eliminar Categoria',
        'slug'          => 'category.destroy',
        'description'   => 'Eliminar cualquier Categoria del sistema',  
    ]);
      $permission_all[] = $permission->id;


    }//RUN
}
