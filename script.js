// SMARTWIZARD //
  
  function callSmartwizard(){
    $('#smartwizard').smartWizard({
      selected: 0, // Initial selected step, 0 = first step
      theme: 'dots', // theme for the wizard, related css need to include for other than default theme
      justified: true, // Nav menu justification. true/false
      darkMode:false, // Enable/disable Dark Mode if the theme supports. true/false
      autoAdjustHeight: false, // Automatically adjust content height
      cycleSteps: false, // Allows to cycle the navigation of steps
      backButtonSupport: true, // Enable the back button support
      enableURLhash: false, // Enable selection of the step based on url hash
      transition: {
          animation: 'fade', // Effect on navigation, none/fade/slide-horizontal/slide-vertical/slide-swing
          speed: '400', // Transion animation speed
          easing:'' // Transition animation easing. Not supported without a jQuery easing plugin
      },
      toolbarSettings: {
          showNextButton: false, // show/hide a Next button
          showPreviousButton: false, // show/hide a Previous button
          toolbarExtraButtons: [] // Extra buttons to show on toolbar, array of jQuery input/buttons elements
      },
      anchorSettings: {
          anchorClickable: false, // Enable/Disable anchor navigation
          enableAllAnchors: false, // Activates all anchors clickable all times
          markDoneStep: true, // Add done state on navigation
          markAllPreviousStepsAsDone: false, // When a step selected by url hash, all previous steps are marked done
          removeDoneStepOnNavigateBack: true, // While navigate back done step after active step will be cleared
          enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
      },
      keyboardSettings: {
          keyNavigation: false, // Enable/Disable keyboard navigation(left and right keys are used if enabled)
          keyLeft: [37], // Left key code
          keyRight: [39] // Right key code
      },
      lang: { // Language variables for button
          next: 'Selanjutnya',
          previous: 'Kembali'
      },
    });
  }
  $('#formregis1').on('shown.bs.modal', callSmartwizard())


