<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sistema - Restaurante</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="https://chineserestaurantcrossings.com/wp-content/uploads/2018/02/cropped-OP2-1-32x32.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">


  <style>
    .card {
  margin-top:25%;
  margin-bottom: 30px;
  border: none;
  border-radius: 10px;
  box-shadow: 0px 0 30px rgba(1, 41, 112, 0.1);
  padding-bottom:40px;
}

.card-body{
            background: #1c92d2;  /* fallback for old browsers */
background: -webkit-linear-gradient(to top, #f2fcfe, #1c92d2);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to top, #f2fcfe, #1c92d2); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
border-radius: 10px;
box-shadow: 0px 0 30px rgba(1, 41, 112, 0.1);

        }

        .bg-color{
          background: #2980B9;  /* fallback for old browsers */
background: -webkit-linear-gradient(to bottom, #FFFFFF, #6DD5FA, #2980B9);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to bottom, #FFFFFF, #6DD5FA, #2980B9); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

background-attachment: fixed;
        }

        .btn-primary{
          color:#fff;
          font-size:18px;
          font-weight:600;
          background-color:#C01B18;
          border-color:#C01B18;
        }
        .form-padding{
          padding:20px;
        }

  </style>
</head>

<body class="bg-color">
    <div class="container">

          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                  <img src="https://chineserestaurantcrossings.com/wp-content/uploads/2018/02/OP2-1-1.png" class="card-img-top rounded mx-auto d-block" alt="The-Chinese-Restaurant-Logo.png">
                  </div>

                      <form class="row g-3 needs-validation form-padding" novalidate action="login.php" method="POST">

                        <div class="col-12">
                          <label for="yourUsername" class="form-label">Usuario</label>
                          <div class="input-group has-validation">
                            <span class="input-group-text" id="inputGroupPrepend">  </span>
                            <input type="text" name="txtUsuario" class="form-control" id="yourUsername" required>
                            <div class="invalid-feedback">*Campo obligatorio</div>
                          </div>
                        </div>

                        <div class="col-12">
                          <label for="yourPassword" class="form-label">Contraseña</label>
                          <input type="password" name="txtPass" class="form-control" id="yourPassword" required>
                          <div class="invalid-feedback">*Campo obligatorio</div>
                        </div>

                        <div class="col-12">

                        </div>
                        <div class="col-12">
                          <input type="submit" class="btn btn-primary w-100" value="Ingresar"/>
                        </div>
                      </form>

                </div>
              </div>

            </div>


    </div>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.min.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>