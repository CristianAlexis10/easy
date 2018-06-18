(function(window) {
	'use strict';
	var decoder = $('#qr-canvas'),
		sl = $('.scanner-laser'),
		pl = $('#play'),
		si = $('#scanned-img'),
		sQ = $('#scanned-QR'),
		sv = $('#save'),
		sp = $('#stop'),
		spAll = $('#stopAll'),
		zo = $('#zoom'),
		zov = $('#zoom-value');
		sp.hide();
		spAll.hide();
	sl.css('opacity', .5);
	pl.click(function() {
		sp.show();
		spAll.show();
		pl.hide();
		if (typeof decoder.data().plugin_WebCodeCam == "undefined") {
			decoder.WebCodeCam({
				videoSource: {
					id: $('select#cameraId').val(),
					maxWidth: 640,
					maxHeight: 480
				},
				autoBrightnessValue: 120,
				// qr detectado
				resultFunction: function(text, imgSrc) {
					$.ajax({
						url:"agregarAlListado",
						type:"post",
						dataType:"json",
						data:({data:text}),
						success:function(result){
							if (result['user']==true) {
									console.log(result);
									si.attr('src', imgSrc);
									sQ.append("<div class='list-assistance'>"+result["name"]+" "+result["last_name"]+"<span class='time'> ("+result["hora"]+")</span></div>");
									sl.fadeOut(150, function() {
										sl.fadeIn(150);
									});
							}else{
								alert(result);
							}
						},
						error:function(result){console.log(result);}
					});
				},
				getUserMediaError: function() {
					alert('Sorry, the browser you are using doesn\'t support getUserMedia');
				},
				cameraError: function(error) {
					var p, message = 'Error detected with the following parameters:\n';
					for (p in error) {
						message += p + ': ' + error[p] + '\n';
					}
					alert(message);
				}
			});
			sQ.append('<div class="scaning">Escaneando ...</div>');
			sv.removeClass('disabled');
			sp.click(function(event) {
				sp.hide();
				spAll.hide();
				pl.show();
				sv.addClass('disabled');
				sQ.text('Pausado');
				decoder.data().plugin_WebCodeCam.cameraStop();
			});
			spAll.click(function(event) {
				if (confirm("¿Desea Terminar el llamado de Asistencia?")) {
					sp.hide();
					spAll.hide();
					pl.show();
					sv.addClass('disabled');
					sQ.text('Finalizado');
					decoder.data().plugin_WebCodeCam.cameraStopAll();
				}
			});
		} else {
			sv.removeClass('disabled');
			sQ.append('<div class="scaning">Escaneando ...</div>');
			decoder.data().plugin_WebCodeCam.cameraPlay();
		}
	});
	sv.click(function() {
		if (typeof decoder.data().plugin_WebCodeCam == "undefined") return;
		var src = decoder.data().plugin_WebCodeCam.getLastImageSrc();
		si.attr('src', src);
	});
	Page.changeZoom = function(a) {
		if (typeof decoder.data().plugin_WebCodeCam == "undefined") return;
		var value = typeof a != 'undefined' ? parseFloat(a.toPrecision(2)) : zo.val() / 10;
		zov.text(zov.text().split(':')[0] + ': ' + value.toString());
		decoder.data().plugin_WebCodeCam.options.zoom = parseFloat(value);
		if (typeof a != 'undefined') zo.val(a * 10);
	}



	var getZomm = setInterval(function() {
		var a;
		try {
			a = decoder.data().plugin_WebCodeCam.optimalZoom();
		} catch (e) {
			a = 0;
		}
		if (a != 0) {
			Page.changeZoom(a);
			clearInterval(getZomm);
		}
	}, 500);

	function gotSources(sourceInfos) {
		for (var i = 0; i !== sourceInfos.length; ++i) {
			var sourceInfo = sourceInfos[i];
			var option = document.createElement('option');
			option.value = sourceInfo.id;
			if (sourceInfo.kind === 'video') {
				var face = sourceInfo.facing == '' ? 'unknown' : sourceInfo.facing;
				option.text = sourceInfo.label || 'camera ' + (videoSelect.length + 1) + ' (facing: ' + face + ')';
				videoSelect.appendChild(option);
			}
		}
	}
	if (typeof MediaStreamTrack.getSources !== 'undefined') {
		var videoSelect = document.querySelector('select#cameraId');
		$(videoSelect).change(function(event) {
			if (typeof decoder.data().plugin_WebCodeCam !== "undefined") {
				decoder.data().plugin_WebCodeCam.options.videoSource.id = $(this).val();
				decoder.data().plugin_WebCodeCam.cameraStop();
				decoder.data().plugin_WebCodeCam.cameraPlay(false);
			}
		});
		MediaStreamTrack.getSources(gotSources);
	} else {
		$('select#cameraId').remove();
	}
}).call(window.Page = window.Page || {});
