<?php
  require_once "authenticate.php";
?>

<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="index.php">BLOG LEGAL</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php">Página inicial</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="about.php#about">Sobre</a></li>
                        <?php if ($login): ?>
                            <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="new_post.php">Novo post</a></li>
                            <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="perfil.php?id=<?=$user_id?>#meus_posts">Meus posts</a></li>
                            <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="perfil.php?id=<?=$user_id?>">Perfil</a></li>
                            <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="logout.php">Sair</a></li>
                        <?php else: ?>
                            <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="login.php">Login</a></li>
                            <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="register.php">Registrar-se</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
        