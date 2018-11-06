$(document).ready(function(){

  var base_url = "http://localhost/projectimpal/"
  //Hapus Barang
  $('.delete_jabatan').click(function(){
    var id_jabatan = $(this).attr('data-id');
    $('[name=_id]').val(id_jabatan);
    $('#id_jabatan').html(id_jabatan);
    $('#delete_jabatan').modal('show');
  })

});
