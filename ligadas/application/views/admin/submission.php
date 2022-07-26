<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url("assets/css/bootstrap-custom.min.css"); ?>">
    <script type="text/javascript" src="<?= base_url("assets/js/jquery-3.5.1.min.js"); ?>"></script>
    <title>Projeto <?= $project_name; ?></title>
</head>
<body>
    <div class="container py-3">
    <div class="row mb-3">
            <div class="col-12">
                <h3>Projeto: <?= $project_name; ?></h3>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p><strong>ID:</strong> <?= $id; ?></p>
                <p><strong>Autor:</strong> <?= $author; ?></p>
                <p><strong>E-mail:</strong> <?= $email; ?></p>
                <p><strong>Feito em time?</strong> <?= $team ? "Sim" : "Não"; ?></p>
                <?php if($team): ?>
                <p><strong>Nomes dos co-autores:</strong> <?= implode("; ", unserialize($co_authors_names)); ?></p>
                <p><strong>E-mails dos co-autores:</strong> <?= implode("; ", unserialize($co_authors_emails)); ?></p>
                <?php endif; ?>
                <p><strong>Nome do projeto:</strong> <?= $project_name; ?></p>
                <p><strong>Manual do projeto:</strong> <a href="<?= $this->files->get_url($project_manual); ?>" target="_blank" rel="noopener noreferrer">Arquivo</a></p>
                <p><strong>Print And Play do projeto:</strong> <a href="<?= $this->files->get_url($project_printandplay); ?>" target="_blank" rel="noopener noreferrer">Arquivo</a></p>
                <p><strong>Folha de Vendas do projeto:</strong> <a href="<?= $this->files->get_url($project_sellsheet); ?>" target="_blank" rel="noopener noreferrer">Arquivo</a></p>
                <p><strong>Data de envio:</strong> <?= date("d/m/Y H:i:s", strtotime($submission_date) - (60*60*3)); ?></p>
            </div>
        </div>
    </div>
</body>
</html>