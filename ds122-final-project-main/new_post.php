<?php
  require "authenticate.php";
  require "sanitize.php";
  require "db_functions.php";

  if(!$login){
    die("Você não tem permissão para acessar essa página.");
  }

  $form_title = $form_text = "";

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $form_title = $_POST['form_title'];
    $form_text = $_POST['form_text'];

    $conn = connect_db();

    if (empty($form_title) || empty($form_text)) {
      $error = true;
    }
    else{
      $title = mysqli_real_escape_string($conn, sanitize($form_title));
      $text = mysqli_real_escape_string($conn, sanitize($form_text));

      $sql = "INSERT INTO tb_posts (data_post, fk_usuario, titulo, texto, ativo)
      VALUES (CURRENT_TIMESTAMP, '$user_id', '$title', '$text', '1')";

      if (!mysqli_query($conn, $sql)) {
          die("Error: " . $sql . "<br>" . mysqli_error($conn));
      }
      else {
        $form_title = $form_text = "";
        $msg = "Comentário salvo com sucesso!";
        echo"
            <script>
                alert('Post adicionado com sucesso!');
                window.location.href='perfil.php?id=$user_id#meus_posts';
            </script>
            ";
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
        <title>Blog Legal - Novo Post</title>
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
                            <h1>NOVO POST</h1>
                            <span class="subheading">Blog Legal</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                <form action="new_post.php" method="post">
                    <!-- Name input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="title" name="form_title" class="form-control" />
                        <label class="form-label" for="titulo">Título</label>
                    </div>

                    <!-- Username input -->
                    <div class="form-outline mb-4">
                        <textarea id="texto" name="form_text" class="form-control" ></textarea>
                        <label class="form-label" for="texto">Texto</label>
                    </div>

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
