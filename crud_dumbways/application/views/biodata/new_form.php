<!DOCTYPE html>
<html lang="en">
  <head>
  	<?php $this->load->view("layout/head.php") ?>
    <style>
      ul {list-style: none; padding-left: 0;}
      li input {margin: 4px;}
      li label span {border-radius: 30px; padding-left: 10px; padding-right: 10px;}
    </style>
  </head>
  <body id="page-top">

  <?php $this->load->view("layout/navbar.php") ?>

  <div id="wrapper">

  	<div id="content-wrapper">
      <!--.container-fluid -->
      <div class="container-fluid" style="width: 500px; padding: 50px; background:#f7f7f7">

				<?php $this->load->view("layout/breadcrumb.php") ?>

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('biodata/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">
            <form action="<?php base_url('biodata/add') ?>" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="inputNama">Nama Lengkap</label>
                <input class="form-control <?php echo form_error('full_name') ? 'is-invalid':'' ?>"
                 type="text" name="full_name" placeholder="Full name" />
                <div class="invalid-feedback">
                  <?php echo form_error('full_name') ?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputTempatLahir">Tempat Lahir</label>
                <select id="inputTempatLahir" name="place_of_birth_id" class="form-control form-control-sm">
                  <option selected="selected"></option>
                  <?php
                  foreach($cities as $city) {
                    echo '<option value="'.$city->id.'">'.$city->name.'</option>';
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="inputTanggalLahir">Tanggal Lahir</label>
                <input id="inputTanggalLahir" class="datepicker form-control form-control-sm" name="date_of_birth" placeholder="mmmm dd, yyyy">
              </div>
              <div class="form-group">
                <label for="inputPhone">No. HP</label>
                <input type="tel" id="inputPhone" name="phone_number" class="form-control form-control-sm">
              </div>
              <div class="form-group">
                <label for="inputAlamat">Alamat</label>
                <textarea class="form-control" id="inputAlamat" name="address" rows="3"></textarea>
              </div>
              <div class="form-group">
                <label for="inputPendidikanTerakhir">Pendidikan Terakhir</label>
                <select id="inputPendidikanTerakhir" name="last_education" class="form-control form-control-sm">
                  <option selected="selected"></option>
                  <option>SMP</option>
                  <option>SMA</option>
                  <option>S1</option>
                  <option>S2</option>
                </select>
              </div>
              <div class="form-group">
                <label>Agama</label>
                <div class="radio">
                  <ul>
                    <li><label><input type="radio" name="religion" value="islam"><span class="label-name">Islam</span></label></li>
                    <li><label><input type="radio" name="religion" value="kristen"><span class="label-name">Kristen</span></label></li>
                    <li><label><input type="radio" name="religion" value="katolik"><span class="label-name">Katolik</span></label></li>
                  </ul>
                </div>
              </div>
              <div class="form-group">
                <label>Hobi</label>
                <div class="checkbox">
                  <ul>
                    <li><label><input type="checkbox" name="hobby[]" value="renang"><span class="label-name">Renang</span></label></li>
                    <li><label><input type="checkbox" name="hobby[]" value="main"><span class="label-name">Main</span></label></li>
                    <li><label><input type="checkbox" name="hobby[]" value="kalah"><span class="label-name">Kalah</span></label></li>
                    <li><label><input type="checkbox" name="hobby[]" value="menang"><span class="label-name">Menang</span></label></li>
                    <li><label><input type="checkbox" name="hobby[]" value="giling"><span class="label-name">Giling</span></label></li>
                  </ul>
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
              <label>Edit label</label>
            </form>
					</div>

					<div class="card-footer small text-muted">
						* required fields
					</div>


				</div>
				<!-- /.container-fluid -->
			</div>
  		<!-- Sticky Footer -->
  		<?php //$this->load->view("application/_partials/footer.php") ?>

  	</div>
  	<!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <?php $this->load->view("layout/js.php") ?>
  <script>
    $('.datepicker').datepicker({
      format: 'M dd, yyyy',
      startDate: '-3d'
    });

    $("#inputPhone").on("keypress keyup blur",function (event) {
       $(this).val($(this).val().replace(/[^\d].+/, ""));
        if ((event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
    });

    var colors = ['#ffbf00', '#bfff00', '#ffb3b3', '#acd1ff', '#acd1a0'];
    labelNames = document.getElementsByClassName("label-name");
    Array.prototype.forEach.call(labelNames, (element) => {
        var color = colors[Math.floor(Math.random() * colors.length)];
        element.style.backgroundColor = color;
    });
  </script>
  </body>
</html>
