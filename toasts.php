

<audio id="aud-success">
  <!-- <source src="sounds/success.ogg" type="audio/ogg"> -->
  <source src="assets/audios/success.mp3" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>

<audio id="aud-info">
  <!-- <source src="sounds/success.ogg" type="audio/ogg"> -->
  <source src="assets/audios/info.mp3" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>

<audio id="aud-danger">
  <!-- <source src="sounds/success.ogg" type="audio/ogg"> -->
  <source src="assets/audios/danger.mp3" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>

<audio id="aud-warning">
  <!-- <source src="sounds/success.ogg" type="audio/ogg"> -->
  <source src="assets/audios/warning.mp3" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>

<style type="text/css">
    .toast{position: absolute;}
    .toast-success,.toast-deleted{bottom: 10; right: 10; z-index: 1}
    .toast-success{background-color: }
    .toast-warning, .toast-send{top: 30% !important;}
</style>



<div id="toast-alert" class="toast toast-success" data-delay="50000" role="alert">
  <div class="toast-body alert-info">
    <span data-feather="alert-circle" class="mr-2"></span> <text name="text-alert"></text>
  </div>
</div>


<form id="frm-confirm">
  <div class="modal fade" id="toast-confirm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-body p-4 text-center">
              <h5 class="mb-0"><text name="text-confirm"></text></h5>
              
              <input type="hidden" id="confirm-callback">
              <input type="hidden" id="confirm-forward">
              <p class="mb-0" name="modal-body"> </p>
          </div>
          <div class="modal-footer p-2">
              <button type="button" name="btn-confirm-no" id="btn-confirm-no" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 border-end" data-bs-dismiss="modal">NO</button>
              <button type="submit" name="btn-confirm-yes" id="btn-confirm-yes" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0" data-bs-dismiss="modal"><strong>YES</strong></button>
          </div>
      </div>
    </div>
  </div>
</form>


<!-- <form id="frm-confirm">
<div class="modal fade" id="toast-confirm" data-backdrop="static" data-keyboard="false"  tabindex="-1" role="dialog" aria-hidden="true" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: 9099995;">
  <div class="modal-dialog confirm modal-dialog-centered" role="document">
    <div class="modal-content bg-white">
      <div class="modal-header">
        <div class="row">
          <div class="col-1 pr-0 pt-2">
            <span data-feather="alert-circle"></span>
          </div>
          <div class="col-10">
            <h5 class="modal-title"  style="width: 250px;">Confirm</h5>
          </div>
        </div>
        
      </div>
      <div class="modal-body" style="padding-bottom: 0 !important;">

        <input type="hidden" id="confirm-callback">
        <input type="hidden" id="confirm-forward">

        <center>
          <label id="confirm-txt"><text name="text-confirm"></text></label>
          <br>
        </center>
      </div>
      <div class="modal-footer">
        <center>
          <button type="button" name="btn-confirm-no" class="btn btn-secondary" id="btn-confirm-no"><i class="fas fa-times"></i> No</button>
          <button type="submit" name="btn-confirm-yes" id="btn-confirm-yes" class="btn btn1"><i class="fas fa-vote-yea"></i> Yes</button>
        </center>
      </div>
    </div>
  </div>
</div>
</form> -->

<script>

$(document).ready(function(){
    // feather.replace();
})


function play_aud($aud){
      var as = document.getElementById("aud-success");
      var aw = document.getElementById("aud-warning");
      var ad = document.getElementById("aud-danger");
      var ai = document.getElementById("aud-info");

      as.pause();
      aw.pause();
      ad.pause();
      ai.pause();

      switch( $aud.toUpperCase() ){
        case "SUCCESS":
          as.play();
        break;
        case "WARNING":
          aw.play();
        break;
        case "DANGER":
          ad.play();
        break;
        case "INFO":
          ai.play();
        break;
      }

}


function modal_success(timer, text, type){

      if(text == undefined || text == ""){
        text = "Success!";
      }

      if(type == undefined || type == ""){
          $("#toast-alert .toast-body")
          .removeClass("alert-danger")
          .removeClass("alert-warning")
          .removeClass("alert-primary")
          .removeClass("alert-info")
          .addClass("alert-success");
      }else{
        switch( type.toUpperCase() ){
          case "PRIMARY":
          case "INFO":
            $("#toast-alert .toast-body")
            .removeClass("alert-danger")
            .removeClass("alert-warning")
            .removeClass("alert-primary")
            .removeClass("alert-success")
            .addClass("alert-info");
          break;
          case "WARNING":
            $("#toast-alert .toast-body")
            .removeClass("alert-danger")
            .removeClass("alert-success")
            .removeClass("alert-primary")
            .removeClass("alert-info")
            .addClass("alert-warning");
          break;
          case "DANGER":
            $("#toast-alert .toast-body")
            .removeClass("alert-success")
            .removeClass("alert-warning")
            .removeClass("alert-primary")
            .removeClass("alert-info")
            .addClass("alert-danger");
          break;
          case "SUCCESS":
            $("#toast-alert .toast-body")
            .removeClass("alert-danger")
            .removeClass("alert-warning")
            .removeClass("alert-primary")
            .removeClass("alert-info")
            .addClass("alert-success");
          break;
          default:
            $("#toast-alert .toast-bodyy")
            .removeClass("alert-danger")
            .removeClass("alert-warning")
            .removeClass("alert-primary")
            .removeClass("alert-info")
            .addClass("alert-success");
        }
      }

    
    var x = document.getElementById("aud-success");
    x.play();

    $("#toast-alert").find("text[name='text-alert']").html(text),
    $("#toast-alert").toast("show");
      
    setTimeout(function(){
      $("#toast-alert").toast("hide");
    }, timer);
    
}


