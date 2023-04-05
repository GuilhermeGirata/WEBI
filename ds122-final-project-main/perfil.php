<?php
    require "authenticate.php";
    require "db_functions.php";
    $conn = connect_db();
    $id = $_GET['id'];

    $sql = "SELECT * FROM tb_usuarios
    WHERE id_usuario = $id";
    $perfil = mysqli_query($conn, $sql);

    foreach($perfil as $conn){
        $reg_date = $conn['reg_date'];
        $id_usuario = $conn['id_usuario'];
        $nome_usuario = $conn['nome_usuario'];
        $email_usuario = $conn['email_usuario'];
        $nome_completo_usuario = $conn['nome_completo_usuario'];
    }

    if (!$perfil) {
    die("Error: " . $sql . "<br>" . mysqli_error($conn));
    }

    $conn2 = connect_db();
    
    $sql = "SELECT * FROM tb_posts WHERE fk_usuario = $id AND ativo=1";
    $posts = mysqli_query($conn2, $sql);

    if (!$posts) {
    die("Error: " . $sql . "<br>" . mysqli_error($conn2));
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Perfil - <?= $nome_usuario ?></title>
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
        <header class="masthead" style="background-image: url('assets/img/about1-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1><?= $nome_usuario ?></h1><hr class="my-4"/>
                            <span class="subheading"><?= $nome_completo_usuario ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7"><br><br>
                <div class="row mb-4">
                    <div class="col">
                        <h2>Membro desde:</h2>
                        <hr class="my-2"/>
                        <p><?= $reg_date ?></p>
                    </div>

                    <div class="col">
                        <h2>E-mail:</h2>
                        <hr class="my-2"/>
                        <p><?= $email_usuario ?></p><br>
                    </div> 
                </div>
                <hr class="my-4"/>
                <div class="row mb-4">
                    <div class="col">
                    <h1>Posts:</h1>
                    </div>
                    <?php
                        if(!$login){
                            echo "";
                        }
                        elseif($id == $user_id){
                            echo 
                            "<div class='col'>
                                <a href='restore_posts.php?id=$id' type='button' class='btn-sm btn-primary btn-block mb-3'>Recuperar Posts</a>
                                <a href='new_post.php' type='button' class='btn-sm btn-primary btn-block mb-3'>Novo Post</a>
                            </div> ";
                        }
                    ?>
                </div>
                <hr class="my-4"/>
                <div class="post-preview" id="meus_posts">
                    <?php if (mysqli_num_rows($posts) > 0): ?>
                        <?php while($post = mysqli_fetch_assoc($posts)): ?>
                            <a href="post.php?id=<?=$post['id_post']?>">
                                <p class="post-title"><?= $post['titulo'] ?></p>
                            </a>
                            <p class="post-meta">
                                Postado em <?= $post['data_post'] ?>
                            </p>
                            <hr class="my-4"/>
                            <?php endWhile; ?>
                        <?php endIF; ?><br>
                        </div>
                    </div>
                </div>
            </div>
        <?php require "footer.php";?>
    </body>
</html>