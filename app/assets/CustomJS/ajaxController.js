var table;
var restrictions = new Array();

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
			$("tbody td:not('#non-edit')").editable("controllers/ajaxUpdater.php",
			{ 
				// indicator: "Guardando..",
				// tooltip: "",
				// placeholder: ""
			});
		}
	});
	
	
});

function columns(){
	arr = new Array();
	var t = document.getElementById('data-table');

	for(var i=0; i<t.rows[0].cells.length; i++){
		arr.push({"data": t.rows[0].cells[i].innerHTML});
	}
	
	return arr;
}


function updateDataTable(){
	table.ajax.reload(null, false);
}

function applyRestrictions(){
	var t = document.getElementById('data-table');
	
	$('td').on("click", function (){
    	var id = $(this).attr('id');
  		$(this).attr('id', id + ' ' + $(this).closest("tr")[0].rowIndex);
 	});
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


/*  
Llena el arreglo restrictions con las restricciones que se
encuentran en el archivo ajaxRestrictions.php segun la accion
actual. 
*/
function getRestrictions(){
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
			restrictions = xmlhttp.responseText;
			console.log(restrictions);
		}
	};
	xmlhttp.open("POST", "controllers/ajaxRestrictions.php", true);
	xmlhttp.send();
}