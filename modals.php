
<div class="modal fade" id="modal-progress" tabindex="-1" role="dialog" style='z-index:2005;' data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" style="width:200px;">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h5 class="modal-title">Uploading File. Please wait...</h5> -->
        <!-- <h5 class="modal-title">Reading your file. Please wait.</h5> -->
      </div>
      <div class="modal-body row">
        <!-- <img src="./assets/img/uploading.gif" width="100%"/> -->
        <div class="com-sm-12" style="text-align:center;">
          <img src="./assets/img/loading.gif" width="100%"/>
          <!-- <h3>&nbsp;&nbsp;&nbsp;&nbsp; Loading.....</h3> -->
          <!-- <i style="font-size:30px;color:#0078B2;" class="fas fa-spinner fa-spin"></i> -->
          <!-- <i style="font-size:50px;color:#0078B2;" class="fas fa-circle-notch fa-spin fa-5x"></i> -->
        </div>
        <!-- <div class="progress col-sm-12">
          <div id="upload-progress-bar" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">
            0%
          </div>
        </div> -->
      </div>
      <div class="modal-footer">
        <h5 class="modal-title" style="text-align: left; font-size: 13px;"><i>This may take a few moments depending on the speed of your internet connection.</i></h5>
      </div>
    </div>
  </div>
</div>






<!-- Check -->
<div class="modal fade" id="modal-success" style="z-index: 9999999999999999999999;">
  <div class="modal-dialog modal-sm modal-dialog-centered pl-lg-5 pl-md-5 pl-sm-5 pl-0">
    <img width="120" height="120" src="assets/icon/check.svg" class="pl-lg-5 pl-md-5 pl-sm-5 pl-0 ml-md-3 ml-sm-3 ml-0">
  </div>
</div>

<!-- Export Msg -->
<div class="modal fade" id="modal-download" style="z-index: 2005;">
  <div class="modal-dialog modal-sm" style="text-align: center;">
      <i class="fas fa-download" style="margin-top:250px;font-size: 100px; color:#fff;"></i>
  </div>
</div>

<!-- Progress Bar -->
<div class="modal fade" id="modal-progress" style="z-index: 2005;">
  <div class="modal-dialog modal-sm" style="text-align: center;margin-top:200px;">
      <!-- <img src="assets/img/icon/check.svg" width="100" height="100"> -->
  </div>
</div>

<!-- Alert -->
<div class="modal fade" id="modal-alert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h6></h6>
              <button type="button" class="btn-close text-reset" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body p-4 text-center">
              <h5 class="mb-0"><text id="modal-alert-text"></text></h5>
              <p class="mb-0" name="modal-body"> </p>
          </div>
      </div>
    </div>
  </div>

<script>
  function modal_alert(msg, msg_type, timer, btnclose) {
    $("#modal-alert").modal("show");
    $("#modal-alert-text").html(msg);

    // if ( msg_type == "warning") {
    //   $("#modal-alert .modal-header").css("background", "#bd241a").css("color","#fff");
    // } else if( msg_type == "success" ){
    //   $("#modal-alert .modal-header").css("background", "#0078b2").css("color","#fff");
    // } else if( msg_type == "error" ){
    //   $("#modal-alert .modal-header").css("background", "#bd241a").css("color","#fff");
    // }

      setTimeout(function(){
        $("#modal-alert").modal("hide");
      }, timer);
  }
</script>




<!-- Confirm -->
<form id="frm-export">
  <div class="modal fade" id="modal-export" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 2005;">
    <div class="modal-dialog confirm modal-md" role="document" style="width:400px !important;">
      <div class="modal-content" >
        <div class="modal-header">
          <center><h5 class="modal-title"><i class="fas fa-file-export"></i> Export Report</h5></center>
        </div>
        <div class="modal-body">

              <input type="hidden" id="export-type">
              <input type="hidden" id="export-tblID">
              <input type="hidden" id="export-filename_init">
              <input type="hidden" id="export-name">
              
              <div class="row">
                <div class="form-group col-sm-12">
                  <label>Filename: (.xlsx)</label>
                  <input type="text" class="form-control" required id="export-filename">
                </div>        
              </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Cancel</button>
            <button type="submit" class="btn btn-primary"><i class="fas fa-download"></i> Download</button>
        </div>
      </div>
    </div>
  </div>
