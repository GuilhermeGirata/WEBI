<?php
    require "authenticate.php";
    require "db_functions.php";
    $conn = connect_db();

    $sql = "SELECT tb_posts.data_post, tb_posts.id_post, tb_posts.fk_usuario, tb_posts.titulo, tb_posts.texto, tb_usuarios.id_usuario, tb_usuarios.nome_usuario FROM tb_posts, tb_usuarios
    WHERE tb_posts.fk_usuario = tb_usuarios.id_usuario AND ativo=1";
    $posts = mysqli_query($conn, $sql);

    if (!$posts) {
    die("Error: " . $sql . "<br>" . mysqli_error($conn));
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Blog Legal - Página Inicial</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <?php require "menu_superior.php";?>
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('assets/img/home1-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>BLOG LEGAL</h1>
                            <span class="subheading">Desenvolvimento Web I</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <!-- Post preview-->
                    <div class="post-preview">
                        <?php if (mysqli_num_rows($posts) > 0): ?>
                            <?php while($post = mysqli_fetch_assoc($posts)): ?>
                                <a href="post.php?id=<?=$post['id_post']?>">
                                    <h2 class="post-title"><?= $post['titulo'] ?></h2>
                                </a>
                                <p class="post-meta">
                                    Postado por
                                    <a href="perfil.php?id=<?= $post['fk_usuario'] ?>"><?=$post['nome_usuario']?></a>
                                    em <?= $post['data_post'] ?>
                                </p>
                                <hr class="my-4"/>
                            <?php endWhile; ?>
                        <?php else: ?>
                            <p class="post-meta">
                                <center>Nenhum post por enquanto</center>
                            </p>
                        <?php endIF; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php require "footer.php";?>
    </body>
</html>