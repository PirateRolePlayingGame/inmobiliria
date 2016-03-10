<?php 
require_once('../../../connection.php');
require('../../../controllers/GlobalController.php');
require('../../../models/inmueble.php');

foreach(Inmueble::obtImagenes($_GET['id']) as $img){
	putImage($img['foto'], $img['id']);
}

function putImage($img, $id){
?>

<div class="col-md-4">
	<div class="imagen-container">
		<div class="imagen">
			<img src="assets/img/inmuebles/<?php print $img; ?>" id="<?php print $id; ?>" height="362" width="480" alt="" class="img-responsive imagen2">
		</div>
	</div>
</div>

<?php
}

?>




