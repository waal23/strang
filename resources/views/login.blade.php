


<!DOCTYPE html>
<html lang="en">


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>stranger</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="asset/css/app.min.css">
    <link rel="stylesheet" href="asset/bundles/bootstrap-social/bootstrap-social.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="asset/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="asset/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='asset/img/favicon.ico' />
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Login</h4>
                            </div>
                            <div class="card-body">
                                <form method="post" action="login" class="needs-validation" novalidate="">
                                    @csrf
                                    <div class="form-group">
                                        <label for="user_name">Username</label>
                                        <input id="user_name" type="text" class="form-control"
                                            placeholder="Enter Your Username " name="user_name" tabindex="1" required
                                            autofocus>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="user_password" class="control-label">Password</label>
                                        </div>
                                        <input id="user_password" type="password" class="form-control"
                                            name="user_password" placeholder="Enter Your Password" tabindex="2"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" name="submit"
                                            tabindex="4">
                                            Login
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="asset/js/app.min.js"></script>
    <!-- JS Libraies -->
    <!-- Page Specific JS File -->
    <!-- Template JS File -->
    <script src="asset/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="asset/js/custom.js"></script>
</body>


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->

</html>