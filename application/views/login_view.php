<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if (!isset($redir)) {
    $redir = '';
}
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
        @import url('https://fonts.googleapis.com/css?family=Cinzel');

        .login-form {
            max-width: 480px;
        }

        .logo {
            font-family: 'Cinzel', serif;
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
    <p>&nbsp;</p>
    <div class="jumbotron">
        <h1>sample</h1>
    </div>
    <div class="text-center">
        <button id="btnloginshow" type="button" class="btn btn-primary btn-lg" data-loading-text="Please wait...">
            Login
        </button>
        <button id="btnregshow" type="button" class="btn btn-default btn-lg">Register</button>
        <a href="<?php echo base_url('');?>" class="btn btn-default btn-lg">Home</a>
    </div>
    <p>&nbsp;</p>
    <footer class="text-center">
        <p>&copy; <?php echo date('Y'); ?> <?php echo WEBSITE_TITLE; ?></p>
    </footer>
</div>

<div id="mblogin" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">

        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span
                            class="fa fa-times fa-fw fa-lg"></span></button>
                <div class="login-form mx-auto">
                    <br/>
                    <h1 class="text-center logo"><?= WEBSITE_TITLE ?></h1>
                    <br/>
                    <?php
                    echo form_open('login/process', 'id=frmlogin');
                    ?>
                    <input type="hidden" name="redir" value="<?= $redir; ?>">
                    <div class="form-group">
                        <label class="control-label">Username</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-user fa-fw fa-lg"></i></div>
                            <input type="text" class="form-control" name="username" placeholder="Username"
                                   tabindex="1" required>
                            <span></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Password</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-asterisk fa-fw fa-lg"></i></div>
                            <input type="password" class="form-control" name="password" placeholder="Password"
                                   tabindex="2" required>
                            <span></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <!--<div align="center" class="g-recaptcha" data-sitekey="6LfO6CgUAAAAAMzWFzSVbuAVMVZ7qVsjEHzfcci-"
                             data-theme="light" data-size="normal"></div>-->
                    </div>
                    <div class="form-group">
                        <button id="btnlogin" type="button" class="btn btn-primary btn-block"
                                data-loading-text="Logging in..." tabindex="3">Continue
                        </button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="mbreg" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">

        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Registration</h4>
            </div>

            <div class="modal-body">
                Hello hello
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<script>
    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="popover"]').popover();

    $('#btnloginshow').on('click', function () {
        $(this).button('loading');
        $('#mblogin').modal('show');
    });

    $('#mblogin').on('shown.bs.modal', function (event) {
        $('#btnloginshow').button('reset');
    });

    $('#btnregshow').on('click', function () {
        $('#mbreg').modal('show');
    });

    $('#btnlogin').on('click', function () {
        var btn = $(this).button('loading');
        setTimeout(
            function () {
                $('#frmlogin').submit();
            }, 100);
        btn.reset();
    });
</script>
</body>
</html>