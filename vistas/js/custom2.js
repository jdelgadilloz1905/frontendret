/** @format */

function resizeDatatable() {
	console.log('trigger para datatables...')
	setTimeout(function () {
		var DataTable = $('.dataTable').DataTable()
		DataTable.columns.adjust().responsive.recalc()
	}, 300)
}
$(document).ready(function () {
	// enable fileuploader plugin
	$('input[name="files"]').fileuploader({
		extensions: ['jpg', 'jpeg', 'png', 'pdf'],
		changeInput: ' ',
		theme: 'thumbnails',
		enableApi: true,
		addMore: true,
		skipFileNameCheck: true,
		limit: 3,
		fileMaxSize: 3,
		exif: true,
		thumbnails: {
			box:
				'<div class="fileuploader-items">' +
				'<ul class="fileuploader-items-list">' +
				'<li class="fileuploader-thumbnails-input"><div class="fileuploader-thumbnails-input-inner"><i>+</i></div></li>' +
				'</ul>' +
				'</div>',
			item:
				'<li class="fileuploader-item file-has-popup">' +
				'<div class="fileuploader-item-inner">' +
				'<div class="type-holder">${extension}</div>' +
				'<div class="actions-holder">' +
				'<a class="fileuploader-action fileuploader-action-remove" title="${captions.remove}"><i></i></a>' +
				'</div>' +
				'<div class="thumbnail-holder">' +
				'${image}' +
				'<span class="fileuploader-action-popup"></span>' +
				'</div>' +
				'<div class="content-holder"><h5>${name}</h5><span>${size2}</span></div>' +
				'<div class="progress-holder">${progressBar}</div>' +
				'</div>' +
				'</li>',
			item2:
				'<li class="fileuploader-item file-has-popup">' +
				'<div class="fileuploader-item-inner">' +
				'<div class="type-holder">${extension}</div>' +
				'<div class="actions-holder">' +
				'<a class="fileuploader-action fileuploader-action-remove" title="${captions.remove}"><i></i></a>' +
				'</div>' +
				'<div class="thumbnail-holder">' +
				'${image}' +
				'<span class="fileuploader-action-popup"></span>' +
				'</div>' +
				'<div class="content-holder"><h5>${name}</h5><span>${size2}</span></div>' +
				'<div class="progress-holder">${progressBar}</div>' +
				'</div>' +
				'</li>',
			startImageRenderer: true,
			canvasImage: false,
			_selectors: {
				list: '.fileuploader-items-list',
				item: '.fileuploader-item',
				start: '.fileuploader-action-start',
				retry: '.fileuploader-action-retry',
				remove: '.fileuploader-action-remove',
				sorter: '.fileuploader-action-sort',
			},
			onItemShow: function (item, listEl, parentEl, newInputEl, inputEl) {
				var plusInput = listEl.find('.fileuploader-thumbnails-input'),
					api = $.fileuploader.getInstance(inputEl.get(0))

				plusInput.insertAfter(item.html)[api.getOptions().limit && api.getChoosedFiles().length >= api.getOptions().limit ? 'hide' : 'show']()

				if (item.format == 'image') {
					item.html.find('.fileuploader-item-icon').hide()
				}
			},
			onItemRemove: function (html, listEl, parentEl, newInputEl, inputEl) {
				var perfil = $('#perfilOculto').val()

				if (perfil == 'Administrador') {
					var plusInput = listEl.find('.fileuploader-thumbnails-input'),
						api = $.fileuploader.getInstance(inputEl.get(0))

					html.children().animate({ opacity: 0 }, 200, function () {
						html.remove()

						if (api.getOptions().limit && api.getChoosedFiles().length - 1 < api.getOptions().limit) plusInput.show()
					})
				}
			},
		},
		dragDrop: {
			container: '.fileuploader-thumbnails-input',
		},
		afterRender: function (listEl, parentEl, newInputEl, inputEl) {
			var plusInput = listEl.find('.fileuploader-thumbnails-input'),
				api = $.fileuploader.getInstance(inputEl.get(0))

			plusInput.on('click', function () {
				api.open()
			})
		},

		//// while using upload option, please set
		//// startImageRenderer: false
		//// for a better effect
		//upload: {
		//	url: './php/upload_file.php',
		//	data: null,
		//	type: 'POST',
		//	enctype: 'multipart/form-data',
		//	start: true,
		//	synchron: true,
		//	beforeSend: null,
		//	onSuccess: function(data, item) {
		//		item.html.find('.fileuploader-action-remove').addClass('fileuploader-action-success');
		//
		//
		//		setTimeout(function() {
		//			item.html.find('.progress-holder').hide();
		//			item.renderThumbnail();
		//
		//			item.html.find('.fileuploader-action-popup, .fileuploader-item-image').show();
		//		}, 400);
		//	},
		//	onError: function(item) {
		//		item.html.find('.progress-holder, .fileuploader-action-popup, .fileuploader-item-image').hide();
		//	},
		//	onProgress: function(data, item) {
		//		var progressBar = item.html.find('.progress-holder');
		//
		//		if(progressBar.length > 0) {
		//			progressBar.show();
		//			progressBar.find('.fileuploader-progressbar .bar').width(data.percentage + "%");
		//		}
		//
		//		item.html.find('.fileuploader-action-popup, .fileuploader-item-image').hide();
		//	}
		//},

		onRemove: function (item) {
			var perfil = $('#perfilOculto').val()

			if (perfil == 'Administrador') {
				var id_incidencia = $('#editIdincidencia').val()

				if (id_incidencia != '' && id_incidencia != undefined) {
					var datos = new FormData()
					datos.append('id', item.data['id'])
					datos.append('ruta_imagen', item.data['ruta_imagen'])
					datos.append('titulo', item.data['titulo'])

					$.ajax({
						url: rutaOcultaFrontend + 'ajax/incidencia.ajax.php',
						method: 'POST',
						data: datos,
						cache: false,
						contentType: false,
						processData: false,
						success: function (respuesta) {
							console.log('respuesta', respuesta)
						},
					})
				}
			} else {
				swal({
					title: 'ERROR!',
					text: 'No tiene los permisos para realizar esta acción.',
					type: 'error',
					showCancelButton: false,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: '¡Cerrar!',
				}).then((result) => {
					if (result.value) {
						//location.reload();
					}
				})
			}
		},
	})
})
