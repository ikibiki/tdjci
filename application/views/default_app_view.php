<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="Cache-control" content="public">

    <meta name="application-name" content="<?= WEBSITE_TITLE ?>"/>
    <meta name="theme-color" content="#000000"/>
    <?php
    echoStyles();
    echoScripts();
    echoSwal2();
    ?>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title><?php echo WEBSITE_TITLE; ?></title>
    <style>
        .container {
            margin-top: 20px;
        }

        a.nav-link:hover {
            background-color: #EB6864;
            color: #FFFFFF;
        }
    </style>
</head>
<body>

<div class="container">
    <?php
    $msg = $this->session->flashdata('msg');
    if ($msg) {
        ?>
        <div class="alert alert-<?php echo $msg['type']; ?> alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            <strong><?= $msg['title'] ?></strong> <?= $msg['text']; ?>
        </div>
        <?php
    }
    ?>
    <div class="row">
        <div class="col-3">
            <?php $this->load->view('nav_template') ?>
        </div>
        <div class="col-9">
            <h2>Home</h2>
            <hr/>
            <?php
            var_dump($this->session->user);
            ?>
        </div>
    </div>
</div>
<script>
    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="popover"]').popover();

</script>
</body>
</html>