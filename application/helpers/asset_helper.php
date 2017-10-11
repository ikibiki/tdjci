<?php

defined('BASEPATH') OR exit('No direct script access allowed');

function echoStyles() {
    $css = array(
        "//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css",
        "//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css",
        "//cdnjs.cloudflare.com/ajax/libs/patternfly/3.27.6/css/patternfly.min.css",
        "//cdnjs.cloudflare.com/ajax/libs/patternfly/3.27.6/css/patternfly-additions.min.css",
        "//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css",
        "//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css",
        "//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css",
        "//cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css",
        "//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css",
        "//cdn.datatables.net/v/bs/jszip-3.1.3/pdfmake-0.1.27/dt-1.10.15/af-2.2.0/b-1.3.1/b-colvis-1.3.1/b-flash-1.3.1/b-html5-1.3.1/b-print-1.3.1/cr-1.3.3/fc-3.2.2/fh-3.1.2/kt-2.2.1/r-2.1.1/rg-1.0.0/rr-1.2.0/sc-1.4.2/se-1.2.2/datatables.min.css",
        "//cdnjs.cloudflare.com/ajax/libs/TableExport/4.0.11/css/tableexport.min.css",
    );
    foreach ($css as $elem) {
        echo "<link rel='stylesheet' href='$elem'/>";
    }
}

function echoScripts() {
    $js = array(
        "//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js",
        "//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.js",
        "//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js",
        "//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js",
        "//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js",
        "//cdnjs.cloudflare.com/ajax/libs/patternfly/3.27.6/js/patternfly.min.js",
        "//cdnjs.cloudflare.com/ajax/libs/patternfly/3.27.6/js/patternfly-functions.min.js",
        "//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js",
        "//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js",
        "//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js",
        "//cdn.datatables.net/v/bs/jszip-3.1.3/pdfmake-0.1.27/dt-1.10.15/af-2.2.0/b-1.3.1/b-colvis-1.3.1/b-flash-1.3.1/b-html5-1.3.1/b-print-1.3.1/cr-1.3.3/fc-3.2.2/fh-3.1.2/kt-2.2.1/r-2.1.1/rg-1.0.0/rr-1.2.0/sc-1.4.2/se-1.2.2/datatables.min.js",
        "//cdnjs.cloudflare.com/ajax/libs/xlsx/0.10.7/xlsx.core.min.js",
        "//cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.3/FileSaver.min.js",
        "//cdnjs.cloudflare.com/ajax/libs/TableExport/4.0.11/js/tableexport.min.js",
        "//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.5/jquery.lazy.min.js",
        "//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.5/jquery.lazy.plugins.min.js",
    );

    foreach ($js as $elem) {
        echo "<script src='$elem'></script>";
    }
}

function echoBsTour() {
    echo "<link rel='stylesheet' href='//cdnjs.cloudflare.com/ajax/libs/bootstrap-tour/0.11.0/css/bootstrap-tour.min.css'/>";
    echo "<script src='//cdnjs.cloudflare.com/ajax/libs/bootstrap-tour/0.11.0/js/bootstrap-tour.min.js'></script>";
}

function echoBsCalendar() {
    echo "<link rel='stylesheet' href='//cdnjs.cloudflare.com/ajax/libs/bootstrap-year-calendar/1.1.1/css/bootstrap-year-calendar.min.css'/>";
    echo "<script src='//cdnjs.cloudflare.com/ajax/libs/bootstrap-year-calendar/1.1.1/js/bootstrap-year-calendar.min.js'></script>";
}


function echoC3js() {
    echo "<link rel='stylesheet' href='//cdnjs.cloudflare.com/ajax/libs/c3/0.4.15/c3.min.css'/>";
    echo "<script src='//cdnjs.cloudflare.com/ajax/libs/d3/3.5.17/d3.min.js' charset='utf-8'></script>";
    echo "<script src='//cdnjs.cloudflare.com/ajax/libs/c3/0.4.15/c3.min.js'></script>";
}

function echoSwal2() {
    echo "<script src='//cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.min.js'></script>";
    echo "<link rel='stylesheet' href='//cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.min.css'/>";
}

function echoPhpgrid() {
    $css = array(
        base_url() . "/assets/js/jqgrid/css/ui.jqgrid.bs.css",
        base_url() . "/assets/js/themes/redmond/jquery-ui.custom.css",
    );

    foreach ($css as $elem) {
        echo "<link rel='stylesheet' type='text/css' media='screen' href='$elem'/>";
    }
    $js = array(
        base_url() . "/assets/js/jqgrid/js/i18n/grid.locale-en.js",
        base_url() . "/assets/js/jqgrid/js/jquery.jqGrid.min.js",
    );

    foreach ($js as $elem) {
        echo "<script src='$elem'></script>";
    }
}
