</div>
<div class="bottombar">
  <span>Trashcan</span>
</div>
<!-- bottombar -->
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="side-panel">
  <h4 class="panel-title">General Setting</h4>
  <form method="post">
    <div class="setting-row">
      <span>use night mode</span>
      <input type="checkbox" id="nightmode1" />
      <label for="nightmode1" data-on-label="ON" data-off-label="OFF"></label>
    </div>
    <div class="setting-row">
      <span>Notifications</span>
      <input type="checkbox" id="switch22" />
      <label for="switch22" data-on-label="ON" data-off-label="OFF"></label>
    </div>
    <div class="setting-row">
      <span>Notification sound</span>
      <input type="checkbox" id="switch33" />
      <label for="switch33" data-on-label="ON" data-off-label="OFF"></label>
    </div>
    <div class="setting-row">
      <span>My profile</span>
      <input type="checkbox" id="switch44" />
      <label for="switch44" data-on-label="ON" data-off-label="OFF"></label>
    </div>
    <div class="setting-row">
      <span>Show profile</span>
      <input type="checkbox" id="switch55" />
      <label for="switch55" data-on-label="ON" data-off-label="OFF"></label>
    </div>
  </form>
  <h4 class="panel-title">Account Setting</h4>
  <form method="post">
    <div class="setting-row">
      <span>Sub users</span>
      <input type="checkbox" id="switch66" />
      <label for="switch66" data-on-label="ON" data-off-label="OFF"></label>
    </div>
    <div class="setting-row">
      <span>personal account</span>
      <input type="checkbox" id="switch77" />
      <label for="switch77" data-on-label="ON" data-off-label="OFF"></label>
    </div>
    <div class="setting-row">
      <span>Business account</span>
      <input type="checkbox" id="switch88" />
      <label for="switch88" data-on-label="ON" data-off-label="OFF"></label>
    </div>
    <div class="setting-row">
      <span>Show me online</span>
      <input type="checkbox" id="switch99" />
      <label for="switch99" data-on-label="ON" data-off-label="OFF"></label>
    </div>
    <div class="setting-row">
      <span>Delete history</span>
      <input type="checkbox" id="switch101" />
      <label for="switch101" data-on-label="ON" data-off-label="OFF"></label>
    </div>
    <div class="setting-row">
      <span>Expose author name</span>
      <input type="checkbox" id="switch111" />
      <label for="switch111" data-on-label="ON" data-off-label="OFF"></label>
    </div>
  </form>
</div><!-- side panel -->
<script src="<?php echo base_url(); ?>assets_admin/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets_admin/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets_admin/js/perfect-scrollbar.jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets_admin/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url(); ?>assets_admin/js/chart.min.js"></script>
<script src="<?php echo base_url(); ?>assets_admin/js/echart.min.js"></script>
<script src="<?php echo base_url(); ?>assets_admin/js/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url(); ?>assets_admin/js/chat-init.js"></script>
<!-- <script src="<?php echo base_url(); ?>assets_admin/js/nice-select.js"></script>  -->
<script src="<?php echo base_url(); ?>assets_admin/js/flatweather.min.js"></script>
<script src="<?php echo base_url(); ?>assets_admin/js/html5lightbox.js"></script>
<!-- chat messages initilization  -->
<script src="<?php echo base_url(); ?>assets_admin/js/custom.js"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function() {
    $('#myTable').DataTable();
  });
</script>
<!-- scripts -->
<script src="<?php echo base_url(); ?>assets_admin/js/peity-circle.js"></script>
<script src="<?php echo base_url(); ?>assets_admin/js/custom2.js"></script>
<script src="<?php echo base_url(); ?>assets_home/js/sweetalert2.all.min.js"></script>
<script>
  const flashData = $('.flash-data').data('flashdata');
  // console.log(flashData);
  if (flashData) {
    Swal.fire({
      position: 'top-end',
      title: 'Berhasil !',
      text: '' + flashData,
      icon: 'success',
      showConfirmButton: false,
      timer: 3500
    });
  }
</script>
<script>
  const flashDataError = $('.flash-data-error').data('flashdata');
  // console.log(flashData);
  if (flashDataError) {
    Swal.fire({
      position: 'top-end',
      title: 'Gagal !',
      text: '' + flashDataError,
      icon: 'error',
      showConfirmButton: false,
      timer: 3500
    });
  }
</script>
<script>
  $('.bdel').on('click', function(e) {
    e.preventDefault();
    const href = $(this).attr('href');
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
      },
      buttonsStyling: false
    });
    swalWithBootstrapButtons.fire({
      position: 'top-end',
      title: 'Yakin data ini akan dihapus?',
      text: "Data tidak akan bisa dikembalikan!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Ya, Hapus!',
      cancelButtonText: 'Batal',
      reverseButtons: true
    }).then((result) => {
      if (result.value) {
        document.location.href = href;
      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Dibatalkan',
          '',
          'error'
        )
      }
    });
  });
</script>
<script>
  $('.bconfir').on('click', function(e) {
    e.preventDefault();
    const href = $(this).attr('href');
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
      },
      buttonsStyling: false
    });
    swalWithBootstrapButtons.fire({
      position: 'top-end',
      title: 'INFO',
      text: "Dengan mengklik tombol 'Ya', notifikasi tagihan SPP akan masuk ke ruang orang tua/wali.",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Ya !',
      cancelButtonText: 'Batal',
      reverseButtons: true
    }).then((result) => {
      if (result.value) {
        document.location.href = href;
      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Dibatalkan',
          '',
          'error'
        )
      }
    });
  });
</script>
<script>
  function goBack() {
    window.history.back();
  }

  function addlist(obj, out) {
    var grup = obj.form[obj.name];
    var len = grup.length;
    var list = new Array();

    if (len > 1) {
      for (var i = 0; i < len; i++) {
        if (grup[i].checked) {
          list[list.length] = grup[i].value;
        }
      }
    } else {
      if (grup.checked) {
        list[list.length] = grup.value;
      }
    }

    document.getElementById(out).value = list.join(', ');

    return;
  }
</script>
</body>

</html>