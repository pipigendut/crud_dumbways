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
            <form action="<?php base_url('biodata/edit') ?>" method="post" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?php echo $biodata->id?>" />
              <div class="form-group">
                <label for="inputNama">Nama Lengkap</label>
                <input class="form-control <?php echo form_error('full_name') ? 'is-invalid':'' ?>"
                 type="text" name="full_name" placeholder="Full name" value="<?php echo $biodata->full_name ?>" />
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
                    if ($biodata->place_of_birth_id == $city->id) {
                      echo '<option selected="selected" value="'.$city->id.'">'.$city->name.'</option>';
                    } else {
                      echo '<option value="'.$city->id.'">'.$city->name.'</option>';
                    }
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="inputTanggalLahir">Tanggal Lahir</label>
                <input id="inputTanggalLahir" class="datepicker form-control form-control-sm" name="date_of_birth" placeholder="mmmm dd, yyyy" value="<?php echo $biodata->date_of_birth ?>">
              </div>
              <div class="form-group">
                <label for="inputPhone">No. HP</label>
                <input type="tel" id="inputPhone" name="phone_number" class="form-control form-control-sm" value="<?php echo $biodata->phone_number ?>">
              </div>
              <div class="form-group">
                <label for="inputAlamat">Alamat</label>
                <textarea class="form-control" id="inputAlamat" name="address" rows="3"><?php echo $biodata->address ?></textarea>
              </div>
              <div class="form-group">
                <label for="inputPendidikanTerakhir">Pendidikan Terakhir</label>
                <select id="inputPendidikanTerakhir" name="last_education" class="form-control form-control-sm">
                  <?php
                    foreach(array( 'SMP', 'SMA', 'S1', 'S2') as $value)
                    {
                      if($value == $biodata->last_education)
                      {
                           echo "<option selected='selected' value='".$value."'>".$value."</option>";
                      }
                      else
                      {
                           echo "<option value='".$value."'>".$value."</option>";
                      }
                    }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label>Agama</label>
                <div class="radio">
                  <ul>
                    <?php
                      foreach(array( 'Islam', 'Kristen', 'Katolik') as $value)
                      {
                        if(strtolower($value) == $biodata->religion)
                        {
                          echo "<li><label><input type='radio' name='religion' value='".strtolower($value)."' checked><span class='label-name'>".$value."</span></label></li>";
                        }
                        else
                        {
                          echo "<li><label><input type='radio' name='religion' value='".strtolower($value)."'><span class='label-name'>".$value."</span></label></li>";
                        }
                      }
                    ?>
                  </ul>
                </div>
              </div>
              <div class="form-group">
                <label>Hobi</label>
                <div class="checkbox">
                  <ul>
                    <?php
                      foreach(array( 'Renang', 'Main', 'Kalah', 'Menang', 'Giling') as $value)
                      {
                        if(strtolower($value) == $biodata->hobby)
                        {

                          echo "<li><label><input type='checkbox' name='hobby[]' checked='checked' value=".strtolower($value)."><span class='label-name'>".$value."</span></label></li>";
                        }
                        else
                        {
                          echo "<li><label><input type='checkbox' name='hobby[]' value=".strtolower($value)."><span class='label-name'>".$value."</span></label></li>";
                        }
                      }
                    ?>
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
