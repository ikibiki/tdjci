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
            <h2>Users</h2>
            <hr/>
            <div class="col"></div>
            <?= form_open('process/updateuser') ?>
            <?php
            echo form_hidden(array('redir' => 'users'));
            if (isset($edit)) {
                echo form_hidden(array('id' => $edit->id));
            }
            ?>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label class="control-label">First name</label>
                        <input type="text" class="form-control" name="firstname" placeholder="First name"
                            <?php echo ' value="' . (isset($edit) ? $edit->firstname : '') . '"'; ?>
                               required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label class="control-label">Last name</label>
                        <input type="text" class="form-control" name="lastname" placeholder="Last name"
                            <?php echo ' value="' . (isset($edit) ? $edit->lastname : '') . '"'; ?>
                               required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label class="control-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email"
                            <?php echo ' value="' . (isset($edit) ? $edit->email : '') . '"'; ?>
                               required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label class="control-label">Mobile phone</label>
                        <input type="tel" class="form-control" name="mobilephone" placeholder="Mobile phone"
                            <?php echo ' value="' . (isset($edit) ? $edit->mobilephone : '') . '"'; ?>
                               required>
                    </div>
                </div>

            </div>
            <?php

            if (!isset($edit)) {
                ?>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label class="control-label">User name</label>
                            <input type="text" class="form-control" name="username" placeholder="Username"
                                   required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label class="control-label">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password"
                                   required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">

                        <div class="form-group">
                            <label class="control-label">Roles</label>
                            <select name="role" class="form-control" required>
                                <option selected>Select a user role</option>
                                <option value="2"><?= ROLE[2] ?></option>
                                <option value="3"><?= ROLE[3] ?></option>
                                <option value="4"><?= ROLE[4] ?></option>
                            </select>
                        </div>
                    </div>

                </div>
                <?php
            }
            if (isset($edit)) {
                ?>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label class="control-label">User name</label>
                            <input type="text" class="form-control" name="username" placeholder="Role"
                                <?php echo ' value="' . (isset($edit) ? $edit->username : '') . '"'; ?>
                                   readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label class="control-label">Role</label>
                            <input type="text" class="form-control" name="role" placeholder=""
                                <?php echo ' value="' . (isset($edit) ? ROLE[$edit->role] : '') . '"'; ?>
                                   readonly>
                        </div>
                    </div>
                </div>
                <?php
                echo "<a class='btn btn-success btn-block' href='" . site_url('users') . "'><span class='fa fa-plus-circle'></span> New user</a>";
            }

            ?>

            <button class="btn btn-primary btn-block" type="submit"><span class="fa fa-save"> Save changes</span>
            </button>
            <?= form_close() ?>
            <hr/>
            <?= $userstable ?>
        </div>
    </div>
</div>
<script>
    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="popover"]').popover();

</script>
</body>
</html>