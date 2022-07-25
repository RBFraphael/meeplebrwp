<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- CI3 -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edital Ligadas na Meeple - MeepleBR</title>

    <link href="<?= base_url("favicon.png"); ?>" rel="shortcut icon" />

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url("assets/css/all.min.css"); ?>">
    <link rel="stylesheet" href="<?= base_url("assets/css/aos.css"); ?>">
    <link rel="stylesheet" href="<?= base_url("assets/css/bootstrap-custom.min.css"); ?>">
    <link rel="stylesheet" href="<?= base_url("assets/css/jq-vertical-dot-navigation.css"); ?>">
    <link rel="stylesheet" href="<?= base_url("assets/css/normalize.css"); ?>">
    <link rel="stylesheet" href="<?= base_url("assets/css/slick.css"); ?>">
    <link rel="stylesheet" href="<?= base_url("assets/css/slick-theme.css"); ?>">
    <link rel="stylesheet" href="<?= base_url("assets/css/style.css?v=202103051732"); ?>">
</head>
<body>
    <div class="modal fade" tabindex="-1" id="documents-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content shadow">
                <div class="modal-header">
                    <h5 class="modal-title">Documentos do Edital</h5>
                    <button class="close" data-dismiss="modal">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Leia atentamente os documentos aqui listados para obter maiores informações sobre o edital.</p>
                    <ol>
                        <li>
                            <a href="<?= base_url("Edital.pdf"); ?>" target="_blank" rel="noopener noreferrer">1º Edital de Publicação de Jogo - Ligadas na Meeple</a>
                        </li>
                        <li>
                            <a href="<?= base_url("Anexo.pdf"); ?>" target="_blank" rel="noopener noreferrer">Anexos ao Edital de Publicação de Jogo - Ligadas na Meeple</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    
    <div class="loader">
        <div class="spinner"></div>
    </div>
    
    <header>
        <div class="container-fluid py-3 bg-black shadow">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-6 text-center">
                        <div class="d-none d-md-block">
                            <img data-src="assets/img/meeple-logo.png" alt="" class="img-fluid lazy mr-3" data-aos="fade-in">
                            <img data-src="assets/img/lbmt-logo.png" alt="" class="img-fluid lazy" data-aos="fade-in">
                        </div>
                        <div class="d-block d-md-none">
                            <img data-src="assets/img/meeple-logo-mobile.png" alt="" class="img-fluid lazy mr-3" data-aos="fade-in">
                            <img data-src="assets/img/lbmt-logo-mobile.png" alt="" class="img-fluid lazy" data-aos="fade-in">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="container-fluid bg-image px-0 lazy shadow py-5" data-bg="<?= base_url("assets/img/bg6.png") ?>">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-6 col-md-5 px-md-5">
                    <h1 class="text-uppercase font-weight-light text-primary banner-title title-purple" data-aos="fade-right">
                        <small>Edital</small><br>
                        <span class="font-weight-bold">Ligadas na Meeple</span>
                    </h1>
                </div>
                <div class="col-6 offset-md-1 px-0" data-aos="fade-left">
                    <img data-src="assets/img/cards.png" alt="" class="img-fluid lazy">
                </div>
            </div>
        </div>
    </section>

    <section class="container-fluid py-5 bg-image lazy" data-bg="<?= base_url("assets/img/bg4.png") ?>">
        <div class="container">
            <div class="row align-items-center py-5">
                <div class="col-12 col-md-6 text-center px-md-5" data-aos="fade-left">
                    <div class="bg-success p-2">
                        <div class="embed-responsive embed-responsive-4by3 bg-black">
                            <video data-src="assets/videos/teaser.mp4" class="lazy embed-responsive-item" controls></video>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 text-light" data-aos="fade-right">
                    <h4 class="font-weight-bold text-success title-green mb-4">O Edital Ligadas na Meeple é a oportunidade que você estava esperando para pôr sua ideia na mesa!</h4>
                    <p>Essa iniciativa inédita da parceria entre a Liga Brasileira de Mulheres Tabuleiristas e a MeepleBR, preparada exclusivamente para as mulheres de todo o Brasil, vai selecionar jogos de cartas para publicação!</p>
                </div>
            </div>
        </div>
    </section>

    <section class="container-fluid py-5 bg-image lazy" data-bg="<?= base_url("assets/img/bg8.png") ?>">
        <div class="container">
            <div class="row align-items-center py-5">
                <div class="col-12 col-md-6" data-aos="fade-right">
                    <h4 class="font-weight-bold text-success mb-4"><span class="title-green">O Edital</span></h4>
                    <p>O 1º Edital de Publicação de Jogo Ligadas na Meeple é destinado à publicação de 1 jogo de cartas inédito, de autoria exclusivamente feminina.</p>
                    <p>Trata-se de uma iniciativa pioneira no Brasil, proposta pela Liga Brasileira de Mulheres Tabuleiristas, para promover e reconhecer a participação autônoma de mulheres no protagonismo do mercado criativo de jogos de mesa (tabuleiro, RPG e cartas), fomentando o trabalho de designers e desenvolvedoras, bem como de artistas ilustradoras, com ou sem experiência, de todo o país.</p>
                    <p>Acolhida pela editora MeepleBR, essa ideia conta com a sua participação e divulgação para alcançar a maior pluralidade de mulheres interessadas pelo universo dos jogos ao redor do Brasil.</p>
                    <h4 class="font-weight-bold">Inscrições Encerradas</h4>
                    <button class="btn btn-success px-4 shadow" data-toggle="modal" data-target="#documents-modal">Ver o edital completo</button>
                </div>
                <div class="col-12 col-md-6 text-center px-md-5" data-aos="fade-left">
                    <img data-src="assets/img/featured-image.png" alt="" class="img-fluid lazy">
                </div>
            </div>
        </div>
    </section>

    <section class="container-fluid py-5 bg-image lazy" data-bg="<?= base_url("assets/img/bg7.png") ?>">
        <div class="container">
            <div class="row pt-5 mb-4">
                <div class="col-12" data-aos="fade-down">
                    <h4 class="font-weight-bold text-success text-center mb-4"><span class="title-green">Perguntas Frequentes</span></h4>
                    <p class="text-light text-center">Está com alguma dúvida sobre o funcionamento do edital? Não se preocupe! Veja aqui as respostas para as perguntas mais frequentes.</p>
                </div>
            </div>
            <div class="row pb-5">
                <div class="col-12 col-md-6" data-aos="fade-right">
                    <div class="accordion shadow" id="accordionfaq-1">
                        <?= $this->load->view("faq1", [], true); ?>
                    </div>
                </div>
                <div class="col-12 col-md-6" data-aos="fade-left">
                    <div class="accordion shadow" id="accordionfaq-2">
                        <?= $this->load->view("faq2", [], true); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <section class="container-fluid py-5 bg-image lazy" data-bg="<?= base_url("assets/img/bg9.jpg") ?>">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <h4 class="font-weight-bold text-primary text-center mb-4" data-aos="fade-up"><span class="title-purple">Inscreva seu projeto!</span></h4>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-8" data-aos="zoom-in">
                    <?= $this->load->view("submit-form", [], true); ?>
                </div>
            </div>
        </div>
    </section> -->

    <section class="container-fluid py-5 bg-image lazy" data-bg="<?= base_url("assets/img/bg5.png") ?>">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <h4 class="font-weight-bold text-success text-center mb-2" data-aos="fade-up"><span class="title-green">Novidades</span></h4>
                </div>
            </div>
            <div class="row row-eq-height mb-4" id="news-container">
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <a href="http://meeplebr.com/blog-meeple/" target="_blank" rel="noopener noreferrer" class="btn btn-success shadow"><i class="fas fa-plus"></i> Ver Mais</a>
                </div>
            </div>
        </div>
    </section>

    <section class="container-fluid py-5 bg-image lazy" data-bg="<?= base_url("assets/img/bg3.jpg") ?>">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12" data-aos="fade-down">
                    <h4 class="font-weight-bold text-success text-center mb-2" data-aos="fade-up"><span class="title-green">Fale Conosco</span></h4>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-8" data-aos="zoom-out">
                    <p class="text-light text-center">Caso tenha ficado com alguma dúvida, preencha o formulário abaixo para nos enviar uma mensagem. Responderemos o mais breve possível!</p>
                    <?= $this->load->view("contact-form", [], true); ?>
                </div>
            </div>
        </div>
    </section>

    <footer class="container-fluid py-3 bg-black">
        <div class="container">
            <div class="row pb-2 border-bottom border-light mb-2">
                <div class="col-12 col-md-6 mb-3 mb-md-0 text-center">
                    <p class="text-center text-light text-uppercase small">Realização</p>
                    <img data-src="assets/img/meeple-logo.png" alt="" class="img-fluid lazy mr-3">
                    <img data-src="assets/img/lbmt-logo.png" alt="" class="img-fluid lazy">
                </div>
                <div class="col-12 col-md-6">
                    <p class="text-center text-light text-uppercase small">Siga nossas redes sociais</p>
                    <ul class="list-inline text-center">
                        <li class="list-inline-item">
                            <a href="https://www.facebook.com/meeplebrjogos" target="_blank" class="btn btn-outline-light btn-sm rounded-pill"><i class="fab fa-facebook-f fa-fw"></i> /meeplebrjogos</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.instagram.com/meeplebr/" target="_blank" class="btn btn-outline-light btn-sm rounded-pill"><i class="fab fa-instagram fa-fw"></i> @meeplebr</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.youtube.com/channel/UCmD2CleeK4otiphSMDBn8kw/feed" target="_blank" class="btn btn-outline-light btn-sm rounded-pill"><i class="fab fa-youtube fa-fw"></i> Meeple BR Jogos</a>
                        </li>
                    </ul>
                    <ul class="list-inline text-center">
                        <li class="list-inline-item">
                            <a href="https://www.facebook.com/mulherestabuleiristas/" target="_blank" class="btn btn-outline-light btn-sm rounded-pill"><i class="fab fa-facebook-f fa-fw"></i> /mulherestabuleiristas</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.instagram.com/mulherestabuleiristas/" target="_blank" class="btn btn-outline-light btn-sm rounded-pill"><i class="fab fa-instagram fa-fw"></i> @mulherestabuleiristas</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <small class="text-light text-uppercase">
                        &copy; <?= date("Y"); ?> MeepleBR. Todos os direitos reservados.
                    </small>
                </div>
            </div>
        </div>
    </footer>
    
    <script type="text/javascript" src="<?= base_url("assets/js/jquery-3.5.1.min.js"); ?>"></script>
    <script type="text/javascript" src="<?= base_url("assets/js/aos.js"); ?>"></script>
    <script type="text/javascript" src="<?= base_url("assets/js/bootstrap.bundle.js"); ?>"></script>
    <script type="text/javascript" src="<?= base_url("assets/js/jq-vertical-dot-nav.js"); ?>"></script>
    <script type="text/javascript" src="<?= base_url("assets/js/jquery.sticky.js"); ?>"></script>
    <script type="text/javascript" src="<?= base_url("assets/js/lazyload.min.js"); ?>"></script>
    <script type="text/javascript" src="<?= base_url("assets/js/slick.min.js"); ?>"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script type="text/javascript" src="<?= base_url("assets/js/script.js?v=202103041553"); ?>"></script>

    <?= $this->load->view("notification", [], true); ?>
</body>
</html>

