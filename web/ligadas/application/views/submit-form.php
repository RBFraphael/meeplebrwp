<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<form action="<?= site_url(); ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8">
    <div class="mb-4">
        <label for="author" class="text-light">Proponente Autora:</label>
        <input type="text" name="author" id="author" class="form-control shadow" required="required" value="<?= set_value("author"); ?>">
        <span class="small text-danger"><?= form_error("author"); ?></span>
    </div>
    <div class="mb-4">
        <label for="email" class="text-light">Endereço de e-mail:</label>
        <input type="email" name="email" id="email" class="form-control shadow" required="required" value="<?= set_value("email"); ?>">
        <span class="small text-light">* Certifique-se de usar aqui o mesmo e-mail aplicado no formulário de cadastro da Liga</span>
        <span class="small text-danger"><?= form_error("email"); ?></span>
    </div>
    <div class="mb-4">
        <label for="team" class="text-light">Seu jogo foi feito por uma equipe?</label>
        <div class="form-check">
            <input type="radio" name="team" id="team_no" class="form-check-input" value="no" <?= set_radio("team", "no", true) ?>>
            <label for="team_no" class="form-check-label text-light">Não</label>
        </div>
        <div class="form-check">
            <input type="radio" name="team" id="team_yes" class="form-check-input" value="yes" <?= set_radio("team", "yes", false) ?>>
            <label for="team_yes" class="form-check-label text-light">Sim</label>
        </div>
        <span class="small text-danger"><?= form_error("team"); ?></span>
    </div>
    <div class="mb-4" id="co-authors" style="display:none;">
        <template id="co-author-block">
            <div class="mb-2 co-author-block">
                <div class="input-group">
                    <input type="text" class="form-control" name="co_author_name[]" placeholder="Nome completo" required="required">
                    <input type="text" class="form-control" name="co_author_email[]" placeholder="Endereço de e-mail" required="required">
                    <div class="input-group-append">
                        <button class="btn btn-danger delete-co-author" type="button"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
            </div>
        </template>
        <p class="text-light">Integrantes:</p>
        <div id="co-authors-list"></div>
        <button class="btn btn-primary btn-sm" type="button" id="add-co-author"><i class="fas fa-plus"></i> Adicionar integrante</button>
    </div>
    <div class="mb-4">
        <label for="project_name" class="text-light">Nome do Projeto:</label>
        <input type="text" name="project_name" id="project_name" class="form-control shadow" required="required" value="<?= set_value("project_name"); ?>">
        <span class="small text-danger"><?= form_error("project_name"); ?></span>
    </div>
    <div class="mb-4">
        <label class="text-light">Manual:</label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="project_manual" name="project_manual" required="required" accept="application/pdf">
            <label class="custom-file-label" for="project_manual">Escolher arquivo PDF (até <?= ini_get("post_max_size"); ?>b)</label>
            <span class="small text-danger"><?= form_error("project_manual"); ?></span>
        </div>
    </div>
    <div class="mb-4">
        <label class="text-light">Print and Play:</label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="project_printandplay" name="project_printandplay" required="required" accept="application/pdf">
            <label class="custom-file-label" for="project_printandplay">Escolher arquivo PDF (até <?= ini_get("post_max_size"); ?>b)</label>
            <span class="small text-danger"><?= form_error("project_printandplay"); ?></span>
        </div>
    </div>
    <div class="mb-4">
        <label class="text-light">Folha de Vendas:</label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="project_sellsheet" name="project_sellsheet" required="required" accept="application/pdf">
            <label class="custom-file-label" for="project_sellsheet">Escolher arquivo PDF (até <?= ini_get("post_max_size"); ?>b)</label>
            <span class="small text-danger"><?= form_error("project_sellsheet"); ?></span>
        </div>
    </div>
    <div class="mb-4">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
            <label class="form-check-label text-light" for="terms">Confirmo que li e estou de acordo com os termos do edital.</label>
            <span class="small text-danger"><?= form_error("terms"); ?></span>
        </div>
    </div>
    <div class="text-center">
        <input type="hidden" name="form" value="project-submission">
        <button type="submit" class="btn btn-success px-4 shadow">Inscrever meu projeto</button>
    </div>
</form>
