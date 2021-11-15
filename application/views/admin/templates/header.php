<!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?= base_url('properties/admin/') ?>assets/vendor/bootstrap/css/bootstrap.min.css">
        <link href="<?= base_url('properties/admin/') ?>assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
        <link rel="stylesheet" href="<?= base_url('properties/admin/') ?>assets/libs/css/style.css">
        <link rel="stylesheet" href="<?= base_url('properties/admin/') ?>assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
        <link rel="stylesheet" href="<?= base_url('properties/admin/') ?>assets/vendor/charts/chartist-bundle/chartist.css">
        <link rel="stylesheet" href="<?= base_url('properties/admin/') ?>assets/vendor/charts/morris-bundle/morris.css">
        <link rel="stylesheet" href="<?= base_url('properties/admin/') ?>assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="<?= base_url('properties/admin/') ?>assets/vendor/charts/c3charts/c3.css">
        <link rel="stylesheet" href="<?= base_url('properties/admin/') ?>assets/vendor/fonts/flag-icon-css/flag-icon.min.css">

        <link rel="stylesheet" type="text/css" href="<?= base_url('properties/admin/') ?>/assets/vendor/datatables/css/dataTables.bootstrap4.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url('properties/admin/') ?>/assets/vendor/datatables/css/buttons.bootstrap4.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url('properties/admin/') ?>/assets/vendor/datatables/css/select.bootstrap4.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url('properties/admin/') ?>/assets/vendor/datatables/css/fixedHeader.bootstrap4.css">

        <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
        <title>Admin Page</title>

        <script>
        // Add restrictions
        Dropzone.options.fileupload = {
            acceptedFiles: 'image/*',
            maxFilesize: 5 // MB,
        };
    </script>

    <script type="text/javascript" src="<?= base_url("properties/admin/js/session_activity.js") ?>"></script>
</head>