<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<form action="<?= site_url(); ?>" method="post" accept-charset="utf-8">
    <div class="mb-4">
        <label for="name" class="text-light">Nome Completo:</label>
        <input type="text" name="name" id="name" class="form-control shadow" required="required" value="<?= set_value("name"); ?>">
        <span class="small text-danger"><?= form_error("name"); ?></span>
    </div>
    <div class="mb-4">
        <label for="email" class="text-light">Endereço de e-mail:</label>
        <input type="email" name="email" id="email" class="form-control shadow" required="required" value="<?= set_value("email"); ?>">
        <span class="small text-danger"><?= form_error("email"); ?></span>
    </div>
    <div class="mb-4">
        <label for="subject" class="text-light">Motivo do Contato:</label>
        <input type="text" name="subject" id="subject" class="form-control shadow" required="required" value="<?= set_value("subject"); ?>">
        <span class="small text-danger"><?= form_error("subject"); ?></span>
    </div>
    <div class="mb-4">
        <label for="message" class="text-light">Mensagem:</label>
        <textarea name="message" id="message" rows="5" class="form-control shadow" required="required" style="resize:none;"><?= set_value("message"); ?></textarea>
        <span class="small text-danger"><?= form_error("message"); ?></span>
    </div>
    <div class="text-center">
        <input type="hidden" name="form" value="contact-submission">
        <button type="submit" class="btn btn-success px-4 shadow">Enviar Mensagem</button>
    </div>
</form>