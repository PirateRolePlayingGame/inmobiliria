<?php 
require_once('../../../connection.php');
require('../../../models/inmueble.php');

foreach(Inmueble::obtImagenes($_GET['id']) as $img){
	
}









function putImage($img, $id){
?>

<div class="col-md-4">
	<div class="imagen-container">
		<div class="imagen">
			<img src="assets/img/<?php print $img; ?>" id="<?php print $id; ?>" height="362" width="480" alt="" class="img-responsive imagen2">
		</div>
	</div>
</div>

<?php
}

?>




