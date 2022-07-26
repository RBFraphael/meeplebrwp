<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url("assets/css/bootstrap-custom.min.css"); ?>">
    <title>Admin Login</title>
</head>
<body>
    <div class="container">
        <div class="row vh-100 justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-4 align-self-center">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="text-center">Acessar Painel</h4>
                        <form action="<?= site_url(uri_string()); ?>" method="post">
                            <div class="mb-3">
                                <label for="login-password" class="small">Senha mestra:</label>
                                <input type="password" name="login-password" id="login-password" class="form-control" required="required">
                            </div>
                            <button type="submit" class="btn btn-success">Entrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if($this->input->get("login") == "failed"): ?>
    <script type="text/javascript">
        alert("Login incorreto.");
    </script>
    <?php endif; ?>
</body>
</html>