<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <!-- Formular, um Eingaben bei saveplayer.php in Datenbank einzupflegen  -->
    <form action="saveplayer.php">
        <p>
           <label for="vereinsid">Vereins-ID:</label>
           <input type="number" name="vereins_id" id="vereinsid">
        </p>
        <p>
           <label for="spielerid">Spieler-ID:</label>
           <input type="number" name="spieler_id" id="spielerid">
        </p>
        <p>
           <label for="verband">Verband:</label>
           <input type="text" name="verband" id="verband">
        </p>
        <p>
            <label for="geschlecht">Geschlecht:</label>
            <select name="geschlecht" id="geschlecht">
                <option value="männlich">Männlich</option>
                <option value="weiblich">Weiblich</option>
                <option value="divers">Divers</option>
           </select>
        </p>
        <p>
           <label for="vorname">Vorname:</label>
           <input type="text" name="vorname" id="vorname">
        </p>
        <p>
           <label for="nachname">Nachname:</label>
           <input type="text" name="nachname" id="nachname">
        </p>
        <p>
           <label for="strasse">Strasse:</label>
           <input type="text" name="strasse" id="strasse">
        </p>
        <p>
           <label for="hausnummer">Hausnummer:</label>
           <input type="text" name="hausnummer" id="hausnummer">
        </p>
        <p>
           <label for="postleitzahl">Postleitzahl:</label>
           <input type="text" name="postleitzahl" id="postleitzahl">
        </p>
        <p>
           <label for="Ort">Ort:</label>
           <input type="text" name="ort" id="ort">
        </p>
        <p>
           <label for="telefonnummer">Telefonnummer:</label>
           <input type="text" name="telefonnummer" id="telefonnummer">
        </p>
        <p>
           <label for="email">Email:</label>
           <input type="email" name="email" id="email">
        </p>
        <!-- <p>
           <label for="foto">Foto:</label>
           <input type="text" name="foto" id="foto">
        </p> -->
        <p>
           <label for="geburtsdatum">Geburtsdatum:</label>
           <input type="date" name="geburtsdatum" id="geburtsdatum">
        </p>
        <p>
           <label for="spielerberechtigt">Spielerberechtigt:</label>
           <select name="spielerberechtigt" id="spielerberechtigt">
                <option value="1">Ja</option>
                <option value="0">Nein</option>
           </select>
        </p>
        <p>
           <label for="funktion">Funktion:</label>
           <input type="text" name="funktion" id="funktion">
        </p>
        <p>
           <label for="mannschaft">Mannschaft:</label>
           <input type="text" name="mannschaft" id="mannschaft">
        </p>
        <p>
           <label for="sportgesund">Sportgesund:</label>
           <select name="sportgesund" id="sportgesund">
                <option value="1">Ja</option>
                <option value="0">Nein</option>
        </p>
        <input type="submit" value="Speichern">
    </form>
</body>
</html>