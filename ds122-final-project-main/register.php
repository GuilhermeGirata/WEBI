<?php
    include 'db_functions.php';

    $error = false;
    $success = false;
    $name = $email = $username = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["confirm_password"])) {

        $conn = connect_db();

        $name = mysqli_real_escape_string($conn,$_POST["name"]);
        $username = mysqli_real_escape_string($conn,$_POST["username"]);
        $email = mysqli_real_escape_string($conn,$_POST["email"]);
        $password = mysqli_real_escape_string($conn,$_POST["password"]);
        $confirm_password = mysqli_real_escape_string($conn,$_POST["confirm_password"]);

        if ($password == $confirm_password) {
        $password = md5($password);

        $sql = "INSERT INTO tb_usuarios
                (nome_completo_usuario, nome_usuario, email_usuario, senha_usuario) VALUES
                ('$name', '$username', '$email', '$password');";

        if(mysqli_query($conn, $sql)){
            $success = true;
            echo"
			<script>
				alert('Cadastrado com sucesso!');
				window.location.href='login.php';
			</script>
		";
        }
        else {
            $error_msg = mysqli_error($conn);
            $error = true;
        }
        }
        else {
        $error_msg = "Senha não confere com a confirmação.";
        $error = true;
        }
    }
    else {
        $error_msg = "Por favor, preencha todos os dados.";
        $error = true;
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
        <title>Blog Legal - Registrar</title>
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
                            <h1>REGISTRE-SE!</h1>
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
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                    <!-- Name input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="name" value="<?= $name ?>" name="name" class="form-control" require/>
                        <label class="form-label" for="name">Nome Completo</label>
                    </div>

                    <!-- Username input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="username" value="<?= $username ?>" name="username" class="form-control" require/>
                        <label class="form-label" for="username">Nome de usuário</label>
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" id="email" value="<?= $email ?>" name="email" class="form-control" require/>
                        <label class="form-label" for="email">Email</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="password" value="" name="password" class="form-control" require/>
                        <label class="form-label" for="password">Senha</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="confirm_password" value="" name="confirm_password" class="form-control" require/>
                        <label class="form-label" for="confirm_password">Confirme a Senha</label>
                    </div>

                    <!-- Submit button -->
                    <center>
                        <a type="button" href="index.php" class="btn btn-primary btn-block mb-3">Voltar</a>
                        <button type="submit" name="submit" class="btn btn-primary btn-block mb-3">Registrar</button>
                    </center>
                    </form>
                </div>
            </div>
        </div>
        <?php require "footer.php";?>
    </body>
</html>