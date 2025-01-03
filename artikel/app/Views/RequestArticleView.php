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
            Request article need several steps for the better article. Please fill correctly and clearly. Your article
            is your story. Thank you...
        </p>
    </div>
</div>
<div class="container" id="formRequest">
    <form action="/creator/request_article" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <div class="textContent row bg-body-tertiary p-4">
            <p><i class="fa-solid fa-pencil"></i> Fill your content </p>
            <div class="col-lg-6 col-sm-12 col-md-4">
                <label for="inputTitle" class="form-label">Title</label>
                <input name="title" type="text" class="form-control" id="inputTitle" value="<?php echo old('title') ?>"
                    required>
                <?php if (session()->has('validation') && isset(session('validation')['title'])): ?>
                    <div class="invalid-feedback">
                        <?php echo session('validation')['title']; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-6 col-sm-12 col-md-4">
                <label for="inputSlug class=" form-label">Slug</label>
                <input value="<?php echo old('slug') ?>" name="slug" type="text" class="form-control bg-secondary"
                    id="inputSlug" readonly placeholder="readonly" required>
            </div>
            <div class="col-lg-12 col-sm-12 col-md-12">
                <label for="inputContents" class="form-label">Your Article</label>
                <textarea name="contents" type="text" class="form-control" id="inputContents" rows="4"
                    value="<?php echo old('contents') ?>" required></textarea>
                <?php if (session()->has('validation') && isset(session('validation')['contents'])): ?>
                    <div class="invalid-feedback" style="display: block;">
                        <?php echo session('validation')['contents']; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-12 col-sm-12 col-md-12">
                <label for="inputQuotes" class="form-label">Quotes</label>
                <textarea name="quotes" type="text" class="form-control" id="inputQuotes" rows="2"
                    value="<?php echo old('quote') ?>"></textarea>
            </div>
        </div>
        <div class="urls row g-1">
            <p><i class="fa-solid fa-globe"></i> Fill the related information on other resource (url) </p>
            <div class="col-lg-3 col-md-6-col-sm-12">
                <input name="linkYoutube" class="form-control" type="text" placeholder="youtube"
                    aria-label="default input example" value="<?php echo old('linkYoutube') ?>">
            </div>
            <div class="col-lg-3 col-md-6-col-sm-12">
                <input name="linkInstagram" class="form-control" type="text" placeholder="instagram"
                    aria-label="default input example" value="<?php echo old('linkInstagram') ?>">
            </div>
            <div class="col-lg-3 col-md-6-col-sm-12">
                <input name="linkWebsite" class="form-control" type="text" placeholder="website"
                    aria-label="default input example" value="<?php echo old('linkWebsite') ?>">
            </div>
            <div class="col-lg-3 col-md-6-col-sm-12">
                <input name="othersLink" class="form-control" type="text" placeholder="other resource"
                    aria-label="default input example" value="<?php echo old('otherSource') ?>">
            </div>
        </div>
        <div class="row source mt-2 bg-body-tertiary p-4">
            <p><i class="fa-solid fa-book"></i> Please put from where your article resource
            </p>
            <div class="col-lg-12 col-sm-12 col-md-12">
                <label for="inputResourceArticle" class="form-label">Dictionary</label>
                <textarea value="<?php echo old('dictionary') ?>" name="resource_article" type="text"
                    class="form-control" id="inputResourceArticle`" rows="4">
                &lt;li class="list-group-item"&gt;FILL THE URL SOURCE   OR ANOTHER INFORMATION !.&lt;/li&gt;
                </textarea>

            </div>
        </div>
        <div class="imgs row g-1">
            <p><i class="fa-solid fa-image"></i> Attach image for your Article. </p>
            <div class="col-lg-3 col-md-6-col-sm-12">
                <label for="main_img" class="form-label">Main image</label>
                <input name="main_img" class="form-control" type="file" id="main_img">
                <?php if (session()->has('validation') && isset(session('validation')['main_img'])): ?>
                    <div class="invalid-feedback" style="display: block;">
                        <?php echo session('validation')['main_img']; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-3 col-md-6-col-sm-12">
                <label for="img1" class="form-label">Second image</label>
                <input name="img1" class="form-control" type="file" id="img1">
            </div>
            <div class="col-lg-3 col-md-6-col-sm-12">
                <label for="img2" class="form-label">Third image</label>
                <input name="img2" class="form-control" type="file" id="img2">
            </div>
            <div class="col-lg-3 col-md-6-col-sm-12">
                <label for="img3" class="form-label">Fourth image</label>
                <input name="img3" class="form-control" type="file" id="img3">
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