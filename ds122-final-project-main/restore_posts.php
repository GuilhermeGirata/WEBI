<?php
    require "authenticate.php";
    require "db_functions.php";
    $conn = connect_db();
    $id = $_GET['id'];

    $sql = "SELECT * FROM tb_posts WHERE fk_usuario = $id AND ativo=0";
    $posts = mysqli_query($conn, $sql);

    if (!$posts) {
    die("Error: " . $sql . "<br>" . mysqli_error($conn));
    }

    $conn2 = connect_db();

    $sql = "SELECT * FROM tb_usuarios WHERE id_usuario = $id";
    $usuario = mysqli_query($conn2, $sql);

    foreach($usuario as $conn2){
        $nome_usuario = $conn2['nome_usuario'];
    }

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
        <title>Blog Legal - Recuperar Posts</title>
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
                            <h1>RECUPERAR POSTS</h1>
                            <span class="subheading"><?= $nome_usuario ?></span>
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
                                    Postado em <?= $post['data_post'] ?>
                                </p>
                                <hr class="my-4"/>
                            <?php endWhile; ?>
                        <?php else: ?>
                            <p class="post-meta">
                                <center>Nenhum post para ser recuperado</center>
                            </p>
                        <?php endIF; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php require "footer.php";?>
    </body>
</html>