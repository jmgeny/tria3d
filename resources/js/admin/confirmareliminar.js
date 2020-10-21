const confirmareliminar = new Vue({
	el: '#confirmareliminar',
	data: {
		urlaeliminar: '',
		idaeliminar: ''
	},
	methods: {
		desea_eliminar(id) {
			this.urlaeliminar = document.getElementById('urlbase').innerHTML+'/'+id;
			this.idaeliminar = id;
			
			$('#modal_eliminar').modal('show');// con jquery llamo al modal y le mando la variable urlaeliminar
		}
	},

});