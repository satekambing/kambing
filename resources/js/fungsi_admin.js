/**
  * Fungsi untuk keperluan modal dialog
**/
$("li").click(function(){
  var x = $(this).attr("class");
  $("li").removeClass("active");

});
function input_tanggal(){
  /* Tanggal */
  $(".tanggalx").daterangepicker({
    //defaultViewDate : '1993-01-01',
    //format: 'yyyy-mm-dd',
    //todayHighlight : true
    singleDatePicker: true,
    showDropdowns: true,
    locale: {
      format: 'DD / MM / YYYY',
    }
  });

  // $('.tanggalpicker').daterangepicker({
  //     showDropdowns: true,
  //     showWeekNumbers: true,
  //     // startDate: "05/07/1993",
  //     // endDate: "05/13/2017",
  //     // minDate: "03/27/1993",
  //     locale: {
  //       format: 'DD / MM / YYYY',
  //     },
  //   });

    // $("form").reset();
}
function pencarianauto(){
  var judul = $(".selectpicker2").attr('data-title');
  $(".selectpicker2").select2({
    placeholder : 'Pencarian ' + judul ,
    tags: "true",
    ajax: {
       url: 'page/cuti/searchpegawai.php',
       dataType: 'json',
       type: 'GET',
       delay: 250,
       data: function(params){
				  return { q: params.term };
  		 },
       processResults: function(data){
				return { results: data };
			 },
  			cache: true
      },
      //minimumInputLength: 2
  });
}
// Memunculkan Edit Data
// $("#UbahDialog").on("show.bs.modal", function (e) {
//   var rowid = $(e.relatedTarget).data('idnya');
//   var halaman = $(e.relatedTarget).data('halaman');
//   var primarykey = $(e.relatedTarget).data('primarykey');
//   alert("ubahdata"+halaman+ " - " +rowid + " -" +primarykey);
//   $.ajax({
//     type  : 'POST',
//     url   : 'page/'+ halaman +'/form' + halaman + '.php',
//     data  :  {pk: primarykey, id: rowid, ket: 'edit'},
//     success : function(data){
//       $(".isi-datamodal").html(data);
//       input_tanggal();
//       pencarianauto();
//     }
//   });
// });

// Memunculkan Tambah data
function buttonModal(halaman){
  $(".btn-simpan").click(function(){
    var form = "#form"+halaman;
    var uploadfiles = $(form).attr("enctype");

    if (uploadfiles == "multipart/form-data"){
      enctypex = 'multipart/form-data';
      var form = $('.form')[0];
      var datax = new FormData(form);
      prosesx = false;
      contenx = false;
      cachex = false;
    }else{
      enctypex = '';
      var datax = $(form).serialize();
      // var form = $('.form')[0];
      // var datax = new FormData(form);
      prosesx = true;
      contenx = 'application/x-www-form-urlencoded; charset=UTF-8';
      cachex = true;
    }
    // alert(prosesx+contenx+idform);
    // alert($(this).attr("name"));
    // alert(prosex);

    $.ajax({
      type  : 'post',
      enctype: enctypex,
      url   : 'page/' + halaman +'/simpan' + halaman +'.php',
      processData: prosesx,
      contentType: contenx,
      cache: cachex,
      timeout: 600000,
      data  : datax,
      success : function(data){
        if(data == 1 || data == 2){
        //  $(".form").reset();
          $(".pesan-form").removeClass("alert alert-success alert-danger").addClass("alert alert-success");
          if(data == 1){
            $(".pesan-form").html("<h4> Berhasil Input Data") ;
          }else{
            $(".pesan-form").html("<h4> Berhasil Ubah Data") ;
          }

        //S  $(".form")[0].reset();

        }else{
          $(".pesan-form").removeClass("alert alert-success alert-danger").addClass("alert alert-danger").fadeIn(100);
          $(".pesan-form").html("<h4> Gagal </h4><p>" + data + "</p>");
        //  $(".pesan-form").fadeOut("slow");
          //$("#TambahDialog").modal('hide');
        }
      },
      error : function(errornya){
        console.log(errornya)
      }
    }); // end ajax
  });
}


$("#TambahModal").on("show.bs.modal", function (e) {
  var halaman = $(e.relatedTarget).data('halaman');
  var rowid = $(e.relatedTarget).data('idnya');
  //$(".isi-datamodal").load('page/'+halaman+'/form'+halaman+'.php');
  $.ajax({
    type:'POST',
    url : 'page/'+halaman+'/form'+halaman+'.php',
    data : { jhal: halaman, jrow: rowid},
    // data : $(".form").serialize(),
    success: function(data){
      $(".isi-datamodal").html(data);
      input_tanggal();
      pencarianauto();
      buttonModal(halaman);
    }
  });
});

// fungsi khusus untuk hapus
function buttonHapus(halaman,rowid){
  $(".btn-hapus").click(function(){
    $.ajax({
      type  : 'post',
      url   : 'page/' + halaman +'/simpan' + halaman +'.php',
      data  : {hapus: rowid,jhal: halaman},
      success : function(data){
        // alert(data);
        if(data == 3){
          $(".pesan-form").removeClass("alert alert-success alert-danger").addClass("alert alert-success");
          $(".pesan-form").html("<h4> Berhasil Menghapus Data</h4>") ;
          // $(".modal-header, .form-horizontal, .modal-footer").fadeOut(1000);
          $(".btn-hapus, .modal-header").fadeOut(500);
          setTimeout(function() { $('.modal').modal('hide');location.reload(); }, 2000);
          // location.reload();
        }else{
          $(".pesan-form").removeClass("alert alert-success alert-danger").addClass("alert alert-danger").fadeIn(100);
          $(".pesan-form").html("<h4> Gagal </h4><p>" + data + "</p>");
        }
      }
    }); // end ajax

  });
}
$("#HapusModal").on("show.bs.modal", function (e){
  var halaman = $(e.relatedTarget).data('halaman');
  var rowid = $(e.relatedTarget).data('idnya');
  $.ajax({
    type:'POST',
    url : 'page/'+halaman+'/hapus'+halaman+'.php',
    data : { jhal: halaman, jrow: rowid},
    // data : $(".form").serialize(),
    success: function(data){
      $(".isi-datamodal").html(data);
      buttonHapus(halaman,rowid);
    }
  });
});

// Kosongkan modal dialog jika di tutup
$("#TambahModal").on("hidden.bs.modal", function(){
  location.reload();
  // $(".isi-datamodal").html("");

});

// Tombol Hapus
// $(".TombolHapus").click(function (e){
//   var x = $(this).attr("data-idnya");
//   alert(x);
// })
