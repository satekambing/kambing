
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
    locale: {
        format: 'DD / MM / YYYY - h:mm '
    }
  });
  // tanggal - range
  $('.tanggalpicker').daterangepicker({
      showDropdowns: true,
      showWeekNumbers: true,
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
// Menangani Pesan ketika ajax sukses / gagal
function PesanForm(Status, Pesan){

  $(".pesan-form").hide(1);
  setTimeout(function() {
    if(Status == "Sukses"){
      $(".pesan-form").removeClass("alert alert-success alert-danger").addClass("alert alert-success");
      $(".pesan-form").html("<h4> " + Pesan + " </h4>")
    }else if(Status == "Gagal"){
      $(".pesan-form").removeClass("alert alert-success alert-danger").addClass("alert alert-danger");
      $(".pesan-form").html("<h4>  " + Pesan + " </h4>") ;
    }
  $(".pesan-form").slideDown(400);
}, 300);

}
