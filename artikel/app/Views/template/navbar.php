<nav class="navbar navbar-expand-lg fixed-top" id="navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="/"> <img src="<?php echo base_url('/img/icons/MyLogo.png'); ?>" alt=""
                srcset=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item text-nav  <?php echo ($titleWeb == 'Home | Artikel') ? 'active' : ''; ?>">
                    <a class="nav-link" href="#">HOME</Article></a>
                </li>
                <li class="nav-item text-nav  <?php echo ($titleWeb == 'Write Article') ? 'active' : ''; ?>">
                    <a class="nav-link" href="creator/create_artikel">REQUEST ARTICLE</Article></a>
                </li>
            </ul>
            <?php if ($isLoggedIn == true): ?>
                <button class="btn btn-secondary dropdown-toggle users-icon" type="button" id="dropdownMenuButton2"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-user-pen"><span> </span> </i>
                </button>
                <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end" aria-labelledby="dropdownMenuButton2">
                    <li><a class="dropdown-item active" href="#">Favorite</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="/auth/logOut">Log Out</a></li>
                </ul>
            <?php endif; ?>

        </div>
    </div>
</nav>