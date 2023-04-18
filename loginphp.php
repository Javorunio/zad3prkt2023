<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <title>Zadanie 3 PHP</title>
</head>
<body>
    <form method="post" action="">
        <input type="text" id="username" name="username">
        </br>
        <input type="text" id="password" name="password">
        </br>
        <input type="submit" value="Zaloguj się" name="submit">
        </br>

        <?php
        $polaczenie = new mysqli("localhost","root","","login");

        if ($polaczenie->connect_error)
        {
            echo "Błąd: ".$polaczenie->connect_errno;
        }

        if (isset($_POST['submit']))
        {

            $username = $_POST['username'];
            $password = $_POST['password'];

            $baza = "SELECT * FROM users WHERE username='$username' AND password='$password'";
            $ile = mysqli_query($polaczenie, $baza);
            
            if (mysqli_num_rows($ile) > 0)
            {
                echo "Zalogowano.";
            }
            else
            {
                echo "Nieprawidłowy login lub hasło";
            }

            mysqli_close($polaczenie);
        }
        ?>
    </form>
</body>

</html>