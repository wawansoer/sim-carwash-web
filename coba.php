<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Thahira Carwash</title>
  <?php include 'header.php';?>
</head>
<body class="hold-transition login-page">   
  <div class="container">
    <div class="row">
      <div class="col text-center"> 
        <button type="button" class="btn btn-primary"> Kiri</button>
      </div>
      <div class="col text-center">
        <button type="button" class="btn btn-danger"> Kanan</button>
      </div>
    </div>
  </div>
  <?php include 'js.php';?> 
  <script>
    $(function () {
      $.validator.setDefaults({
        submitHandler: function () {
          alert( "Form successful submitted!" );
        }
      });
      $('#login').validate({
        rules: {
          np: {
            required: true,
            minlength: 16,
            maxlength: 16,
            number : true
          },
          sandi: {
            required: true,
            minlength : 8
          },
        },
        messages: {
          np: {
            required: "Silahkan Isi NIK",
            minlength: "Format NIK Tidak Dikenali",
            maxlength: "Format NIK Tidak Dikenali",
            number: "Format NIK Tidak Dikenali"
          },
          sandi: {
            required: "Silahkan Isi Kata Sandi!",
            minlength: "Kata Sandi Minimal 8 Karakter"
          },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
    </script>
</body>
</html>