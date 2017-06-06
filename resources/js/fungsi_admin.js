/**
  * Fungsi untuk keperluan modal dialog
**/
$(".sidebar-menu > li").click(function(){
  var x = $(this).attr("class");
  $(".sidebar-menu > li").removeClass("active");

});
function input_tanggal(){
  /* Tanggal */
  $(".tanggalx").daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    locale: {
      format: 'DD / MM / YYYY',
    }
  });
  // tanggal + waktu
  $(".tanggalwaktu").daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    timePicker: true,
    timePicker24Hour: true,
    // showDropdowns: true,
    locale: {
        format: 'DD / MM / YYYY - h:mm '
    }
  });
  // tanggal - range
  $('.tanggalpicker').daterangepicker({
      showDropdowns: true,
      showWeekNumbers: true,
      // startDate: "05/07/1993",
      // endDate: "05/13/2017",
      // minDate: "03/27/1993",
      locale: {
        format: 'DD / MM / YYYY',
      },
    });
}
// fungsi - pencarian nip
function pencarianauto(){
  var judul = $(".selectpicker2").attr('data-title');
  $(".selectpicker2").select2({
    placeholder : 'Pencarian ' + judul ,
    tags: "true",
    ajax: {
       url: 'page/searchpegawai.php',
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
function cekForm(halaman){
  var idform = "#form"+halaman;
  var uploadtipe = $(idform).attr("enctype");
  console.log(uploadtipe);
  var data = new Array();
      data['proses']  = true;
      data['conten']  = 'application/x-www-form-urlencoded; charset=UTF-8';
      data['cache']   = true;
      data['enctype'] = '';
      data['dataform']= $(idform).serialize();

  if(uploadtipe == "multipart/form-data"){
      data['proses']  = false;
      data['conten']  = false;
      data['cache']   = false;
      data['enctype'] = 'multipart/form-data';
      var formnya = document.getElementById('form'+halaman);
      data['dataform'] = new FormData(formnya);
  }
  return (data);
}

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
  // var jform = $("#form"+jkolom);
  var jidform = ("text"+jkolom);
  // alert(jidform);
  // $("#"+jidform).hide(1000);
  //  $("#formvisi_misi").hide(1000);
  var datakirim = tinyMCE.get(jidform).getContent();
  alert('--'+jkolom+ '-dan-' + datakirim);
  $.ajax({
    type :'POST',
    url : 'page/'+jhal+'/simpan'+jhal+'.php',
    data : {isi : datakirim, kolom : jkolom},
    success : function(data){
      if(data == 1 || data == 2){
      //  $(".form").reset();
        $(".pesan-form").removeClass("alert alert-success alert-danger").addClass("alert alert-success");
        if(data == 1){
          $(".pesan-form").html("<h4> " + jkolom + " Berhasil di tambah") ;
        }else{
          $(".pesan-form").html("<h4>  " + jkolom + " Berhasil di Ubah") ;
        }

      //S  $(".form")[0].reset();

      }else{
        $(".pesan-form").removeClass("alert alert-success alert-danger").addClass("alert alert-danger").fadeIn(100);
        $(".pesan-form").html("<h4> Gagal </h4><p>" + data + "</p>");
      //  $(".pesan-form").fadeOut("slow");
        //$("#TambahDialog").modal('hide');
      }
    },
  })
  // return false;
})
$(".simpan-tab").click(function(){
  var hal = $(this).attr("data-halaman");
  var form = $(this).attr("data-form");
  var idform = "#form_"+form;

  $.ajax({
    type :'POST',
    url : 'page/'+hal+'/simpan'+hal+'.php',
    data : $(idform).serialize(),
    success : function(data){
      if(data == 1){
        alert('zzz');
      }else{
        $("#table_"+form).append(data);
      }
    }
  })
  return false;
})
$(document).ready(function(){input_tanggal();})
$(".nav-tabs > li").click(function(){
    var id = $(this).find("a").attr("href");
    var nama = id.replace("#","");
    // var x = "#"+nama;

    // $("#table_"+nama).hide(1000);
    // $(".modal").removeAttr("id");
    // var x = $("#"+nama+" > .modal").attr("id","sate");
    // alert(x);
})
