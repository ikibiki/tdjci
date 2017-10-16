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
    echoTimepicker();
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
            <h2>Availability</h2>
            <hr/>
            <?= form_open('process/updateblock') ?>
            <?php
            echo form_hidden(array('redir' => 'block'));
            if (isset($edit)) {
                echo form_hidden(array('id' => $edit->id));
            }
            ?>
            <div class="row" id="dp">
                <div class="col">
                    <div class="form-group">
                        <label class="control-label">Start date</label>
                        <input type="text" class="form-control date" name="startdate" placeholder="Start date" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label class="control-label">Start time</label>
                        <input type="text" class="form-control time" name="startdate" placeholder="Start time" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label class="control-label">End time</label>
                        <input type="text" class="form-control time" name="startdate" placeholder="End time" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label class="control-label">End date</label>
                        <input type="text" class="form-control date" name="startdate" placeholder="End date" required>
                    </div>
                </div>
            </div>

            <button class="btn btn-primary btn-block" type="submit"><span class="fa fa-save"> Save changes</span>
            </button>
            <?= form_close() ?>
            <hr/>
            <?= $blockstable ?>
        </div>
    </div>
</div>
<script>
    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="popover"]').popover();


    $('#dp .time').timepicker({
        'showDuration': true,
        'timeFormat': 'h:mm a'
    });

    $('#dp .date').datepicker({
        'format': 'm/d/yyyy',
        'autoclose': true
    });

    // initialize datepair
    $('#jqueryExample').datepair();
</script>
</body>
</html>