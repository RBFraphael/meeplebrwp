<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url("assets/css/bootstrap-custom.min.css"); ?>">
    <script type="text/javascript" src="<?= base_url("assets/js/jquery-3.5.1.min.js"); ?>"></script>
    <title>Admin</title>
</head>
<body>
    <div class="container py-3">
        <div class="row mb-3">
            <div class="col-12">
                <h3>Envios de projetos</h3>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Autor</th>
                                <th>E-mail</th>
                                <th>Projeto</th>
                                <th>Data de Envio</th>
                            </tr>
                        </thead>
                        <tbody class="table-sm">
                            <?php foreach($this->submissions->get_all() as $submission): ?>
                            <tr role="button" data-href="<?= site_url("admin/submission/".$submission['id']); ?>">
                                <td><?= $submission['id']; ?></td>
                                <td><?= $submission['author']; ?></td>
                                <td><?= $submission['email']; ?></td>
                                <td><?= $submission['project_name']; ?></td>
                                <td><?= date("d/m/Y H:i:s", strtotime($submission['submission_date']) - (60*60*3)); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $("tr[role=button]").on("click", function(){
            if($(this).attr("data-href") != null){
                window.location.href = $(this).attr("data-href");
            }
        });
    </script>
</body>
</html>