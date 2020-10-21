<?php 
// Encontrar una imagen en un usuario/producto

	$usuario = App\User::find(1);
	$imagen = ($usuario->image) ? 'Se encontro una imagen' : 'No se encontro una imagen' ;

// Crear una imagen para el usuario utilizando el metodo save()

	$imagen = new App\Image(['url' => 'imagenes/avatar.png']);
	$usuario = App\User::find(1);
	$usuario->image()->save($imagen);

// Obtener informacion de las imagenes a travez del usuario

	$usuario = App\User::find(1);
	return $usuario->image->url;

// Crear varias imagenes para un producto utilizando el metodo saveMany()

	$producto = App\Product::find(3);

	$producto->images()->saveMany([
		new App\Image(['url' => 'imagenes/avatar2.png']),
		new App\Image(['url' => 'imagenes/avatar4.png']),
	]);

// Crear una imagen con el metodo create
		
	$usuario = App\User::find(1);
	$usuario->image()->create([
		'url' => 'imagenes/avatar2.png',
	]);

// Crear una imagen con el metodo create() De otra forma

	$imagen = [];
	$imagen['url'] = 'imagenes/a.png';
	$usuario = App\User::find(1);
	$usuario->image()->create($imagen);	

// Crear varias imagenes para un producto con el createMany()

	$imagen = [];
	$imagen[]['url'] = 'imagenes/avatar2.png';
	$imagen[]['url'] = 'imagenes/avatar3.png';
	$imagen[]['url'] = 'imagenes/a.png';
	$imagen[]['url'] = 'imagenes/a.png';

	$producto = App\Product::find(1);
	$producto->images()->createMany($imagen);

// Actualizar una imagen con el metodo push()

	$usuario = App\User::find(1);
	$usuario->image->url = 'imagenes/avatar.png';
	$usuario->push();

// Actualizar una imagen puntual con el metodo push()

	$producto = App\Product::find(1);
	$producto->images[0]->url = 'imagenes/avatar.png';
	$producto->push();

// Relacion polimorfica obtener el padre de la imagen

	$imagen = App\Image::find(7);
	return $imagen->imageable;

// Delimitar la busqueda

	$producto = App\Product::find(1);
	return $producto->images()->where('url','imagenes/a.png')->get();

// Ordenar registro que provienen de las relaciones

	$producto = App\Product::find(1);
	return $producto->images()->where('url','imagenes/a.png')->orderBy('id','desc')->get();							
// Contar reistros relacionados con withCount('relacion') le crea un campo image_count;

	$usuarios = App\User::withCount('image')->get();
	$usuario = $usuarios->find(1);
	return $usuario->image_count;

	$productos = App\Product::withCount('images')->get();
	$productos = $productos->find(1);
	return $productos->images_count;

// Contar reistros relacionados con loadCount('relacion') le crea un campo image_count;

	$producto = App\Product::find(1);
	return $producto->loadCount('images');

// lazy loading carga diferida 

	$producto = App\Product::find(1);
	$imagenes = $producto->images;
	$categoria = $producto->category;
	//Tres consulta a la base de datos

// Eager loading carga previa, hace una solo consulta a la base y trae todo	

	$producto = App\Product::with('images','category')->find(1);

// Eliminar imagen
	$producto = App\Product::find(1);
	$producto->images[0]->delete();
	return $producto->images;	



 ?>