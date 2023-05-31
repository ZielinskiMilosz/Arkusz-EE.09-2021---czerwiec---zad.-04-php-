<!DOCTYPE html>
<html lang="pl">
<head>
    <link rel="stylesheet" href="styl4.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel administratora</title>
</head>
<body>
    <div class="baner"><h3>Portal Społeczniościowy - panel administratora</h3></div>
    <div class="lewy">
    
    <h4>Użytkownicy<br>
        <?php
        $con = new mysqli("127.0.0.1","root","","dane4");
        $sql = "SELECT osoby.id,osoby.imie,osoby.nazwisko,osoby.rok_urodzenia,osoby.zdjecie FROM osoby LIMIT 30;";
        $res = $con->query($sql);
        $rows = $res->fetch_all(MYSQLI_ASSOC);

        $i=0;
        while($i < count($rows))
        {
            $rok = 2021-$rows[$i]["rok_urodzenia"];
            echo "".$rows[$i]["id"].". ".$rows[$i]["imie"]." ".$rows[$i]["nazwisko"].", ".$rok." lat<br>";
            $i++;
        }

        $con->close();
        ?>
    
    <a href="settings.html">Inne ustawienia</a>
    </h4>

    </div>

    <div class="lewy">

    <div>
        <h4>Podaj id użytkownika</h4>
        <form method="POST">
        <input type="number" name="numer">
        <input type=Submit class="przycisk" name="1" value="ZOBACZ">
        </form>
    </div>
    <hr>
    <div">
        <h4>
        <?php
        $con = new mysqli("127.0.0.1","root","","dane4");
        $sql = "SELECT osoby.id,osoby.opis,osoby.imie,osoby.nazwisko,osoby.rok_urodzenia,osoby.zdjecie,hobby.nazwa FROM osoby JOIN hobby ON hobby.id=osoby.Hobby_id LIMIT 30;";
        $res = $con->query($sql);
        $rows = $res->fetch_all(MYSQLI_ASSOC);

        $numer = 0;
        if(isset($_POST["numer"]))
        {
            $numer = $_POST["numer"]-2;
            echo "<h2>".$rows[$numer]["id"].". ".$rows[$numer]["imie"]." ".$rows[$numer]["nazwisko"]."</h2>";
            echo "<img src=".$rows[$numer]["zdjecie"]." alt=".$numer."><br>";
            echo "<p>Rok urodzenia: ".$rows[$numer]["rok_urodzenia"]."</p>";
            echo "<p>Opis: ".$rows[$numer]["opis"]."</p>";
            echo "<p>Hobby: ".$rows[$numer]["nazwa"]."</p>";
        }

        $con->close();
        ?>
        </h4>
    </div>

    </div>
    
    <div class="dol">Stronę wykonał: 000000000000</div>
</body>
</html>