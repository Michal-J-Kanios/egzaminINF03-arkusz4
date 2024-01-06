<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteka publiczna</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="banner">
        <h1>Biblioteka w Książkowicach Wielkich</h1>
    </div>
<div class="flexownia">
    <div class="lewy">
        <h3>Polecamy dzieła autorów:</h3>
        <ol>
            <?php
            //tutaj bedzie skrypt1
            $polaczenie = mysqli_connect("localhost", "root", "", "biblioteka");
            $zapytanie1 = mysqli_query($polaczenie, "SELECT imie, nazwisko FROM `autorzy` GROUP BY nazwisko ASC;");

            while($wynik1 = mysqli_fetch_row($zapytanie1)){
            echo "<li>";
            echo $wynik1[0];
            echo " ";
            echo $wynik1[1];
            echo "</li>";
        }

        mysqli_close($polaczenie);
        ?>
        </ol>
        
    </div>

    <div class="srodek">
        <h3>ul. Czytelnicza 25, <br>
        Książkowice&nbsp;Wielkie</h3>
        <p>
        <a href="mailto:sekretariat@biblioteka.pl">Napisz do nas</a>
        </p>
        <img src="biblioteka.png" alt="książki">
    </div>
<div class="prawica">
    <div class="prawy-top">
        <h3>Dodaj czytelnika</h3>
        <form action="" method="post">
            <p>imię: <input type="text" name="imie" id="im"></p>
            <p>nazwisko: <input type="text" name="nazwisko" id="naz"></p>
            <p>symbol: <input type="number" name="symbol" id="sym"></p>
            <input type="submit" value="DODAJ">
        </form>
    </div>
    <div class="prawy-bottom">
        <?php
            //tutaj bedzie skrypt2
            $imie = $_POST['imie'];
            $nazwisko = $_POST['nazwisko'];
            $kod = $_POST['symbol'];
            if(!empty($imie) && !empty($nazwisko) && !empty($kod)){
                echo "Czytelnik ";
                echo "$imie";
                echo " ";
                echo "$nazwisko";
                echo " ";
                echo "został(a) dodany do bazy danych";
                $zapytanie2 = "INSERT INTO czytelnicy SET imie='$imie', nazwisko='$nazwisko', kod='$kod';";
                $polaczenie2 = mysqli_connect("localhost", "root", "", "biblioteka");
                mysqli_query($polaczenie2, $zapytanie2);
                mysqli_close($polaczenie2);
            }

            /*
            while($wynik2 = mysqli_fetch_row($zapytanie2)){
            echo "Czytelnik ";
            echo $wynik1[0];
            echo " ";
            echo $wynik[1];
            echo " został(a) dodany do bazy danych";*/
        ?>
    </div>
</div>
</div>
    <div class="stopka">
        <p>Projekt strony: 000000000000</p>
    </div>
</body>
</html>