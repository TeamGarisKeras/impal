$(document).ready(function(){

  var base_url = "http://localhost/projectimpal/"
  //Hapus Barang
  $('.delete_obat').click(function(){
    var id_obat = $(this).attr('data-id');
    $('[name=_id]').val(id_obat);
    $('#id_obat').html(id_obat);
    $('#delete_obat').modal('show');
  })

  //
  // $('#btn_hapus').on('click',function(){
  //     var id=$('#id_hapus').val();
  //     $.ajax({
  //     type : "POST",
  //     url  : base_url + "perkiraan/delete",
  //     dataType : "JSON",
  //             data : {kode: kode},
  //             success: function(data){
  //                     $('#ModalHapus').modal('hide');
  //                     tampil_data_barang();
  //             }
  //         });
  //         return false;
  //     });
});
