const apiproduct = new Vue({
		el: '#apiproduct',// se va a recargar el id formulario
		data: {
			name:'',
			slug:'',
			div_clase_slug: 'badge badge-danger',
			div_mensage_slug: 'Slug Existe',
			div_aparecer: false,
			deshabilitar_boton: 1,
			// determinarPrecios
			precio_anterior:0,
			precio_actual:0,
			porcentaje_descuento:0,
			descuento: 0,
			descuento_mensaje: 'Producto sin descuento'
		},
		computed: {
			generarSlug: function() {
				var char = {
					"á":"a","é":"e","í":"i","ó":"o","ú":"u",
					"Á":"A","É":"E","Í":"I","Ó":"O","Ú":"U",
					"ñ":"n","Ñ":"N","_":"-"," ":"-"
				}
				var exp = /[áéíúóÁÉÚÍÓÑñ_ ]/g;

				this.slug = this.name.trim().replace(exp, function(e){
					return char[e]
				}).toLowerCase();

				return this.slug;
			},
			generarDescuento: function() {

				if (this.porcentaje_descuento > 100) {
					swal("Atento", "El porcentaje no puede ser mayor a 100", "error");
					this.porcentaje_descuento = 100;
				} else if (this.porcentaje_descuento < 0) {
					swal("Atento", "El porcentaje no puede ser menor a 0", "error");
					this.porcentaje_descuento = 0;
				} 



				if (this.porcentaje_descuento > 0) 
				{
					this.descuento = (this.precio_anterior * this.porcentaje_descuento) / 100;
					this.precio_actual = this.precio_anterior - this.descuento;
					

					if (this.porcentaje_descuento == 100) {
						this.descuento_mensaje = 'Este producto esta bonificado el 100%';
					} else {
						this.descuento_mensaje = 'Hay un monto de descuento de $ '+ this.descuento;
					}

				}
				else
				{
					this.precio_actual = this.precio_anterior;
					this.descuento_mensaje = 'Producto sin descuento';
				}

				return this.descuento_mensaje;
			}
		},
		methods: {
			eliminarImagen(image){
				// SweetAlert
				swal({
					title: "Esta seguro?",
					text: "El eliminar no podra volver atras la acción",
					icon: "warning",
					buttons: true,
					dangerMode: true,
				})
				.then((willDelete) => {
					if (willDelete) {
				  					//Realizo la llamada a metodo delete
				  					let url ='/api/eliminarImagen/'+image.id;
				  					axios.delete(url).then(response => {
				  						console.log(response.data);
				  					})

				  	var elemento = document.getElementById('idimagen-'+image.id);// capturo la imagen
				  	elemento.parentNode.removeChild(elemento);//la elimino visualmente

				  	swal("La imagen fue eliminada!!", {
				  		icon: "success",
				  	});
				  } else {
				  	swal("La acción fue cancelada!");
				  }
				});		
				// SweetAlert		
			},
			getproduct(){

				if (this.slug) {

					let url ='/api/product/'+this.slug;
					axios.get(url).then(response => {
						this.div_mensage_slug = response.data;
						if (this.div_mensage_slug === "Slug Disponible") {
							this.div_clase_slug = 'badge badge-success';
							this.deshabilitar_boton = 0;
						} 
						else 
						{
							this.div_clase_slug = 'badge badge-danger';
							this.deshabilitar_boton = 1;
							
						}
						this.div_aparecer = true;

				if (data.datos.name === this.name) {
					this.deshabilitar_boton = 0;
					this.div_mensage_slug = 'Conserva el nombre del producto';
					this.div_aparecer = true;
					this.div_clase_slug = 'badge badge-success';
				} 
					})

				} 
				else {
					this.div_mensage_slug = 'Debe escribir un nombre';
					this.deshabilitar_boton = 0;
					this.div_clase_slug = 'badge badge-danger';
					this.div_aparecer = false;
				}
			}
		},
		mounted(){
			if (data.editar == 'si') {
				this.name = data.datos.name;
				this.precio_anterior = data.datos.precio_anterior;
				this.porcentaje_descuento = data.datos.porcentaje_descuento;

				this.deshabilitar_boton = 0;
			}

			console.log(data); 
		}

	});