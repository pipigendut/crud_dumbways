<!DOCTYPE html>
<html lang="en">
  <head>
  	<?php $this->load->view("layout/head.php") ?>
  </head>
  <body id="page-top">

  <?php $this->load->view("layout/navbar.php") ?>

  <div id="wrapper">

  	<div id="content-wrapper">
      <!--.container-fluid -->
  		<div class="container-fluid">
  		<?php //$this->load->view("admin/_partials/breadcrumb.php") ?>

      <!-- DataTables -->
      <div class="card mb-3">
        <div class="card-header">
          <a href="<?php echo site_url('biodata/add') ?>"><i class="fas fa-plus"></i> Add New</a>
        </div>
        <div class="card-body">

          <div class="table-responsive">
            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Tempat Lahir</th>
                  <th>Tanggal Lahir</th>
                  <th>No. HP</th>
                  <th>Alamat</th>
                  <th>Pendidikan Terakhir</th>
                  <th>Agama</th>
                  <th>Hobi</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($biodata as $b): ?>
                <tr>
                  <td width="150">
                    <?php echo $b->full_name ?>
                  </td>
                  <td>
                    <?php echo $b->cities_name ?>
                  </td>
                  <td>
                    <?php echo $b->date_of_birth ?>
                  </td>
                  <td width="150">
                    <?php echo $b->phone_number ?>
                  </td>
                  <td>
                    <?php echo $b->address ?>
                  </td>
                  <td>
                    <?php echo $b->last_education ?>
                  </td>
                  <td width="150">
                    <?php echo $b->religion ?>
                  </td>
                  <td>
                    <?php echo $b->hobby ?>
                  </td>
                  <td width="250">
                    <a href="<?php echo site_url('biodata/edit/'.$b->id) ?>"
                     class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
                    <a onclick="deleteConfirm('<?php echo site_url('biodata/delete/'.$b->id) ?>')"
                     href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
                  </td>
                </tr>
                <?php endforeach; ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>

  		</div>

      <!-- Logout Delete Confirmation-->
      <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <a id="btn-delete" class="btn btn-danger" href="#">Delete</a>
            </div>
          </div>
        </div>
      </div>
  	</div>
  	<!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <?php $this->load->view("layout/js.php") ?>
  <script>

    function deleteConfirm(url){
      $('#btn-delete').attr('href', url);
      $('#deleteModal').modal();
    }

    var table = $('#dataTable').DataTable({
     'select': true,
     'order': [[1, 'asc']],
     "paging": false,
     "searching": false
    });

    function calc() {
      if (document.getElementById('selectAll').checked) {
        table.rows().every( function ( rowIdx, tableLoop, rowLoop ) {
          console.log("selected")
        })
      } else {
        console.log("deselect")
      }
    }
  </script>
  </body>
</html>
