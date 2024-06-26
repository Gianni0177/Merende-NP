<?php

session_start();

if(isset($_SESSION["AUTENTICATO"]) and $_SESSION["AUTENTICATO"]=="ok"){
                    
    header("Location: ../ordina.php");
    
}

if (isset($_POST["login"])) {
    try {
        $connessione = mysqli_connect("localhost", "root", "root", "panini");

        // Prevenzione SQL injection
        $username = mysqli_real_escape_string($connessione, $_POST["username"]);
        $password = mysqli_real_escape_string($connessione, $_POST["password"]);

        // Query SQL per il login
        $sql = "SELECT * FROM utente WHERE username='$username' AND password='$password'";
        $risultato = $connessione->query($sql);

        if ($risultato && $risultato->num_rows > 0) {
            // Utente trovato, imposto le variabili di sessione
            $_SESSION["AUTENTICATO"] = "ok";
            $_SESSION["USER"] = $username;

            $connessione->close();

            header('Location: ../ordina.php');
            exit();
        } else {
            // Utente non trovato, reindirizzo alla pagina di login
            header('Location: login.php');
            exit();
        }
    } catch (Exception $e) {
        // Gestione eccezioni
    }
}

?>

<html>

<head>
    <title>Login</title>
    <link href="assets/img/favicon.jpg" rel="icon">
    <link rel="stylesheet" type="text/css" href="../assets/css/stile2.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
    function redirectAccount() {
        var url = "sign-in.php";
        window.location.href = url;
    }
    </script>

</head>

<body>

    <div class="login-container">
        <h2>Login</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input required type="text" name="username" placeholder="Username"><br><br>
            <input required type="password" name="password" placeholder="Password"><br><br>
            <input class="boton-login" name="login" type="submit" value="Login">
        </form>
        <button style="background-color:red" type="submit" name="redirectAccount" onclick="redirectAccount();">O
            registra un account</button>
    </div>

</body>

</html>