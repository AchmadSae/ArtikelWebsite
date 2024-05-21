<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> <?php echo $titleWeb; ?> </title>
    <link rel="icon" href="<?php echo base_url('img/icons/MyLogo.png'); ?>" type="image/png">
    <link rel="stylesheet" href=" <?= base_url('css/bootstrap.min.css'); ?> ">
    <!-- style our css  -->
    <link rel="stylesheet" href="<?= base_url('/css/artikel.css'); ?> ">
    <link rel="stylesheet" href="<?= base_url('/css/navbar.css'); ?> ">
    <link rel="stylesheet" href="<?= base_url('/css/main.css'); ?> ">
    <link rel="stylesheet" href="<?= base_url('/css/footer.css'); ?> ">
    <link rel="stylesheet" href="<?= base_url('/css/requestArtikel.css'); ?> ">
    <link rel="stylesheet" href="<?= base_url('/css/auth.css'); ?> ">


    <link rel="stylesheet" href="<?= base_url('/assets/fontawesome.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('/assets/brands.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('/assets/solid.css'); ?>">



</head>

<body>
    <?= $this->renderSection('content') ?>
    <script>
        // Mendefinisikan base_url di JavaScript
        const base_url = "<?= base_url(); ?>";
    </script>
    <script src=" <?= base_url('js/bootstrap.bundle.min.js'); ?> "></script>
    <script src=" <?= base_url('js/artikel.js'); ?> "></script>
</body>

</html>