var update_qrcode =(id,name)=> {
	var text = '{"user_easy":"true","id":"'+id+'"}';
	text = Base64.encode(text);
	document.getElementById('qr').innerHTML = create_qrcode(text);
	var  img = $("#qr").children()[0].src;
	$("#qr").append('<a href="'+img+'" download="'+name+'.jpg">Descargar Codigo</a>');
	// console.log(text);
};
