<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .item-row{
            display: flex;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.search-box input[type="text"]').on("keyup input", function(){
                /* Value von input abfragen, falls es sich verändert */
                var inputVal = $(this).val();
                var resultDropdown = $(this).siblings(".result");
                if(inputVal.length){
                    $.get("backend-search.php", {term: inputVal}).done(function(data){
                        // Daten von der Abfrage als Dropdown anzeigen
                        resultDropdown.html(data);
                    });
                } else{
                    resultDropdown.empty();
                }
            });

            // Suchanzeige als clickable element ändern
            $(document).on("click", ".result .item-row", function(){
                var playerId = $(this).find('p[data-player-id]').attr('data-player-id');
                window.location.href = 'player.php?id=' + playerId;
            });
        });
    </script>
</head>
<body>
    <div class="search-box">
        <input type="text" autocomplete="off" placeholder="Spieler ID..." />
        <div class="result"></div>
    </div>
</body>
</html>
