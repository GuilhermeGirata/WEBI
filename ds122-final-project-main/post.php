<?php
    require "authenticate.php";
    require "db_functions.php";
    $conn = connect_db();
    $id = $_GET['id'];

    $sql = "SELECT DATE_FORMAT(data_post, '%d/%m/%Y') AS data_post, id_post, fk_usuario, titulo, texto, ativo FROM tb_posts WHERE id_post = $id";
    $post = mysqli_query($conn, $sql);

    foreach($post as $conn){
        $titulo = $conn['titulo'];
        $fk_usuario = $conn['fk_usuario'];
        $data_post = $conn['data_post'];
        $texto = $conn['texto'];
        $ativo = $conn['ativo'];
    }

    if (!$post) {
    die("Error: " . $sql . "<br>" . mysqli_error($conn));
    }

    $conn2 = connect_db();

    $sql = "SELECT * FROM tb_usuarios WHERE id_usuario = $fk_usuario";
    $perfil = mysqli_query($conn2, $sql);

    foreach($perfil as $conn2){
        $reg_date = $conn2['reg_date'];
        $id_usuario = $conn2['id_usuario'];
        $nome_usuario = $conn2['nome_usuario'];
        $email_usuario = $conn2['email_usuario'];
        $nome_completo_usuario = $conn2['nome_completo_usuario'];
    }

    if (!$perfil) {
    die("Error: " . $sql . "<br>" . mysqli_error($conn2));
    }

    $conn3 = connect_db();

    $error = false;
    $success = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["desarquivar"])) {
                            
        $sql = "UPDATE tb_posts SET ativo = 1 WHERE id_post = $id";
        $recuperar = mysqli_query($conn3, $sql); 

            if(mysqli_query($conn3, $sql)){
                $success = true;
                echo"
                <script>
                    alert('Post recuperado com sucesso!');
                    window.location.href='perfil.php?id=$id_usuario#meus_posts';
                </script>
                ";
            }
            else {
                $error_msg = mysqli_error($conn3);
                $error = true;
            }
        }
        if(!$login || $fk_usuario != $user_id){
            die("Você não tem permissão para acessar essa página.");
        }

        if (!$recuperar) {
        die("Error: " . $sql . "<br>" . mysqli_error($conn3));
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?= $titulo ?></title>
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
        <header class="masthead" style="background-image: url('assets/img/post1-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="post-heading">
                            <h1><?= $titulo ?></h1>
                            <span class="meta">
                                Postado por
                                <a href='perfil.php?id=<?=$id_usuario?>'><?= $nome_usuario ?></a>
                                em <?= $data_post ?>
                            </span><br>
                            <?php
                            if(!$login){
                                echo "";
                                }
                                elseif($fk_usuario == $user_id and $ativo == 1){
                                    echo 
                                        "<div>
                                            <a type='button' href='edit_post.php?id=$id' class='btn btn-primary btn-block mb-3'>Editar</a>
                                            <a type='button' href='archive_post.php?id=$id' class='btn btn-warning btn-block mb-3'>Arquivar</a>
                                        </div>";
                                }
                                elseif($ativo == 0){
                                    echo 
                                        "<form method='post'>
                                            <button name='desarquivar' type='submit' class='btn btn-secondary btn-block mb-3'>Recuperar</button>
                                            <a name='deletar' type='button' href='delete_post.php?id=$id' class='btn btn-danger btn-block mb-3'>Deletar</a>
                                        </form>";
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Post Content-->
        <article class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <p><?= $texto ?></p>
                    </div>
                </div>
            </div>
        </article>
        <?php require "footer.php";?>
    </body>
</html>
