<!--Spielerprofil nach Suche anzeigen-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $host = 'localhost';
    $user = 'root';
    $pw = '';
    $database = 'kanopolo';

    $conn = new mysqli($host, $user, $pw, $database);

    if ($conn === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    // Überprüfen, ob ID exisitiert
    if (isset($_GET["id"])) {
        $id = $_GET["id"];

        // Such-Query
        $sql = "SELECT * FROM spielertabelle WHERE Spieler_ID = ?";
        
        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind ID parameter to the prepared statement
            mysqli_stmt_bind_param($stmt, "s", $id);
            
            // Auführung des Query´s
            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);
                
                // Check if there is a matching row
                if (mysqli_num_rows($result) === 1) {
                    $row = mysqli_fetch_assoc($result);
                    // Daten in input field ausfüllen
                    $vereinsId = $row["Vereins_ID"];
                    $spielerId = $row["Spieler_ID"];
                    $verband = $row["Verband"];
                    $geschlecht = $row["Geschlecht"];
                    $vorname = $row["Vorname"];
                    $nachname = $row["Nachname"];
                    $strasse = $row["Strasse"];
                    $hausnummer = $row["Hausnummer"];
                    $postleitzahl = $row["Postleitzahl"];
                    $ort = $row["Ort"];
                    $telefonnummer = $row["Telefonnummer"];
                    $email = $row["EMail"];
                    $geburtsdatum = $row["Geburtsdatum"];
                    $spielerberechtigt = $row["Spielerberechtigt"];
                    $funktion = $row["Funktion"];
                    $mannschaft = $row["Mannschaft"];
                    $sportgesund = $row["Sportgesund"];

                    // HTML Template
                    echo '
                        <form action="saveplayer.php">
                            <p>
                               <label for="vereinsid">Vereins-ID:</label>
                               <input type="number" name="vereins_id" id="vereinsid" value="' . $vereinsId . '">
                            </p>
                            <p>
                               <label for="spielerid">Spieler-ID:</label>
                               <input type="number" name="spieler_id" id="spielerid" value="' . $spielerId . '">
                            </p>
                            <p>
                               <label for="verband">Verband:</label>
                               <input type="text" name="verband" id="verband" value="' . $verband . '">
                            </p>
                            <p>
                                <label for="geschlecht">Geschlecht:</label>
                                <select name="geschlecht" id="geschlecht">
                                    <option value="männlich" ' . ($geschlecht === "männlich" ? "selected" : "") . '>Männlich</option>
                                    <option value="weiblich" ' . ($geschlecht === "weiblich" ? "selected" : "") . '>Weiblich</option>
                                    <option value="divers" ' . ($geschlecht === "divers" ? "selected" : "") . '>Divers</option>
                               </select>
                            </p>
                            <p>
                               <label for="vorname">Vorname:</label>
                               <input type="text" name="vorname" id="vorname" value="' . $vorname . '">
                            </p>
                            <p>
                               <label for="nachname">Nachname:</label>
                               <input type="text" name="nachname" id="nachname" value="' . $nachname . '">
                            </p>
                            <p>
                               <label for="strasse">Strasse:</label>
                               <input type="text" name="strasse" id="strasse" value="' . $strasse . '">
                            </p>
                            <p>
                               <label for="hausnummer">Hausnummer:</label>
                               <input type="text" name="hausnummer" id="hausnummer" value="' . $hausnummer . '">
                            </p>
                            <p>
                               <label for="postleitzahl">Postleitzahl:</label>
                               <input type="text" name="postleitzahl" id="postleitzahl" value="' . $postleitzahl . '">
                            </p>
                            <p>
                               <label for="Ort">Ort:</label>
                               <input type="text" name="ort" id="ort" value="' . $ort . '">
                            </p>
                            <p>
                               <label for="telefonnummer">Telefonnummer:</label>
                               <input type="text" name="telefonnummer" id="telefonnummer" value="' . $telefonnummer . '">
                            </p>
                            <p>
                               <label for="email">Email:</label>
                               <input type="email" name="email" id="email" value="' . $email . '">
                            </p>
                            <!-- <p>
                               <label for="foto">Foto:</label>
                               <input type="text" name="foto" id="foto">
                            </p> -->
                            <p>
                               <label for="geburtsdatum">Geburtsdatum:</label>
                               <input type="date" name="geburtsdatum" id="geburtsdatum" value="' . $geburtsdatum . '">
                            </p>
                            <p>
                               <label for="spielerberechtigt">Spielerberechtigt:</label>
                               <select name="spielerberechtigt" id="spielerberechtigt">
                                    <option value="1" ' . ($spielerberechtigt === "1" ? "selected" : "") . '>Ja</option>
                                    <option value="0" ' . ($spielerberechtigt === "0" ? "selected" : "") . '>Nein</option>
                               </select>
                            </p>
                            <p>
                               <label for="funktion">Funktion:</label>
                               <input type="text" name="funktion" id="funktion" value="' . $funktion . '">
                            </p>
                            <p>
                               <label for="mannschaft">Mannschaft:</label>
                               <input type="text" name="mannschaft" id="mannschaft" value="' . $mannschaft . '">
                            </p>
                            <p>
                               <label for="sportgesund">Sportgesund:</label>
                               <select name="sportgesund" id="sportgesund">
                                    <option value="1" ' . ($sportgesund === "1" ? "selected" : "") . '>Ja</option>
                                    <option value="0" ' . ($sportgesund === "0" ? "selected" : "") . '>Nein</option>
                               </select>
                            </p>
                            <input type="submit" value="Speichern">
                        </form>
                    ';
                } else {
                    echo "<p>No player found with the provided ID.</p>";
                }
            } else {
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
            }
        }

        // statement schließen
        mysqli_stmt_close($stmt);
    } else {
        echo "<p>No ID parameter provided.</p>";
    }

    // Verbindung schließen
    mysqli_close($conn);
    ?>
</body>
</html>