//auto kapital//
function toTitleCase() {
  var inputlow = [$('#formNamalengkap').val(),$('#formNamapanggilan').val(),$('#formTempatlahir').val(),$('#formNamawali').val()];
  var kapitalized = [
    inputlow[0].split(/\s+/).map( s => s.charAt( 0 ).toUpperCase() + s.substring(1).toLowerCase() ).join( " " ).replace( /[<>:"\/\\|?*]+/g, '' ) ,
    inputlow[1].split(/\s+/).map( s => s.charAt( 0 ).toUpperCase() + s.substring(1).toLowerCase() ).join( " " ).replace( /[<>:"\/\\|?*]+/g, '' ),
    inputlow[2].split(/\s+/).map( s => s.charAt( 0 ).toUpperCase() + s.substring(1).toLowerCase() ).join( " " ).replace( /[<>:"\/\\|?*]+/g, '' ),
    inputlow[3].split(/\s+/).map( s => s.charAt( 0 ).toUpperCase() + s.substring(1).toLowerCase() ).join( " " ).replace( /[<>:"\/\\|?*]+/g, '' ),
  ];
  $('#formNamalengkap').val(kapitalized[0]);
  $('#formNamapanggilan').val(kapitalized[1]);
  $('#formTempatlahir').val(kapitalized[2]);
  $('#formNamawali').val(kapitalized[3])
}


// tooltip //
  $(document).ready(function(){
    $('[data-toggle="popover"]').popover();
  });



//prevent enter to submit//
  $(document).ready(function() {
    $(window).keydown(function(event){
      if(event.keyCode == 13) {
        event.preventDefault();
        return false;
      }
    });
  });



//pengalaman mb field + interview//
$(document).ready(function() {
  if (document.getElementById('formPernahmb').value == "Ya") {
    $('#formPernahmb2').prop('disabled', false);
    $('#formPernahmb3').prop('disabled', false);
  }
  else {
    $('#formPernahmb2').prop('disabled', true);
    $('#formPernahmb3').prop('disabled', true);
  }
});
function pernahmb() {
  if (document.getElementById('formPernahmb').value == "Ya") {
    $('#formPernahmb2').prop('disabled', false);
    $('#formPernahmb3').prop('disabled', false);
  }
  else {
    $('#formPernahmb2').prop('disabled', true);
    $('#formPernahmb3').prop('disabled', true);
  }
}

$(document).ready(function() {
  $('#formSesiinterview').val('');
  if (document.getElementById('formHariinterview').value == "") {
    $('#formSesiinterview').prop('disabled', true);
  }
  else {
    $('#formSesiinterview').prop('disabled', false);
  }
});
function pernahinterview() {
  $('#formSesiinterview').val('');
  if (document.getElementById('formHariinterview').value == "") {
    $('#formSesiinterview').prop('disabled', true);
  }
  else {
    $('#formSesiinterview').prop('disabled', false);
  }
}





// repeat nim/nama //
function frepeat() {
  var rnamalengkap = $('#formNamalengkap').val();
  var rnim = $('#formNim').val();
  console.log(rnamalengkap,rnim)
  document.getElementById('formNamalengkap2').value=rnamalengkap;
  document.getElementById('formNim2').value=rnim;
}



// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
  


//invalid feedback// 
function fvalidation() {
  var vnim = $('#formNim').val();
  var formatnim = /^([0-9]{2})+\/([0-9]{6})+\/([A-Z]{1,5})+\/([0-9]{5})$/gm;
  console.log(vnim)
    if (vnim === "") {
      document.getElementById('formNim').setCustomValidity("invalid");
      document.getElementById('invFdbNim').innerHTML="Isian masih kosong.";
    }
    else if (!formatnim.exec(vnim)) {
      document.getElementById('formNim').setCustomValidity("invalid");
      document.getElementById('invFdbNim').innerHTML="Format NIM salah.";
    }
    else if (vnim == "18/426909/GE/08845") {
      document.getElementById('formNim').setCustomValidity("invalid");
      document.getElementById('invFdbNim').innerHTML="NIM rendy hehe.";
    }
    else {
      var nim = $('#formNim').val();
      $.ajax({
        url: 'validation.php',
        type: 'post',
        data: {
          'nim_check' : 1,
          'nim' : nim,
        },
        success: function(response){
          console.log(response);
          if (response.includes('pabmbugmnimtaken') == true) {
            console.log('taken');
            document.getElementById('formNim').setCustomValidity("invalid");
            document.getElementById('invFdbNim').innerHTML="NIM yang dimasukkan telah terdaftar.";
          }else if (response.includes('pabmbugmnimavailable') == true) {
            console.log('available');
            document.getElementById('formNim').setCustomValidity("");
          }
        }
      });
     console.log('else active');
    }

  var vemail = $('#formEmail').val();
  var formatemail = /[\w-]+@([\w-]+\.)+[\w-]+/i;
  console.log(vemail)
    if (vemail == "") {
      document.getElementById('formEmail').setCustomValidity("invalid");
      document.getElementById('invFdbEmail').innerHTML="Isian masih kosong.";
    }
    else if (!formatemail.exec(vemail)) {
      document.getElementById('formEmail').setCustomValidity("invalid");
      document.getElementById('invFdbEmail').innerHTML="Format e-mail salah.";
    }
    else {
      var email = $('#formEmail').val();
      $.ajax({
        url: 'validation.php',
        type: 'post',
        data: {
          'email_check' : 1,
          'email' : email,
        },
        success: function(response){
          console.log(response);
          if (response.includes('pabmbugmemailtaken') == true) {
            console.log('taken');
            document.getElementById('formEmail').setCustomValidity("invalid");
            document.getElementById('invFdbEmail').innerHTML="E-mail yang dimasukkan telah terdaftar.";
          }else if (response.includes('pabmbugmemailavailable') == true) {
            console.log('available');
            document.getElementById('formEmail').setCustomValidity("");
          }
        }
      });
     console.log('else active');
    }
  }

  function interview(){
    $("form").addClass('was-validated');
    var interview = $('#formHariinterview').val() + ' ' + $('#formSesiinterview').val();
    $.ajax({
      url: 'validation.php',
      type: 'post',
      data: {
        'interview_check' : 1,
        'interview' : interview,
      },
      success: function(response){
        var statusinterviewpenuh = ['pabmbugmjadwalinterviewA1penuh','pabmbugmjadwalinterviewA2penuh','pabmbugmjadwalinterviewA3penuh','pabmbugmjadwalinterviewA4penuh','pabmbugmjadwalinterviewA5penuh','pabmbugmjadwalinterviewA6penuh','pabmbugmjadwalinterviewA7penuh','pabmbugmjadwalinterviewA8penuh','pabmbugmjadwalinterviewA9penuh','pabmbugmjadwalinterviewB1penuh','pabmbugmjadwalinterviewB2penuh','pabmbugmjadwalinterviewB3penuh','pabmbugmjadwalinterviewB4penuh','pabmbugmjadwalinterviewB5penuh','pabmbugmjadwalinterviewB6penuh','pabmbugmjadwalinterviewB7penuh','pabmbugmjadwalinterviewB8penuh','pabmbugmjadwalinterviewB9penuh','pabmbugmjadwalinterviewC1penuh','pabmbugmjadwalinterviewC2penuh','pabmbugmjadwalinterviewC3penuh','pabmbugmjadwalinterviewC4penuh','pabmbugmjadwalinterviewC5penuh','pabmbugmjadwalinterviewC6penuh','pabmbugmjadwalinterviewC7penuh','pabmbugmjadwalinterviewC8penuh','pabmbugmjadwalinterviewC9penuh','pabmbugmjadwalinterviewD1penuh','pabmbugmjadwalinterviewD2penuh','pabmbugmjadwalinterviewD3penuh','pabmbugmjadwalinterviewD4penuh','pabmbugmjadwalinterviewD5penuh','pabmbugmjadwalinterviewD6penuh','pabmbugmjadwalinterviewD7penuh','pabmbugmjadwalinterviewD8penuh','pabmbugmjadwalinterviewD9penuh','pabmbugmjadwalinterviewE1penuh','pabmbugmjadwalinterviewE2penuh','pabmbugmjadwalinterviewE3penuh','pabmbugmjadwalinterviewE4penuh','pabmbugmjadwalinterviewE5penuh','pabmbugmjadwalinterviewE6penuh','pabmbugmjadwalinterviewE7penuh','pabmbugmjadwalinterviewE8penuh','pabmbugmjadwalinterviewE9penuh','pabmbugmjadwalinterviewF1penuh','pabmbugmjadwalinterviewF2penuh','pabmbugmjadwalinterviewF3penuh','pabmbugmjadwalinterviewF4penuh','pabmbugmjadwalinterviewF5penuh','pabmbugmjadwalinterviewF6penuh','pabmbugmjadwalinterviewF7penuh','pabmbugmjadwalinterviewF8penuh','pabmbugmjadwalinterviewF9penuh','pabmbugmjadwalinterviewG1penuh','pabmbugmjadwalinterviewG2penuh','pabmbugmjadwalinterviewG3penuh','pabmbugmjadwalinterviewG4penuh','pabmbugmjadwalinterviewG5penuh','pabmbugmjadwalinterviewG6penuh','pabmbugmjadwalinterviewG7penuh','pabmbugmjadwalinterviewG8penuh','pabmbugmjadwalinterviewG9penuh']
        var statusinterview = response.substring(-30);
        console.log(statusinterview);
        if (statusinterviewpenuh.includes(statusinterview)) {
          document.getElementById('formSesiinterview').setCustomValidity("invalid");
          document.getElementById('invFdbInterview').innerHTML="Maaf, jadwal yang dipilih sudah penuh.";
        }
        else {
          document.getElementById('formSesiinterview').setCustomValidity("");
        }
      }
    });
  }





//file input validation//
  function fvalidation_file() {
    var fileInput = [document.getElementById('formPaspoto'),document.getElementById('formKtm')]; 
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.bmp|^$)$/i;
    console.log(fileInput[0].files.length);
    console.log(fileInput[1].files.length);
    if (fileInput[0].files.length != 0) {
      console.log(fileInput[0].files[0].name);
      console.log(fileInput[0].files[0].size);
      if (!allowedExtensions.exec(fileInput[0].value)) { 
        fileInput[0].value = '';
        if ($('.needs-validation1').hasClass('was-validated')){ 
          document.getElementById('invFdbFoto0').innerHTML="Format gambar tidak mendukung."
        }
        else {
          alert('Format gambar tidak mendukung.');
        }
        return false;
      }
      if (fileInput[0].files[0].size > 2500000) { 
        fileInput[0].value = '';
        if ($('.needs-validation1').hasClass('was-validated')){   
          document.getElementById('invFdbFoto0').innerHTML="Ukuran gambar melebihi 2MB."
        }
        else {
          alert('Ukuran gambar melebihi 2MB');
        }
        return false;
      }
    }  
    if (fileInput[1].files.length != 0) {  
      console.log(fileInput[1].files[0].name);
      console.log(fileInput[1].files[0].size);
      if (!allowedExtensions.exec(fileInput[1].value)) { 
        console.log(fileInput[1].files.name);
        fileInput[1].value = '';
        if ($('.needs-validation1').hasClass('was-validated')){ 
          document.getElementById('invFdbFoto1').innerHTML="Format gambar tidak mendukung."
        }
        else {
          alert('Format gambar tidak mendukung.');
        }
        return false;
      }
      if (fileInput[1].files[0].size > 2500000) { 
        console.log(fileInput[1].files[0].size);
        fileInput[1].value = '';
        if ($('.needs-validation1').hasClass('was-validated')){   
          document.getElementById('invFdbFoto1').innerHTML="Ukuran gambar melebihi 2MB."
        }
        else {
          alert('Ukuran gambar melebihi 2MB');
        }
        return false;
      } 
    }
  }



//prevent submiting//
  (function() {
    'use strict';
    window.addEventListener('load', function() {
      // Get the forms we want to add validation styles to
      var forms = [document.getElementsByClassName('needs-validation'),document.getElementsByClassName('needs-validation1')];
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms[0], function(form) {
        document.getElementById("nextbtn1").addEventListener('click', function(event) {
          var nim = $('#formNim').val();
          $.ajax({
            url: 'validation.php',
            type: 'post',
            data: {
              'nim_check' : 1,
              'nim' : nim,
            },
            success: function(response){
              console.log(response);
              if (response.includes('pabmbugmnimtaken') == true) {
                console.log('taken');
                document.getElementById('formNim').setCustomValidity("invalid");
                document.getElementById('invFdbNim').innerHTML="NIM yang dimasukkan telah terdaftar.";
                event.preventDefault();
                event.stopPropagation();
              }
            }
          });
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          else {
              $('#formregis').one('hidden.bs.modal',function(){
                $('#formregis1').modal('show')
              });
              $('#smartwizard').smartWizard("goToStep", 0);
          }
          form.classList.add('was-validated');
        }, false);
      });
      var validation1 = Array.prototype.filter.call(forms[1], function(form) {
        document.getElementById("nextbtn2").addEventListener('click', function(event) {
          if (document.getElementById('formNamapanggilan').checkValidity() === false || 
          document.getElementById('formJeniskelamin').checkValidity() === false || 
          document.getElementById('formAgama').checkValidity() === false ||
          document.getElementById('formPaspoto').checkValidity() === false || 
          document.getElementById('formKtm').checkValidity() === false || 
          document.getElementById('formTempatlahir').checkValidity() === false || 
          document.getElementById('formTanggallahir').checkValidity() === false || 
          document.getElementById('formHobi').checkValidity() === false || 
          document.getElementById('formTinggibadan').checkValidity() === false ||
          document.getElementById('formBeratbadan').checkValidity() === false ||
          document.getElementById('formGoldar').checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
            form.classList.add('was-validated');
          }
          else {
            $('#smartwizard').smartWizard("next");
            form.classList.remove('was-validated');
            $('#formregis1').animate({ scrollTop: 0 }, 'slow');
          }
        }, false);
        document.getElementById("nextbtn3").addEventListener('click', function(event) {
          if (document.getElementById('formJenjangstudi').checkValidity() === false || document.getElementById('formFakultas').checkValidity() === false || document.getElementById('formProdi').checkValidity() === false || document.getElementById('formSma').checkValidity() === false ) {
            event.preventDefault();
            event.stopPropagation();
            form.classList.add('was-validated');
          }
          else {
            $('#smartwizard').smartWizard("next");
            form.classList.remove('was-validated');
            $('#formregis1').animate({ scrollTop: 0 }, 'slow');
          }
        }, false);
        document.getElementById("nextbtn4").addEventListener('click', function(event) {
          if (document.getElementById('formNamawali').checkValidity() === false || document.getElementById('formNomorwali').checkValidity() === false || document.getElementById('formAlamatortu').checkValidity() === false ) {
            event.preventDefault();
            event.stopPropagation();
            form.classList.add('was-validated');
          }
          else {
            $('#smartwizard').smartWizard("next");
            form.classList.remove('was-validated');
            $('#formregis1').animate({ scrollTop: 0 }, 'slow');
          }
        }, false);
        document.getElementById("nextbtn5").addEventListener('click', function(event) {
          if (document.getElementById('formTelp').checkValidity() === false || document.getElementById('formEmail').checkValidity() === false || document.getElementById('formAlamat').checkValidity() === false || document.getElementById('formJenisalamat').checkValidity() === false || document.getElementById('formJammalam').checkValidity() === false ) {
            event.preventDefault();
            event.stopPropagation();
            form.classList.add('was-validated');
          }
          else {
            $('#smartwizard').smartWizard("next");
            form.classList.remove('was-validated');
            $('#formregis1').animate({ scrollTop: 0 }, 'slow');
          }
        }, false);
        document.getElementById("nextbtn6").addEventListener('click', function(event) {
            $('#smartwizard').smartWizard("next");
            form.classList.remove('was-validated');
            $('#formregis1').animate({ scrollTop: 0 }, 'slow');
        }, false);
        document.getElementById("nextbtn7").addEventListener('click', function(event) {
          if (document.getElementById('formPernahmb').checkValidity() === false ) {
            event.preventDefault();
            event.stopPropagation();
            form.classList.add('was-validated');
          }
          else {
            $('#smartwizard').smartWizard("next");
            form.classList.remove('was-validated');
            $('#formregis1').animate({ scrollTop: 0 }, 'slow');
          }
        }, false);
        document.getElementById("prevbtn3").addEventListener('click', function(event) {
          $('#smartwizard').smartWizard("prev");
          form.classList.remove('was-validated');
          $('#formregis1').animate({ scrollTop: 0 }, 'slow');
        }, false);
        document.getElementById("prevbtn4").addEventListener('click', function(event) {
          $('#smartwizard').smartWizard("prev");
          form.classList.remove('was-validated');
          $('#formregis1').animate({ scrollTop: 0 }, 'slow');
        }, false);
        document.getElementById("prevbtn5").addEventListener('click', function(event) {
          $('#smartwizard').smartWizard("prev");
          form.classList.remove('was-validated');
          $('#formregis1').animate({ scrollTop: 0 }, 'slow');
        }, false);
        document.getElementById("prevbtn6").addEventListener('click', function(event) {
          $('#smartwizard').smartWizard("prev");
          form.classList.remove('was-validated');
          $('#formregis1').animate({ scrollTop: 0 }, 'slow');
        }, false);
        document.getElementById("prevbtn7").addEventListener('click', function(event) {
          $('#smartwizard').smartWizard("prev");
          form.classList.remove('was-validated');
          $('#formregis1').animate({ scrollTop: 0 }, 'slow');
        }, false);
        document.getElementById("prevbtn8").addEventListener('click', function(event) {
          $('#smartwizard').smartWizard("prev");
          form.classList.remove('was-validated');
          $('#formregis1').animate({ scrollTop: 0 }, 'slow');
        }, false);
        // SUBMIT BUTTON //
        document.getElementById("submitbtn").addEventListener('click', function(event) {
          event.preventDefault();
          event.stopPropagation();
          $('#closebtnform').prop('disabled', true);
          $('#submitbtn').prop('disabled', true);
          $('#prevbtn8').prop('disabled', true);
          $('#iconsubmit').removeClass('fa-paper-plane');
          $('#iconsubmit').addClass('fa-spinner');
          $('#iconsubmit').addClass('fa-pulse');
          if (document.getElementById('formHariinterview').checkValidity() === false || document.getElementById('formSesiinterview').checkValidity() === false ) {
            form.classList.add('was-validated');
            $('#closebtnform').prop('disabled', false);
            $('#submitbtn').prop('disabled', false);
            $('#prevbtn8').prop('disabled', false);
            $('#iconsubmit').addClass('fa-paper-plane');
            $('#iconsubmit').removeClass('fa-spinner');
            $('#iconsubmit').removeClass('fa-pulse');
          }
          else {
            var interview = $('#formHariinterview').val() + ' ' + $('#formSesiinterview').val();
            $.ajax({
              url: 'validation.php',
              type: 'post',
              data: {
                'interview_check' : 1,
                'interview' : interview,
              },
              success: function(response){
                var statusinterviewpenuh = ['pabmbugmjadwalinterviewA1penuh','pabmbugmjadwalinterviewA2penuh','pabmbugmjadwalinterviewA3penuh','pabmbugmjadwalinterviewA4penuh','pabmbugmjadwalinterviewA5penuh','pabmbugmjadwalinterviewA6penuh','pabmbugmjadwalinterviewA7penuh','pabmbugmjadwalinterviewA8penuh','pabmbugmjadwalinterviewA9penuh','pabmbugmjadwalinterviewB1penuh','pabmbugmjadwalinterviewB2penuh','pabmbugmjadwalinterviewB3penuh','pabmbugmjadwalinterviewB4penuh','pabmbugmjadwalinterviewB5penuh','pabmbugmjadwalinterviewB6penuh','pabmbugmjadwalinterviewB7penuh','pabmbugmjadwalinterviewB8penuh','pabmbugmjadwalinterviewB9penuh','pabmbugmjadwalinterviewC1penuh','pabmbugmjadwalinterviewC2penuh','pabmbugmjadwalinterviewC3penuh','pabmbugmjadwalinterviewC4penuh','pabmbugmjadwalinterviewC5penuh','pabmbugmjadwalinterviewC6penuh','pabmbugmjadwalinterviewC7penuh','pabmbugmjadwalinterviewC8penuh','pabmbugmjadwalinterviewC9penuh','pabmbugmjadwalinterviewD1penuh','pabmbugmjadwalinterviewD2penuh','pabmbugmjadwalinterviewD3penuh','pabmbugmjadwalinterviewD4penuh','pabmbugmjadwalinterviewD5penuh','pabmbugmjadwalinterviewD6penuh','pabmbugmjadwalinterviewD7penuh','pabmbugmjadwalinterviewD8penuh','pabmbugmjadwalinterviewD9penuh','pabmbugmjadwalinterviewE1penuh','pabmbugmjadwalinterviewE2penuh','pabmbugmjadwalinterviewE3penuh','pabmbugmjadwalinterviewE4penuh','pabmbugmjadwalinterviewE5penuh','pabmbugmjadwalinterviewE6penuh','pabmbugmjadwalinterviewE7penuh','pabmbugmjadwalinterviewE8penuh','pabmbugmjadwalinterviewE9penuh','pabmbugmjadwalinterviewF1penuh','pabmbugmjadwalinterviewF2penuh','pabmbugmjadwalinterviewF3penuh','pabmbugmjadwalinterviewF4penuh','pabmbugmjadwalinterviewF5penuh','pabmbugmjadwalinterviewF6penuh','pabmbugmjadwalinterviewF7penuh','pabmbugmjadwalinterviewF8penuh','pabmbugmjadwalinterviewF9penuh','pabmbugmjadwalinterviewG1penuh','pabmbugmjadwalinterviewG2penuh','pabmbugmjadwalinterviewG3penuh','pabmbugmjadwalinterviewG4penuh','pabmbugmjadwalinterviewG5penuh','pabmbugmjadwalinterviewG6penuh','pabmbugmjadwalinterviewG7penuh','pabmbugmjadwalinterviewG8penuh','pabmbugmjadwalinterviewG9penuh']
                var statusinterview = response.substring(-30);
                console.log(statusinterview);
                if (statusinterviewpenuh.includes(statusinterview)) {
                  document.getElementById('formSesiinterview').setCustomValidity("invalid");
                  document.getElementById('invFdbInterview').innerHTML="Maaf, jadwal yang dipilih sudah penuh.";
                  $('#closebtnform').prop('disabled', false);
                  $('#submitbtn').prop('disabled', false);
                  $('#prevbtn8').prop('disabled', false);
                  $('#iconsubmit').addClass('fa-paper-plane');
                  $('#iconsubmit').removeClass('fa-spinner');
                  $('#iconsubmit').removeClass('fa-pulse');
                }
                else {
                  document.getElementById('formSesiinterview').setCustomValidity("");
                  var form = $('#mainform').get(0);                   
                  var formData = new FormData(form);
                  $.ajax({
                    url: 'submit.php',
                    type: 'post',
                    data: formData,   
                    processData: false,
                    contentType: false,
                    success: function(response){
                      console.log(response);
                      if (response.includes('pabmbugmformberhasil') == true) {
                        console.log('tersubmit');
                        document.getElementById('notiftext').innerHTML="Form pendaftaran berhasil tersubmit. Bukti pendaftaran beserta informasi lainnya akan dikirim setelah data anda berhasil diverifikasi. Mohon cek email yang terdaftar secara berkala.";
                        $('#formregis1').modal('hide');
                        $('#formregis1').one('hidden.bs.modal',function(){
                          $('#formrnotif').modal('show')
                        });
                      }else {
                        console.log('tak tersubmit');
                        document.getElementById('notiftext').innerHTML="Terjadi kesalahan teknis saat proses submit form pendaftaran. Harap hubungi panitia PAB MB UGM";
                        $('#formregis1').modal('hide');
                        $('#formregis1').one('hidden.bs.modal',function(){
                          $('#formrnotif').modal('show')
                        });
                      }
                    }
                  })
                }
              }
            });
          }
        }, false);
        //end of submit btn // 
      });
    }, false);
  })();
  
    
//verifikasi// 
  function verifikasi() {
    var verif = document.getElementsByClassName('verifikasi');
    verif[0].innerHTML=$('#formNamalengkap2').val();
    verif[1].innerHTML=$('#formNamapanggilan').val();
    verif[2].innerHTML=$('#formTempatlahir').val();
    verif[3].innerHTML=$('#formTanggallahir').val();
    verif[4].innerHTML=$('#formJeniskelamin').val();
    verif[5].innerHTML=$('#formAgama').val();
    verif[6].innerHTML=$('#formTinggibadan').val()+" cm";
    verif[7].innerHTML=$('#formBeratbadan').val()+" kg";
    verif[8].innerHTML=$('#formGoldar').val();
    verif[9].innerHTML=$('#formHobi').val();
    verif[10].innerHTML=$('#formPenyakit').val();
    verif[11].innerHTML=$('#formAlergi').val();
    verif[12].innerHTML=document.getElementById('formPaspoto').files[0].name;
    verif[13].innerHTML=document.getElementById('formKtm').files[0].name;
    verif[14].innerHTML=$('#formNim2').val();
    verif[15].innerHTML=$('#formJenjangstudi').val();
    verif[16].innerHTML=$('#formFakultas').val();
    verif[17].innerHTML=$('#formProdi').val();
    verif[18].innerHTML=$('#formSma').val();
    verif[19].innerHTML=$('#formNamawali').val();
    verif[20].innerHTML=$('#formNomorwali').val();
    verif[21].innerHTML=$('#formAlamatortu').val();
    verif[22].innerHTML=$('#formTelp').val();
    verif[23].innerHTML=$('#formEmail').val();
    verif[24].innerHTML=$('#formAlamat').val();
    verif[25].innerHTML=$('#formJammalam').val();
    verif[26].innerHTML=$('#formJenisalamat').val();
    verif[27].innerHTML=$('#formIdline').val();
    verif[28].innerHTML=$('#formIdfb').val();
    verif[29].innerHTML=$('#formIdig').val();
    verif[30].innerHTML=$('#formIdtwitter').val();
    verif[31].innerHTML=$('#formBidangmusik').val();
    verif[32].innerHTML=$('#formBidangtari').val();
    verif[33].innerHTML=$('#formBidangorganisasi').val();
    verif[34].innerHTML=$('#formPernahmb').val();
    verif[35].innerHTML=$('#formPernahmb2').val();
    verif[36].innerHTML=$('#formPernahmb3').val();
    verif[37].innerHTML=$('#formKemampuanalat').val();
  }


//ajax submit//
  $("#mainform").submit(function(event){
      event.preventDefault();
      event.stopPropagation();
      event.trigger("reset"); 
  });

  if (nim.trim() === "") {
      nimField.classList.add("is-invalid");
      feedbackNim.innerHTML = "Isian NIM masih kosong.";
  } else if (!/^\d+$/.test(nim)) { // Hanya angka yang diizinkan
      nimField.classList.add("is-invalid");
      feedbackNim.innerHTML = "NIM hanya boleh berisi angka.";
  } else {
      nimField.classList.remove("is-invalid");
      nimField.classList.add("is-valid");
  }

  // Validasi Nama Lengkap
  var namaLengkap = document.getElementById("formNamalengkap").value;
  var namaField = document.getElementById("formNamalengkap");

  if (namaLengkap.trim() === "") {
      namaField.classList.add("is-invalid");
  } else {
      namaField.classList.remove("is-invalid");
      namaField.classList.add("is-valid");
  }


// Konversi input Nama Lengkap menjadi Title Case
function toTitleCase() {
  var input = document.getElementById("formNamalengkap");
  input.value = input.value.replace(/\w\S*/g, function(txt) {
      return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
  });
}

// Fungsi untuk memvalidasi sebelum melanjutkan
function frepeat() {
  var nimField = document.getElementById("formNim");
  var namaField = document.getElementById("formNamalengkap");

  // Jika validasi lolos, lanjutkan
  if (nimField.classList.contains("is-valid") && namaField.classList.contains("is-valid")) {
      alert("Data valid. Melanjutkan proses...");
      // Disini tambahkan logika untuk melanjutkan proses setelah validasi
  } else {
      alert("Harap periksa kembali isian formulir.");
  }
}

function fvalidation() {
  var forms = document.querySelectorAll('.needs-validation');

  Array.prototype.filter.call(forms, function(form) {
      form.classList.toggle('was-validated', !form.checkValidity());
  });
}

document.getElementById('formNim').addEventListener('input', function() {
  var pattern = /^\d{10}$/; // Pola yang mengizinkan hanya angka dengan panjang 10 karakter
  var nim = this.value;
  var feedback = document.getElementById('invFdbNim'); // Ambil elemen feedback
  
  if (!pattern.test(nim)) {
      this.setCustomValidity('Format NIM salah. NIM harus berisi 10 angka.');
      feedback.textContent = 'Format NIM salah. NIM harus terdiri dari 10 angka.';
  } else {
      this.setCustomValidity('');
      feedback.textContent = ''; // Menghapus pesan jika format benar
  }
});


// //notif submit//
// function notifsubmit() {
//   $('#formregis1').modal('hide');
//   $('#formregis1').one('hidden.bs.modal',function(){
//     $('#formrnotif').modal('show')
//   });
// }
