<?= $this->extend('template/main') ?>
<?= $this->section('content') ?>

<?= $this->include('template/navbar') ?>
<!-- guest request artikel  need register first-->
<!-- register visitors verified -->
<div class="row" id="title">
    <div class="col-lg-12 col-sm-12 col-md-12">
        <img src=" <?php echo base_url('/img/icons/book.png') ?> " alt="" srcset="">
        <h4>Request Your Story News</h4>
        <p class="text">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique corporis sint neque culpa eos dolorum
            accusamus ducimus modi iure fugit deserunt, accusantium distinctio voluptate quod, quam consequatur quos at
            amet.
        </p>
    </div>
</div>
<div class="container" id="formRequest">
    <form action="" method="post" class="needs-validation" novalidate>
        <div class="textContent row bg-body-tertiary p-4">
            <p><i class="fa-solid fa-pencil"></i> Fill your content </p>
            <div class="col-lg-4 col-sm-12 col-md-4">
                <label for="validationCustom03" class="form-label">Title</label>
                <input type="text" class="form-control" id="validationCustom01" required>
                <div class="invalid-feedback">
                    Please give your artikel title
                </div>
            </div>
            <div class="col-lg-4 col-sm-12 col-md-4">
                <label for="validationCustom02" class="form-label">Slug</label>
                <input type="text" class="form-control bg-secondary" id="validationCustom01" readonly
                    placeholder="readonly" required>
                <div class="invalid-feedback ">
                    Required Slug for Id artikel
                </div>
            </div>
            <div class="col-lg-4 col-sm-12 col-md-4">
                <label for="validationCustom03" class="form-label">Name requester</label>
                <input type="text" class="form-control" id="validationCustom01" required>
                <div class="invalid-feedback ">
                    Looks Good !
                </div>
            </div>
            <div class="col-lg-12 col-sm-12 col-md-12">
                <label for="validationCustom03" class="form-label">Your Artikel</label>
                <textarea type="text" class="form-control" id="validationCustom01" rows="4" required></textarea>
                <div class="invalid-feedback">
                    Please give your artikel title
                </div>
            </div>
        </div>
        <div class="urls row g-1">
            <p><i class="fa-solid fa-globe"></i> Fill the related information on other resource (url) </p>
            <div class="col-lg-3 col-md-6-col-sm-12">
                <input class="form-control" type="text" placeholder="youtube" aria-label="default input example">
            </div>
            <div class="col-lg-3 col-md-6-col-sm-12">
                <input class="form-control" type="text" placeholder="instagram" aria-label="default input example">
            </div>
            <div class="col-lg-3 col-md-6-col-sm-12">
                <input class="form-control" type="text" placeholder="website" aria-label="default input example">
            </div>
            <div class="col-lg-3 col-md-6-col-sm-12">
                <input class="form-control" type="text" placeholder="other resource" aria-label="default input example">
            </div>
        </div>
        <div class="row source mt-2 bg-body-tertiary p-4">
            <p><i class="fa-solid fa-book"></i> Please put from who your artikel resource
            </p>
            <div class="col-lg-12 col-sm-12 col-md-12">
                <label for="validationCustom03" class="form-label">Dictionary</label>
                <textarea type="text" class="form-control" id="validationCustom01" rows="4" required></textarea>
                <div class="invalid-feedback">
                </div>
            </div>
        </div>
        <div class="imgs row g-1">
            <p><i class="fa-solid fa-image"></i> Fill the related information on other resource (url) </p>
            <div class="col-lg-3 col-md-6-col-sm-12">
                <label for="formFile" class="form-label">Main image</label>
                <input class="form-control" type="file" id="formFile">
            </div>
            <div class="col-lg-3 col-md-6-col-sm-12">
                <label for="formFile" class="form-label">Second image</label>
                <input class="form-control" type="file" id="formFile">
            </div>
            <div class="col-lg-3 col-md-6-col-sm-12">
                <label for="formFile" class="form-label">Third image</label>
                <input class="form-control" type="file" id="formFile">
            </div>
            <div class="col-lg-3 col-md-6-col-sm-12">
                <label for="formFile" class="form-label">Fourth image</label>
                <input class="form-control" type="file" id="formFile">
            </div>

        </div>
        <div class="row btn-container">
            <div class="col-lg-12 col-sm-12 col-md-12 text-center p-2">
                <button type="submit" class="btn">Submit</button>
            </div>
        </div>
    </form>
</div>

<!-- section for request  -->



<!-- register visitors verified -->

<?= $this->include('template/footer'); ?>

<?= $this->endSection('content') ?>