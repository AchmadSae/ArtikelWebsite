<?= $this->extend('template/main') ?>
<?= $this->section('content') ?>
<?= $this->include('template/navbar') ?>
<div class="container" id="login-container">
    <div class="row justify-content-center align-items-center">
        <div class="col-lg-12 col-sm-12 col-md-12" id="login">
            <h1>SIGN UP</h1>
            <form action="/auth/register" method="post">
                <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="exampleInputUsername" class="form-label">Username</label>
                    <input type="text" class="form-control" id="exampleInputUsername" aria-describedby="usernameHelp"
                        name="username">
                    <?php if (session()->has('validation') && isset(session('validation')['username'])): ?>
                        <div class="invalid-feedback" style="display: block;">
                            <?php echo session('validation')['username']; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                    <?php if (session()->has('validation') && isset(session('validation')['password'])): ?>
                        <div class="invalid-feedback" style="display: block;">
                            <?php echo session('validation')['password']; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="exampleInputInstagram" class="form-label">Instagram Username</label>
                    <input type="text" class="form-control" id="exampleInputInstagram" aria-describedby="usernameHelp"
                        name="instagram_name">
                    <?php if (session()->has('validation') && isset(session('validation')['instagram_name'])): ?>
                        <div class="invalid-feedback" style="display: block;">
                            <?php echo session('validation')['instagram_name']; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <button type="submit" class="btn">Register</button>
            </form>
            <a href="#" class="button mt-2"><i class="fa-solid fa-user-plus"></i> Sign-In whit your Google
                account!</a>
        </div>
    </div>
</div>

<?= $this->endSection('content') ?>