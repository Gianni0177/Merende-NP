<html>
<head>
    <title>Registrazione</title>
    <link href="assets/img/favicon.jpg" rel="icon">
    <link rel="stylesheet" type="text/css" href="../assets/css/stile2.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        function redirectAccount(){
            var url="login.php";
            window.location.href = url; 
        }
    </script>
</head>


<?php
if (isset($_POST["sign-in"])) {
    try {
        $connessione = mysqli_connect("localhost", "root", "root", "panini");

       
        $sql = "INSERT INTO utente (username, password, email, nome, cognome, ruolo, data_registrazione) VALUES (?, ?, ?, ?, ?, ?, NOW())";
        $stmt = mysqli_prepare($connessione, $sql);
        $role = "user";

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sssssss", $_POST["username"], $_POST["password"], $_POST["email"], $_POST["name"], $_POST["surname"], $role);

            mysqli_stmt_execute($stmt);
        }
        mysqli_close($connessione);
    } catch (Exception $e) {
    }

    header("Location: registered.html");
    exit();
}

?>

<body>

<div class="login-container">
    <h2>Sign in</h2>
    <form method="post" action="<?php echo ($_SERVER["PHP_SELF"]); ?>">
        <input required type="text" name="username" placeholder="Username"><br><br>
        <input required type="email" name="email" placeholder="Email"><br><br>
        <input required type="password" name="password" placeholder="Password"><br><br>
        <input required type="text" name="name" placeholder="Nome"><br><br>
        <input required type="text" name="surname" placeholder="Cognome"><br><br>
        <input style="background-color:#DAF7A6" name="sign-in" type="submit" value="Registrati">
    </form>
    <button style="background-color:red" type="submit" name="redirectAccount" onclick="redirectAccount();">login</button>
</div>

</body>
</html>



