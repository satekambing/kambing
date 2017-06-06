/**
  * Fungsi untuk keperluan modal dialog
**/
$(".sidebar-menu > li").click(function(){
  var x = $(this).attr("class");
  $(".sidebar-menu > li").removeClass("active");

});
// Button simpan di modal dialog
function buttonModal(halaman){
  $(".btn-simpan").click(function(){
    var form = "#form"+halaman;
    var uploadfiles = $(form).attr("enctype");
    var r = cekForm(halaman);
    $.ajax({
      type      : 'post',
      enctype   : r['enctype'],
      url       : 'page/' + halaman +'/simpan' + halaman +'.php',
      processData: r['proses'],
      contentType: r['conten'],
      cache     : r['cache'],
      timeout   : 600000,
      data      : r['dataform'],
      success   : function(data){
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
function buttonHapus(halaman,rowid,table){
  $(".btn-hapus").click(function(){
    $.ajax({
      type  : 'post',
      url   : 'page/' + halaman +'/simpan' + halaman +'.php',
      data  : {hapus: rowid,jhal: halaman,jtable: table},
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
$("#HapusModal, #HapusModal2").on("show.bs.modal", function (e){
  var halaman = $(e.relatedTarget).data('halaman');
  var rowid = $(e.relatedTarget).data('idnya');
  var table = $(e.relatedTarget).data('table');
  var idi = $(this).attr("id");
  $.ajax({
    type:'POST',
    url : 'page/'+halaman+'/hapus'+halaman+'.php',
    data : { jhal: halaman, jrow: rowid, jtable: table},
    // data : $(".form").serialize(),
    success: function(data){
      $("#"+idi+" .isi-datamodal").html(data);
      buttonHapus(halaman,rowid,table);
    }
  });
});

// Kosongkan modal dialog jika di tutup
$("#TambahModal").on("hidden.bs.modal", function(){
  location.reload();
  // $(".isi-datamodal").html("");

});

// Menangani Text Editor - Profi Visi Misi dll //
$(".btnEditor").click(function (e){
  var jhal = $(this).attr('data-halaman');
  var jkolom = $(this).attr('data-kolom');
  var jidform = ("text"+jkolom);
  var datakirim = tinyMCE.get(jidform).getContent();
  $.ajax({
    type :'POST',
    url : 'page/'+jhal+'/simpan'+jhal+'.php',
    data : {isi : datakirim, kolom : jkolom},
    success : function(data){
      if(data.isInteger){
        PesanForm("Sukses", "Data ");
      }else{
        PesanForm("Gagal", data);
      }
    },
  })
  // return false;
})
$(".simpan-tab").click(function(){
  var hal = $(this).attr("data-halaman");
  var form = $(this).attr("data-form");
  var idform = "#form_"+form;
  var r  = cekForm("_"+form);

  $.ajax({
    type      : 'post',
    enctype   : r['enctype'],
    url       : 'page/' + hal +'/simpan' + hal +'.php',
    processData: r['proses'],
    contentType: r['conten'],
    cache     : r['cache'],
    timeout   : 600000,
    data      : r['dataform'],

    success : function(data){
      if($.isNumeric(data)){
        PesanForm("Sukses","Data " + hal + " Berhasil di Simpan");
      }else{
        if(data == "Data tidak lengkap"){
          PesanForm("Gagal","Data "+ hal +" Gagal Simpan");
        }else{
          $("#table_"+form).append(data);
        }
      }
    }
  })
  return false;
})
$(document).ready(function(){input_tanggal();})
$(".nav-tabs > li").click(function(){
    var id = $(this).find("a").attr("href");
    var nama = id.replace("#","");

})
