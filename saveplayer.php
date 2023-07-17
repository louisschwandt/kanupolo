<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Save Player</title>
</head>
<body>
    <?php
    // Zugangsdaten für lokalen Zugriff
        $host='localhost';
        $user = 'root';
        $pw = '';
        $database = 'kanopolo';

    // Verbindung zur Datenbank aufbauen
        $conn = new mysqli($host, $user, $pw, $database); 

    // Verbindungsfehler auffangen
        if($conn->connect_error){
            die("Connnection failed: " . $conn->connect_error);
        }

    // Alle Eingaben von addplayer.php abfragen
        $vereinsid = $_REQUEST['vereins_id'];
        $spielerid = $_REQUEST['spieler_id'];
        $verband = $_REQUEST['verband'];
        $geschlecht = $_REQUEST['geschlecht'];
        $vorname = $_REQUEST['vorname'];
        $nachname = $_REQUEST['nachname'];
        $strasse = $_REQUEST['strasse'];
        $hausnummer = $_REQUEST['hausnummer'];
        $postleitzahl = $_REQUEST['strasse'];
        $ort = $_REQUEST['ort'];
        $telefonnummer = $_REQUEST['telefonnummer'];
        $email = $_REQUEST['email'];
        // $foto = $_REQUEST['foto'];
        $geburtsdatum = $_REQUEST['geburtsdatum'];
        $spielerberechtigt = $_REQUEST['spielerberechtigt'];
        $funktion = $_REQUEST['funktion'];
        $mannschaft = $_REQUEST['mannschaft'];
        $sportgesund = $_REQUEST['sportgesund'];
        
    //Query, um Daten in Datenbank einzupflegen 
        $sql = "INSERT INTO spielertabelle (Vereins_ID,
                                            Spieler_ID,
                                            Verband,
                                            Geschlecht,
                                            Vorname,
                                            Nachname,
                                            Strasse,
                                            Hausnummer,
                                            Postleitzahl,
                                            Ort,
                                            Telefonnummer,
                                            EMail,
                                            Geburtsdatum,
                                            Spielerberechtigt,
                                            Funktion,
                                            Mannschaft,
                                            Sportgesund) VALUES ('$vereinsid',
                                                                 '$spielerid',
                                                                 '$verband',
                                                                 '$geschlecht',
                                                                 '$vorname',
                                                                 '$nachname',
                                                                 '$strasse',
                                                                 '$hausnummer',
                                                                 '$postleitzahl',
                                                                 '$ort',
                                                                 '$telefonnummer',
                                                                 '$email',
                                                                 '$geburtsdatum',
                                                                 '$spielerberechtigt',
                                                                 '$funktion',
                                                                 '$mannschaft',
                                                                 '$sportgesund');";
    // Überprüfung, ob Datenübertragung zur Datenbank erfolgreich war
        if ($conn->query($sql) === TRUE){
            echo"New record created succesfully";
        }
        else{
            echo "Error: " .$sql. "<br>". $conn->error;
        }
    // Nach der Ausführung Verbindung schließen
        $conn->close();
    ?>
</body>
</html>