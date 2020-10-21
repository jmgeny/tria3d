const apicategory = new Vue({
		el: '#apicategory',// se va a recargar el id formulario
		data: {
			name:'',
			slug:'',
			div_clase_slug: 'badge badge-danger',
			div_mensage_slug: 'Slug Existe',
			div_aparecer: false,
			deshabilitar_boton: 1
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
			}
		},
		methods: {
			getCategory(){

				if (this.slug) {

					let url ='/api/category/'+this.slug;
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
						if (document.getElementById('editar')) {
							if (this.name === document.getElementById('nombretemp').innerHTML) {
								this.div_clase_slug = 'badge badge-success';
								this.deshabilitar_boton = 0;
								this.div_mensage_slug = 'Conserva el nombre de la Categoria';
								this.div_aparecer = true;

							}
						}//if (document.getElementById('editar'))
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
				if (document.getElementById('editar')) {
					this.name = document.getElementById('nombretemp').innerHTML;
					this.deshabilitar_boton = 0;
				} 
		}

	});