// function modal_alert(text, type, timer){

//       var as = document.getElementById("aud-success");
//       var aw = document.getElementById("aud-warning");
//       var ad = document.getElementById("aud-danger");
//       var ai = document.getElementById("aud-info");

//       as.pause();
//       aw.pause();
//       ad.pause();
//       ai.pause();

//       if(text == undefined || text == ""){
//         text = "Success!";
//       }

//       if(type == undefined || type == ""){
//           $("#toast-alert .toast-body")
//           .removeClass("alert-danger")
//           .removeClass("alert-warning")
//           .removeClass("alert-primary")
//           .removeClass("alert-info")
//           .addClass("alert-success");
//           as.play();
//       }else{
//         switch( type.toUpperCase() ){
//           case "PRIMARY":
//           case "INFO":
//             $("#toast-alert .toast-body")
//             .removeClass("alert-danger")
//             .removeClass("alert-warning")
//             .removeClass("alert-primary")
//             .removeClass("alert-success")
//             .addClass("alert-info");
//             ai.play();
//           break;
//           case "WARNING":
//             $("#toast-alert .toast-body")
//             .removeClass("alert-danger")
//             .removeClass("alert-success")
//             .removeClass("alert-primary")
//             .removeClass("alert-info")
//             .addClass("alert-warning");
//             aw.play();
//           break;
//           case "DANGER":
//             $("#toast-alert .toast-body")
//             .removeClass("alert-success")
//             .removeClass("alert-warning")
//             .removeClass("alert-primary")
//             .removeClass("alert-info")
//             .addClass("alert-danger");
//             ad.play();
//           break;
//           case "SUCCESS":
//             $("#toast-alert .toast-body")
//             .removeClass("alert-danger")
//             .removeClass("alert-warning")
//             .removeClass("alert-primary")
//             .removeClass("alert-info")
//             .addClass("alert-success");
//             as.play();
//           break;
//           default:
//             $("#toast-alert .toast-bodyy")
//             .removeClass("alert-danger")
//             .removeClass("alert-warning")
//             .removeClass("alert-primary")
//             .removeClass("alert-info")
//             .addClass("alert-success");
//             as.play();
//         }
//       }

    
    

//     $("#toast-alert").find("text[name='text-alert']").html(text),
//     $("#toast-alert").toast("show");
      
//     setTimeout(function(){
//       $("#toast-alert").toast("hide");
//     }, timer);
    
// }



function modal_confirm(confirm_callback, confirm_forward, title, body, type, buttonno, buttonyes){

      $("#confirm-callback").val(confirm_callback), 
      $("#confirm-forward").val(confirm_forward),
      $("#toast-confirm").modal("show");

      if(buttonyes == ''){
        $("#toast-confirm").find("#btn-confirm-yes").html("YES");
      }
      else{
         $("#toast-confirm").find("button[name='btn-confirm-yes']").html(buttonyes)
      }

      if (buttonno == '') {
        $("#toast-confirm").find("#btn-confirm-no").html("NO");
      }
      else{
        $("#toast-confirm").find("button[name='btn-confirm-no']").html(buttonno);
      }

      if(body == '') {

      }
      else
      {
        $("#toast-confirm").find("p[name='modal-body']").html(body);
      }
     
      if (title == '') {

      }
      else{
         $("#toast-confirm").find("text[name='text-confirm']").html(title);
      }
}

$("#toast-confirm").on('show.bs.modal', function () {
  // do something...
    setTimeout(function(){
      $('#toast-confirm').find("button[name='btn-confirm-yes']").focus();
    }, 500)
})




$("#frm-confirm").submit(function(e){
  e.preventDefault();
  eval( $("#confirm-callback").val() );
  $("#toast-confirm").modal("hide");
})

$("#toast-confirm").find("button[name='btn-confirm-no']").click(function(){
  $("#toast-confirm").modal("hide"),
  eval( $("#confirm-forward").val() );
})

</script>
