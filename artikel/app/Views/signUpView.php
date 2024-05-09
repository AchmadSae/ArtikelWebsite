<?= $this->extend('template/main') ?>
<?= $this->section('content') ?>
<div class="container" id="signUp-container">
    <div class="row justify-content-center align-items-center">
        <div class="col-lg-12 col-sm-12 col-md-12 " id="signUp">
            <h1>SIGN UP</h1>
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
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Name</label>
                    <input type="text" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn">sign in</button>
            </form>
            
        </div>
    </div>
</div>
<?= $this->endSection('content') ?>