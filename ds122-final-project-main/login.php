<?php
require "db_functions.php";
require "authenticate.php";

$error = false;
$password = $email = "";

if (!$login && $_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["email"]) && isset($_POST["password"])) {

    $conn = connect_db();

    $email = mysqli_real_escape_string($conn,$_POST["email"]);
    $password = mysqli_real_escape_string($conn,$_POST["password"]);
    $password = md5($password);

    $sql = "SELECT * FROM tb_usuarios
            WHERE email_usuario = '$email';";

    $result = mysqli_query($conn, $sql);
    if($result){
      if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        if ($user["senha_usuario"] == $password) {

          $_SESSION["user_id"] = $user["id_usuario"];
          $_SESSION["user_name"] = $user["nome_usuario"];
          $_SESSION["user_email"] = $user["email_usuario"];
          $_SESSION["user_complete_name"] = $user["nome_completo_usuario"];
          $_SESSION["reg_date"] = $user["reg_date"];

          header("Location: " . dirname($_SERVER['SCRIPT_NAME']) . "/index.php");
          exit();
        }
        else {
          $error_msg = "Senha incorreta!";
          $error = true;

          echo"
            <script>
                alert('$error_msg');
                window.location.href='login.php';
            </script>
            ";
        }
      }
      else{
        $error_msg = "Usuário não encontrado!";
        $error = true;

        echo"
            <script>
                alert('$error_msg');
                window.location.href='login.php';
            </script>
            ";
      }
    }
    else {
      $error_msg = mysqli_error($conn);
      $error = true;
    }
  }
  else {
    $error_msg = "Por favor, preencha todos os dados.";
    $error = true;

    echo"
            <script>
                alert('$error_msg');
                window.location.href='login.php';
            </script>
            ";
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
        <title>Blog Legal - Login</title>
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
                            <h1>LOGIN</h1>
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
                <form action="login.php" method="post">
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" id="form2Example1" class="form-control" name="email" value="<?php echo $email; ?>" required/>
                        <label class="form-label" for="form2Example1">Email</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="form2Example2" class="form-control" name="password" value="" required/>
                        <label class="form-label" for="form2Example2">Senha</label>
                    </div>

                    <!-- 2 column grid layout for inline styling -->
                    <div class="row mb-4">
                        <div class="col d-flex justify-content-center">
                        <!-- Checkbox -->
                            <div>
                                <a href="register.php">Registrar-se!</a>
                            </div>
                        </div>

                        <div class="col">
                        <!-- Simple link -->
                            <button name="submit" type="submit" class="btn btn-primary btn-block mb-4">Login</button>
                        </div>
                      </div>
                    </form>
                </div>
            </div>
        </div>
        <?php require "footer.php";?>
    </body>
</html>