</form>

<script>
  function rpt_export(tblID, filename_init, name, datefrom_init, dateto){
      if( (datefrom_init == 'none' || datefrom_init == '') && (dateto == 'none' || dateto == '') ){
        filename = filename_init;
      }else{
        datefrom = $.format.date(datefrom_init+' 00:00:00', 'MMM d, yyyy');
        if(dateto == 'none' || dateto == '' || datefrom_init == dateto){
          
          filename = filename_init+'('+datefrom+')';

        }else{

          dateto = $.format.date(dateto+' 00:00:00', 'MMM d, yyyy');
          filename = filename_init+'('+datefrom+' - '+dateto+')';

        }
      }


          $("#export-type").val("OLD"),
          $("#export-tblID").val(tblID),
          $("#export-filename").val(filename),
          $("#export-name").val(name),
          $("#modal-export").modal("show");


}


function rpt_export2(tblID, filename_init, name, datefrom_init, dateto){
      if( (datefrom_init == 'none' || datefrom_init == '') && (dateto == 'none' || dateto == '') ){
        filename = filename_init;
      }else{
        datefrom = $.format.date(datefrom_init+' 00:00:00', 'MMM d, yyyy');
        if(dateto == 'none' || dateto == '' || datefrom_init == dateto){
          
          filename = filename_init+'('+datefrom+')';

        }else{

          dateto = $.format.date(dateto+' 00:00:00', 'MMM d, yyyy');
          filename = filename_init+'('+datefrom+' - '+dateto+')';

        }
      }
      

          $("#export-type").val("NEW"),
          $("#export-tblID").val(tblID),
          $("#export-filename").val(filename),
          $("#export-name").val(name),
          $("#modal-export").modal("show");


}


$("#frm-export").submit(function(e){
  e.preventDefault();

          var spinner = gen_btn_spinner("spinner-border-sm", "text-primary");

          var type = ".xlsx";
          var exporttype = $("#export-type").val();
          var filename = $("#export-filename").val();

          console.log($("#export-tblID").val());

          if(exporttype == "OLD"){

            var elr = $("#export-tblID").val();
            elr = elr.replace("#","");

              $( "#"+elr ).table2excel({
                exclude: ".noExl",
                name: $("#export-name").val(),
                filename: $("#export-filename").val() + ".xls",
                fileext: ".xls",
                exclude_img: true,
                exclude_links: true,
                exclude_inputs: true,
                preserveColors: true // set to true if you want background colors and font colors preserved
              })
              
                modal_download(1000),
                $("#modal-export").modal("hide");
                
          }else{

            $("#frm-export").find("button[type='submit']").html(spinner).attr("disabled", true);


               var fn = undefined;
               var dl = undefined;
              
              let tblid = $("#export-tblID").val();
              tblid = tblid.replace("#", "");
              console.log(tblid);

              var elt = document.getElementById(tblid);
              var wb = XLSX.utils.table_to_book(elt, { sheet: "Sheet 1", bookType:"xlsx" });

              
                  
              // return dl ? XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }) : 

              XLSX.writeFile(wb, fn || (filename+ (type)));
              modal_download(1000),
              $("#modal-export").modal("hide");
              $("#frm-export").find("button[type='submit']").html("<span data-feather='download'></span> Download").attr("disabled", false);

               // console.log("download");
                // $( $("#export-tblID").val() ).table2excel({
                //   exclude: ".noExl",
                //   name: $("#export-name").val(),
                //   filename: $("#export-filename").val() + ".xls",
                //   fileext: ".xls",
                //   exclude_img: true,
                //   exclude_links: true,
                //   exclude_inputs: true,
                //   preserveColors: true // set to true if you want background colors and font colors preserved
                // })
                
          }



})

