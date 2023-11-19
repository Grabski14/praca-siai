<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sekretariat</title>
    <link rel="stylesheet" href="css siai PG.css">
</head>
<body>
    <section id="lewy">
        <h1>Akta Pracownicze</h1>
        <?php 
        $con = mysqli_connect("localhost","root", "", "firma");
        if($con){
            $zap = "SELECT imie, nazwisko,adres, miasto, czyRODO, czyBadania from pracownicy where id = 2 ";
            $wynik = mysqli_query($con, $zap);
            while($wiersz =mysqli_fetch_array($wynik)){
            $rodo = ($wiersz[4] == 1) ? 'podpisano' : 'niepodpisano';
            $badania = ($wiersz[5] == 1) ? 'aktualne' : 'nieaktualne';
                echo"
                <h3>dane</h3>
                <p>$wiersz[0],$wiersz[1]</p>
                <hr></hr>
                <h3>adres</h3>
                <p>$wiersz[2]</p>
                <p>$wiersz[3]</p>
                <hr></hr>
                <p>RODO: $rodo</p>
            <p>Badania: $badania</p>";
        }
    } mysqli_close($con);
        
    
          
        
        ?>
        <hr></hr>
        <h3>Dokumenty pracownika</h3>
        <a href="cv.txt">Pobierz</a>
        <h1>Liczba zatrudnionych pracowników</h1>
        <p>
<?php 
$con = mysqli_connect("localhost","root", "", "firma");
if($con){
    $zap = "SELECT COUNT(*) FROM pracownicy";
    $wynik = mysqli_query($con, $zap);
    $wiersz =mysqli_fetch_array($wynik);
    echo "
    <h3>Liczba zatrudnionych pracowników</h3>
    <p>$wiersz[0]</p>";
} mysqli_close($con);
?> </p>
    </section>
    <section id="prawy">
        <?php $con = mysqli_connect("localhost","root", "", "firma");
if($con){           
        $zap = "SELECT id,imie,nazwisko FROM pracownicy WHERE id=2;";
        $wynik = mysqli_query($con, $zap);
        while($wiersz =mysqli_fetch_array($wynik)){
            echo"<img src='$wiersz[0].jpg' alt='pracownik'>
            <h2>$wiersz[1] $wiersz[2]</h2>";
        }

        $zap = "SELECT pracownicy.id, stanowiska.nazwa, stanowiska.opis FROM pracownicy, stanowiska WHERE pracownicy.stanowiska_id = stanowiska.id AND pracownicy.id = 2;";
        $wynik = mysqli_query($con, $zap);
        while ($wiersz= mysqli_fetch_array($wynik)) {
            echo "<h4>$wiersz[1]</h4>
                  <h5>$wiersz[2]</h5>";
        }

       


} mysqli_close($con);
        ?>
    </section>
    <footer>Autorem aplikacji jest Paweł Grabski
            <ul>
                <li>skontaktuj się</li>
                <li>poznaj naszą firmę</li>
            </ul>
    </footer>
</body>
</html>
