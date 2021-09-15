
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title><?= _APP_NAME.' | '.$page_title ?></title>
  <!-- Favicon -->
  <link rel="icon" href="<?= site_url('assets/img/brand/'._LOGO_SEKOLAH) ?>" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="<?= site_url('assets/vendor/nucleo/css/nucleo.css') ?>" type="text/css">
  <link rel="stylesheet" href="<?= site_url('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') ?>" type="text/css">
  <link rel="stylesheet" href="<?= site_url('assets/vendor/animate.css/animate.min.css') ?>">

  <!-- Argon CSS -->
  <link rel="stylesheet" href="<?= site_url('assets/css/argon.css?v=1.1.0') ?>" type="text/css">
</head>

<body class="bg-default">

  <!-- Main content -->
  <div class="main-content">

    <!-- Page content -->
    <div class="container py-5 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <div class="card bg-secondary border-0 mb-0">
            <div class="card-body px-lg-4 py-lg-4">
              <div class="card-img text-center">
                <img width="100" height="100" src="<?= site_url('assets/img/brand/'._LOGO_SEKOLAH) ?>">
              </div>
              <div class="text-center text-muted mb-4">
                <small><?= _APP_NAME ?></small>
              </div>
              <form role="form" id="form-register" method="post">
                <div class="row">
                  <div class="col-md">

                    <div class="form-group">
                      <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                        </div>
                        <input class="form-control" placeholder="Nama Lengkap" type="text" name="nama_lengkap">
                      </div>
                      <div class="invalid-feedback-nama_lengkap"></div>
                    </div>

                  </div>

                  <div class="col-md">

                    <div class="form-group">
                      <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                        </div>
                        <input class="form-control" placeholder="Username" type="text" name="username">
                      </div>
                      <div class="invalid-feedback-username"></div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md">

                    <div class="form-group">
                      <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                        </div>
                        <input class="form-control" placeholder="Email" type="email" name="email">
                      </div>
                      <div class="invalid-feedback-email"></div>
                    </div>

                  </div>

                  <div class="col-md">

                    <div class="form-group">
                      <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                        </div>
                        <input class="form-control" placeholder="Konfirmasi Email" type="email" name="conf_email">
                      </div>
                      <div class="invalid-feedback-conf_email"></div>
                    </div>
                    
                  </div>
                </div>

                <div class="row">
                  <div class="col-md">

                    <div class="form-group">
                      <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                        </div>
                        <input class="form-control" placeholder="Password" type="password" name="password">
                      </div>
                      <div class="invalid-feedback-password"></div>
                    </div>

                  </div>

                  <div class="col-md">

                    <div class="form-group">
                      <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                        </div>
                        <input class="form-control" placeholder="Password" type="password" name="conf_password">
                      </div>
                      <div class="invalid-feedback-conf_password"></div>
                    </div>
                    
                  </div>
                </div>
                
                
                <div class="custom-control custom-control-alternative custom-checkbox">
                  <input class="custom-control-input" id=" ketentuan" type="checkbox" required="">
                  <label class="custom-control-label" for=" ketentuan">
                    <span class="text-muted"><small>Dengan mencentang, anda menyetujui ketentuan, kebijakan data kami, anda akan menerima verifikasi email setelah mendaftar.</small></span>
                  </label>
                </div>
                <div class="text-center">
                  <button type="submit" id="btn-login" class="btn btn-primary mt-6 mb-2">Sign in</button>
                </div>
              </form>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-6">
              <a href="#" class="text-light"><small>&copy; 2021 BasisCoding</small></a>
            </div>
            <div class="col-6 text-right">
              <a href="#" class="text-light"><small>V 1.0.0</small></a>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
  
  <!-- Core -->
  <script src="<?= site_url('assets/vendor/jquery/dist/jquery.min.js') ?>"></script>
  <script src="<?= site_url('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script> 
  <script src="<?= site_url('assets/vendor/js-cookie/js.cookie.js') ?>"></script>

  <script src="<?= site_url('assets/vendor/bootstrap-notify/bootstrap-notify.min.js') ?>"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#form-register').on('submit', function() {

        $.ajax({
          url: '<?= site_url('Auth/register') ?>',
          type: 'POST',
          dataType:'JSON',
          data: $(this).serialize(),
          beforeSend: function()
          { 
            $("#btn-register").attr('disabled', '');
            $("#btn-register").html('<span class="glyphicon glyphicon-transfer"></span>   Sending ...');
          },
          success:function(response) {
            
            if (response.type == 'val_error') {
              $('.invalid-feedback-nama_lengkap').html(response.nama_lengkap);
              $('.invalid-feedback-username').html(response.username);
              $('.invalid-feedback-email').html(response.email);
              $('.invalid-feedback-conf_email').html(response.conf_email);
              $('.invalid-feedback-password').html(response.password);
              $('.invalid-feedback-conf_password').html(response.conf_password);
            }else{
              $.notify({
                icon: 'ni ni-bell-55',
                title: response.type,
                message:response.message
              },{
                type:response.type,
                placement: {
                  from: "top",
                  align: "right"
                },
                animate: {
                  enter: 'animated fadeInDown',
                  exit: 'animated fadeOutUp'
                }
              });

              setTimeout(function(){ 
                window.location.href = response.redirect;
              }, 1500);
            }

          }
        });

        return false;
      });
    });
  </script>
</body>

</html>