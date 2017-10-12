<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="nav flex-column nav-pills">
    <a class="nav-link" href="<?= base_url() ?>">Home</a>
    <a class="nav-link" href="<?= site_url('users') ?>">Users</a>
    <a class="nav-link" href="#">Bookings</a>
    <a class="nav-link" href="#">Availability</a>
    <a class="nav-link" href="#">Photo packages</a>
    <a class="nav-link" href="#">My Account</a>
    <a class="nav-link" href="<?= site_url('logout') ?>">Log out</a>
</div>