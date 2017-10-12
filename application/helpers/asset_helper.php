<?php

defined('BASEPATH') OR exit('No direct script access allowed');

function echoStyles()
{
    $css = array(
        "//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css",
        "//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css",

        "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css",
        "https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.0.0-alpha.6/journal/bootstrap.min.css",

        "//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css",
        "//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css",
        "//cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css",
    );
    foreach ($css as $elem) {
        echo "<link rel='stylesheet' href='$elem'/>";
    }
}

function echoScripts()
{
    $js = array(
        "//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js",
        "//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.js",
        "//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js",
        "//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js",

        "https://code.jquery.com/jquery-3.2.1.slim.min.js",
        "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js",
        "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js",

        "//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.5/jquery.lazy.min.js",
        "//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.5/jquery.lazy.plugins.min.js",
    );

    foreach ($js as $elem) {
        echo "<script src='$elem'></script>";
    }
}

function echoBsCalendar()
{
    echo "<link rel='stylesheet' href='//cdnjs.cloudflare.com/ajax/libs/bootstrap-year-calendar/1.1.1/css/bootstrap-year-calendar.min.css'/>";
    echo "<script src='//cdnjs.cloudflare.com/ajax/libs/bootstrap-year-calendar/1.1.1/js/bootstrap-year-calendar.min.js'></script>";
}


function echoC3js()
{
    echo "<link rel='stylesheet' href='//cdnjs.cloudflare.com/ajax/libs/c3/0.4.15/c3.min.css'/>";
    echo "<script src='//cdnjs.cloudflare.com/ajax/libs/d3/3.5.17/d3.min.js' charset='utf-8'></script>";
    echo "<script src='//cdnjs.cloudflare.com/ajax/libs/c3/0.4.15/c3.min.js'></script>";
}

function echoSwal2()
{
    echo "<script src='//cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.min.js'></script>";
    echo "<link rel='stylesheet' href='//cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.min.css'/>";
}
