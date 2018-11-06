$(document).ready(function(){
  var base_url = "http://localhost/projectimpal/"
  //Hapus Barang
  $('.delete_karyawan').click(function(e){
    var id_karyawan = $(this).attr('data-id');
    var nama_karyawan = $(this).attr('data-nama');
    var id_jabatan = $(this).attr('data-jabatan');
    e.preventDefault();
    $('[name=_id]').val(id_karyawan);
    $('[name=_jabatan]').val(id_jabatan);
    $('#nama_karyawan').html(nama_karyawan);
    $('#id_karyawan').html(id_karyawan);
    $('#delete_karyawan').modal('show');
  })

});
