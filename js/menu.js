function showMenu( capa ){
	capa = document.getElementById( capa );
	if( capa.style.display == 'block' ){
		capa.style.display = 'none';
	}else{
		document.getElementById('sub-kardex').style.display = 'none';
		document.getElementById('sub-rol').style.display = 'none';
		document.getElementById('sub-amortizacion').style.display = 'none';
		capa.style.display = 'block';
	}
}

function menuActivo( capa ){
	capa = document.getElementById( capa );
	capa.style.backgroundColor = '#FF9933'
	capa.style.cursor = 'pointer'
	capa.style.paddingLeft = '20px'
}