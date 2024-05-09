<?= $this->extend('template/main') ?>
<?= $this->section('content') ?>
<div class="container" id="login-container">
    <div class="row justify-content-center align-items-center">
        <div class="col-lg-12 col-sm-12 col-md-12 " id="login">
            <h1>LOGIN</h1>
            <form>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn">login</button>
            </form>
            <a href="/signUp" class="button mt-2"><i class="fa-solid fa-user-plus"></i> Sign-In if you don't have an
                account !
            </a>
        </div>
    </div>
</div>

<?= $this->endSection('content') ?>