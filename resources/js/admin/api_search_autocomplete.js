const api_search_autocomplete = new Vue({
		el: '#api_search_autocomplete',// se va a recargar el id formulario
		data: {
			palabra_a_buscar: '',
			resultados: []
		},
		methods: {
			autoComplete(){

				this.resultados = []; //Limpio la variable
				if (this.palabra_a_buscar.length > 2) {
				axios.get('/api/autocomplete/', 
					{params: {palabraabuscar:this.palabra_a_buscar
				}}).then(response => {
					this.resultados = response.data;
					console.log(response.data);
				}); //cierro axios
				}
			},// autoComplete
			async select(resultado){ 
				this.palabra_a_buscar = resultado.name;
				await this.$nextTick();
				this.SubmitForm();

			}, //select
			SubmitForm(){
				this.$refs.SumbitButtonSearch.click();

			},//SubmitForm
		},
		mounted() {
			console.log('Datos cargados Correctamente');
		}
	});