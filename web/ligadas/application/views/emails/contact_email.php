<img src="<?= base_url("assets/img/meeple-logo-email.png"); ?>" alt="MeepleBR" style="heigth: 40px; margin-right: 15px; display: inline;" >
<img src="<?= base_url("assets/img/lbmt-logo-email.png"); ?>" alt="Mulheres Tabuleiristas" style="heigth: 40px; margin-right: 15px; display: inline;" >
<h1 style="font-family:Arial, Helvetica, sans-serif">Mensagem Recebida</h1>
<hr>
<p style="font-family:Arial, Helvetica, sans-serif"><b>Nome completo:</b> <?= $name; ?></p>
<p style="font-family:Arial, Helvetica, sans-serif"><b>Endereço de e-mail:</b> <?= $email; ?></p>
<p style="font-family:Arial, Helvetica, sans-serif"><b>Motivo do contato:</b> <?= $subject; ?></p>
<p style="font-family:Arial, Helvetica, sans-serif"><b>Mensagem:</b> <?= $message; ?></p>
<hr>
<small style="font-family:Arial, Helvetica, sans-serif">Este e-mail foi enviado automaticamente. Não responda a este e-mail.</small>
