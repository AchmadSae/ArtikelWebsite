<?= $this->extend('template/main') ?>
<?= $this->section('content') ?>

<?= $this->include('template/navbar') ?>
<?php foreach ($dataArtikel as $key): ?>
    <section id="main">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 box-title">
                <h2 class="title">
                    <?= $key['title']; ?>
                </h2>
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12">
                <p class="hot-text">
                    <?= substr($key['contents'], 0, 300) . '...' ?>
                </p>
            </div>
        </div>
    </section>
    <section id="picture">
        <div class="row box">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <img src=" <?= base_url($key['img1']); ?> " alt="" srcset="" class="img1">
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <img src=" <?= base_url($key['main_img']); ?> " alt="" srcset="" class="main-img"
                    data-main-img="<?= htmlspecialchars($key['main_img']) ?>">
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <img src=" <?= base_url($key['img3']); ?> " alt="" srcset="" class="img3">
            </div>
        </div>
    </section>
    <section id="submain">
        <div class="row">
            <div class="col-lg-2">
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12">
                <p class="text"><?= substr($key['contents'], 300, 500) . '...' ?></p>

                <figure class="quote">
                    <?= $key['quote']; ?>
                </figure>

                <p class="text"><?= substr($key['contents'], 500) . '...' ?></p>

            </div>
            <div class="col-lg-2">

            </div>
        </div>


    </section>

    <section id="sourceInformation">
        <div class="row">
                <div class="col-lg-6 col-sm-12 col-md-12 d-flex justify-content-center">
                    <div class="biography">
                        <span><i class="fa-solid fa-book"></i> Those Information based on data from : </span>
                        <ul class="list-group list-group-flush">
                        <?= $key['dictionary']; ?>
                        </ul>
                    </div>
                </div>
            <div class="col-lg-6 col-sm-12 col-md-12 related">
                <ul class="horizontal-list">
                    <?= $key['relatedSource']; ?>
                </ul>
            </div>
        </div>
    </section>
<?php endforeach; ?>
<?php
$base_url = base_url();
?>
<section id="artikel-list" class="mt-4">
    <?php foreach ($allArtikel as $key => $data): ?>
        <div class="card">
            <?php $image_url = $base_url . '/' . $data['main_img']; ?>
            <img src="<?= $image_url ?>" class="d-block w-100" alt="...">
            <div class="card-content">
                <h5>
                    <?php echo $data['title']; ?>
                </h5>
                <p>
                <?= substr($data['contents'], 0, 100) . '...' ?>
                </p>

                <a href="#" class="button"><i class="fa-brands fa-readme"> </i>
                    See More !
                </a>
            </div>
        </div>
    <?php endforeach; ?>
</section>

<?= $this->include('template/footer'); ?>
<?= $this->endSection('content') ?>