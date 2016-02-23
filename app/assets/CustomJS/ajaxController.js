var table;
var restrictions = new Array();
var selects = new Array();
var selectsNames = new Array;

getSelects();
getRestrictions();

$(document).ready(function(){
	table = $('#data-table').DataTable({
		"ajax": {
			"url": "controllers/ajaxController.php",
			"type": "POST"
		},
		"columns": columns(),
		"drawCallback": function(){
			applyRestrictions();
			applySelects();
			cleanHeader();

			applyJEditableSelects(selects);

			$("tbody td:not('" + getNonInputs() + "')").editable("controllers/ajaxUpdater.php", { 
				// indicator: "Guardando..",
				// tooltip: "",
				// placeholder: ""
			});

			fixId();
		}
	});
});

function columns(){
	arr = new Array();
	var t = document.getElementById('data-table');

	for(var i=0; i < t.rows[0].cells.length; i++){
		arr.push({"data": t.rows[0].cells[i].innerHTML});
	}
	
	return arr;
}

function updateDataTable(){
	table.ajax.reload(null, false);
}

function applyJEditableSelects(){
	// foreach para el arreglo de nombres
	for(name in selectsNames){
		// en cada iteracion asignamos a cada cuadro su dropdown correspondiente
		$('td#' + selectsNames[name]).editable("controllers/ajaxUpdater.php", {
			data: selects[selectsNames[name]],
			type   : 'select',
			submit : 'OK'
		});
	}
}

function applySelects(){
	var t = document.getElementById('data-table');
	for(var i=0; i < t.rows[0].cells.length; i++){
		if(selectsNames.indexOf(t.rows[0].cells[i].innerHTML) != -1){
			$('table tr td:nth-child( ' + (i+1) + ')').attr("id", t.rows[0].cells[i].innerHTML);
		}
	}
}

function getNonInputs(){
	var str = '#non-edit';
	for(name in selectsNames){
		str += ' ,#' + selectsNames[name];
	}
	return str;
}

function fixId(){
	$("td:not('#table-head')").each(function(){
		var id = $(this).attr('id');
		$(this).attr('id', id + ' ' + $(this).closest("tr").find("td:first-child").text());
	});
}

function applyRestrictions(){
	var t = document.getElementById('data-table');

	// recorriendo la tabla html
	for(var i=0; i<t.rows[0].cells.length; i++){
		// revisando si la columna actual se encuentra en las restricciones
		if(restrictions.indexOf(t.rows[0].cells[i].innerHTML) != -1){
			// agregando el indice de la colunma al arreglo para aplicar cambios
			$('table tr td:nth-child( ' + (i+1) + ')').attr("id", "non-edit");
		}
		else{
			$('table tr td:nth-child( ' + (i+1) + ')').attr("id", t.rows[0].cells[i].innerHTML);
		}
	}
}

function cleanHeader(){
	$('thead td').attr('id', 'table-head');
}

/*  
Llena el arreglo restrictions con las restricciones que se
encuentran en el archivo ajaxRestrictions.php segun la accion
actual. 
*/
function getRestrictions(){
	var xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
			restrictions = JSON.parse(xmlhttp.responseText);
			console.log("restrictions: " + restrictions);
		}
	};

	xmlhttp.open("POST", "controllers/ajaxRestrictions.php", true);
	xmlhttp.send();
}

function getSelects(){
	var xmlhttp = new XMLHttpRequest();
	
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
			var requestData = JSON.parse(xmlhttp.responseText);
			console.log('Unparsed data:' + xmlhttp.responseText);
			
			selectsNames = requestData['nombres'];
			console.log("selectsNames: " + selectsNames);

			selects = requestData.data;
			console.log("selects: " + selects);
		}
	};

	xmlhttp.open("POST", "controllers/ajaxSelects.php", true);
	xmlhttp.send();
}