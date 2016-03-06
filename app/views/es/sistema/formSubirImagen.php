<p><form action="admin/subirImagenInmueble" class="form-inline" method="post" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"/>

	<h4>Input Groups</h4>

	<div class="col-md-8">
		<div class="input-group">
			<span class="input-group-btn">
				<span class="btn btn-primary btn-file">
					Browse&hellip; <input name="uploadedfile" type="file" required>
				</span>
			</span>
			<input type="text" name="uploadedfile" class="form-control" readonly>
		</div>
	</div>

	<div class="col-md-4">
		<div class="input-group">
			<input class="btn btn-primary" type="submit" name="submit" value="Subir Imagen">
		</div>
	</div>
</form></p>