    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/signin.css">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
    <main class="form-signin">
    <form id="login_form" action="<?= base_url(); ?>home/auth" method="post">
        <!--<img class="mb-4" src="/docs/5.1/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">-->
        <h1 class="h3 mb-3 fw-normal">Aplikasi Inventaris Barang</h1>

        <?php if(!empty($error_email) || !empty($error_password)){ ?>
            <div class="alert alert-danger" role="alert">
                <?= $error_email . $error_password ?>
            </div>
        <?php } ?>

        <?php $is_invalid = !empty($error_email) ? 'is-invalid' : ''; ?>
        <div class="form-floating">
            <?php $email = !empty($email) ? $email : ''; ?>
                <input type="email" class="form-control <?= $is_invalid; ?>" id="email" name="email" value="<?= $email ?>" placeholder="name@example.com">
            <label for="floatingInput">Email</label>
        </div>

        <?php $is_invalid = !empty($error_password) ? 'is-invalid' : ''; ?>
        <div class="form-floating">
        <input type="password" class="form-control  <?= $is_invalid; ?>" id="password" name="password" placeholder="Password" required>
        <label for="floatingPassword">Password</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
    </form>
    </main>

  <script>
      $(document).ready(function(){
          $("#email").focus();

          <?php if(!empty($error_password)){ ?>
                    $("#password").focus();
          <?php } ?>
      });
  </script>