function modal_download(timer){
  $("#modal-download").modal("show");
  setTimeout(function(){
    $("#modal-download").modal("hide");
  },1000)
}
</script>


<!-- <div class="modal fade" id="gen-btn-spinner" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h6></h6>
              <button type="button" class="btn-close text-reset" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="alert alert-xs alert-warningx text-center">
            <div name="spinner-holder" class="spinner-border text-primary" role="status">
            <span class="sr-only">Loading...</span>
          </div>
          </div>
      </div>
    </div>
  </div>  -->

<div id="gen-spinner" hidden>
  <div class="alert alert-xs alert-warningx text-center">
    <div name="spinner-holder" class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>
</div>
<div id="gen-btn-spinner" hidden>
    <div name="spinner-holder" class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
</div>
<script>
  function gen_spinner(spinnersize, spinnerclass){
    // spinner-border-xs
    // spinner-border-sm
    // spinner-border-md
    // spinner-border-lg
    // spinner-border-xl
    $("#gen-spinner").find("div[name='spinner-holder']")
    .removeClass("text-primary")
    .removeClass("text-secondary")
    .removeClass("text-success")
    .removeClass("text-danger")
    .removeClass("text-warning")
    .removeClass("text-info")
    .removeClass("text-light")
    .removeClass("text-dark")
    .removeClass("spinner-border-xs")
    .removeClass("spinner-border-sm")
    .removeClass("spinner-border-md")
    .removeClass("spinner-border-lg")
    .removeClass("spinner-border-xl")
    $("#gen-spinner").find("div[name='spinner-holder']")
    .addClass(spinnersize)
    .addClass(spinnerclass);
    return $("#gen-spinner").html();
  }
  function gen_btn_spinner(spinnersize, spinnerclass){
    // spinner-border-xs
    // spinner-border-sm
    // spinner-border-md
    // spinner-border-lg
    // spinner-border-xl
    $("#gen-btn-spinner").find("div[name='spinner-holder']")
    .removeClass("text-primary")
    .removeClass("text-secondary")
    .removeClass("text-success")
    .removeClass("text-danger")
    .removeClass("text-warning")
    .removeClass("text-info")
    .removeClass("text-light")
    .removeClass("text-dark")
    .removeClass("spinner-border-xs")
    .removeClass("spinner-border-sm")
    .removeClass("spinner-border-md")
    .removeClass("spinner-border-lg")
    .removeClass("spinner-border-xl")
    $("#gen-btn-spinner").find("div[name='spinner-holder']")
    .addClass(spinnersize)
    .addClass(spinnerclass);
    return $("#gen-btn-spinner").html();
  }
</script>




<script>

function show_profile(){
  $.post("registry/hr/employee-register/actions/employee/edit-employee.php",{
      employeeid: localStorage.employeeid
  }, function(data){
      var res = JSON.parse(data);

      if(res.contactno == "" || res.contactno == null || res.contactno == undefined){
        var contactno = res.contactno;
      }else{
        var contactno = res.contactno.substr(3);
      }

      var d = new Date().getTime();
      console.log(res.employee_image);
      $("#frm-update-profile").trigger("reset"),
      $("#profileimage").css("background-image", "url('assets/img/employees/"+res.employee_image+"?"+d+"')"),
      $("#unew-emp-employeename").val(res.employeename),
      $("#unew-emp-birthdate").val(res.birthdate),
      $("#unew-emp-contactno").val(contactno),
      $("#unew-emp-email").val(res.email),
      $("#unew-emp-address").val(res.address),
      $("#unew-emp-provincialaddress").val(res.provincialaddress),
      $("#modal-update-profile").modal("show");

  })
}


</script>
