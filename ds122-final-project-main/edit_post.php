<?php
  require "authenticate.php";
  require "db_functions.php";
  
  $conn = connect_db();
  $id = $_GET['id'];

  $sql = "SELECT DATE_FORMAT(data_post, '%d/%m/%Y') AS data_post, id_post, fk_usuario, titulo, texto FROM tb_posts WHERE id_post = $id";
  $posts = mysqli_query($conn, $sql);

  foreach($posts as $conn){
      $titulo = $conn['titulo'];
      $data = $conn['data_post'];
      $texto = $conn['texto'];
      $fk_usuario = $conn['fk_usuario'];
  }

  if(!$login || $fk_usuario != $user_id){
    die("Você não tem permissão para acessar essa página.");
  }

  if (!$posts) {
  die("Error: " . $sql . "<br>" . mysqli_error($conn));
  }

  $conn2 = connect_db();

  $error = false;
  $success = false;
  $title = $text = "";
                    
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["form_title"]) && isset($_POST["form_text"])) {
              
    $title = mysqli_real_escape_string($conn2,$_POST["form_title"]);
    $text = mysqli_real_escape_string($conn2,$_POST["form_text"]);
                            
    $sql = "UPDATE tb_posts SET titulo = '$title', texto = '$text' WHERE id_post = $id";
                            
        if(mysqli_query($conn2, $sql)){
            $success = true;
            echo"
            <script>
                alert('Post alterado com sucesso!');
                window.location.href='post.php?id=$id';
            </script>
            ";
        }
        else {
            $error_msg = mysqli_error($conn2);
            $error = true;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Blog Legal - Editar Post</title>
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
                            <h1>EDITAR POST</h1>
                            <hr class="my-4"/>
                            <h2><?= $titulo ?></h2>
                            Publicado em <?= $data?>
                    
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                <form action="" method="post">
                    <!-- Name input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="title" name="form_title" class="form-control" value="<?= $titulo ?>" />
                        <label class="form-label" for="titulo">Título</label>
                    </div>

                    <!-- Username input -->
                    <div class="form-outline mb-4">
                        <textarea id="texto" name="form_text" class="form-control"><?= $texto ?></textarea>
                        <label class="form-label" for="texto">Texto</label>
                    </div>
                    <?php
                        
                    ?>
                    <!-- Submit button -->
                    <center>
                        <button name="submit" type="submit" class="btn btn-primary btn-block mb-3">Enviar</button>
                    </center>
                    </form>
                </div>
            </div>
        </div>
        <?php require "footer.php";?>
    </body>
</html>
