<?php
  require "authenticate.php";
  require "db_functions.php";
  
  $conn = connect_db();
  $id = $_GET['id'];

  $error = false;
  $success = false;
 
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["submit"])) {
                          
    $sql = "DELETE FROM tb_posts WHERE id_post = $id";
    $posts = mysqli_query($conn, $sql); 

        if(mysqli_query($conn, $sql)){
            $success = true;
            echo"
            <script>
                alert('Post deletado com sucesso!');
                window.location.href='perfil.php?id=$user_id#meus_posts';
            </script>
            ";
        }
        else {
            $error_msg = mysqli_error($conn);
            $error = true;
        }
    }
    
    if (!$posts) {
    die("Error: " . $sql . "<br>" . mysqli_error($conn));
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
        <title>Blog Legal - Sobre</title>
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
                        <div class="page-heading">
                            <h1>DELETAR POST</h1>
                            <span class="subheading">Tem certeza?</span><br><br>
                            <form action="" method="post">
                                <center>
                                    <button name="submit" type="submit" class="btn btn-primary btn-block mb-3">Sim</button>
                                    <button type="button" class="btn btn-primary btn-block mb-3" onclick='window.history.back();'>Não</button>
                                </center>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <?php require "footer.php";?>
    </body>
</html>
