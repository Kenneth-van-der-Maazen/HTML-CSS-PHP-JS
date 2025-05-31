<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <img src="img/leaf.png" alt="Logo" width="24" height="24">Blog
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">Over ons</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="faq.php">FAQ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="blog.php">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="category.php">Category</a>
                </li>
            </ul>

            <ul class="d-flex navbar-nav">
                <?php if ($logged) { ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" 
                        href="profile.php" 
                        role="button" 
                        data-bs-toggle="dropdown" 
                        aria-expanded="false">
                    <i class="fa fa-user" aria-hidden="true"></i>
                        <?=$_SESSION['username']?>
                    </a>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="profile.php">Profiel</a></li>
                        <li><a class="dropdown-item" href="logout.php">Uitloggen</a></li>
                    </ul>
                </li>

                <?php }else { ?>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Inloggen | Aanmelden</a>
                </li>
                <?php } ?>
                
            </ul>
        </div>
    </div>
</nav>