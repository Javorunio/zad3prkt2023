<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <title>Zadanie 3 PHP mySQL wersja 2.0</title>
</head>
<body>
    <h1 style="size: 64px;" >Login panel</h1>
        <form style="font-size: 16px;" method="post">
            Użytkownik:
            <br/>
            <input type="text" name="username">
            <br/>
            Hasło:
            <br/>
            <input type="password" name="password">
            <br/>
            <input type="submit" value="Zaloguj">
            <br/>
        </form>
<div style="size: 20px;">

<?PHP
    $polaczenie = @new mysqli("localhost","root","","logindata");
    if($polaczenie->connect_errno!=0)
    echo "Błąd: ".$polaczenie->errno;

    else
    {
        $login = "SELECT * FROM userinfo WHERE username='$_POST[username]' AND password='$_POST[password]'";

        if($rekord = @$polaczenie->query($login))
        {
            $ile = $rekord->num_rows;
            if($ile>0)
            {
                echo "Zalogowano pomyślnie.";
            }
            else
            {
                echo "Niepoprawne hasło lub login, spróbuj jeszcze raz.";
            }
        }
        //$polaczenie->close();
    }
?>
</div>
</body>
</html>
