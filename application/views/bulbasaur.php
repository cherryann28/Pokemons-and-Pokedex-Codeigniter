<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Gotta Catch'em All</title>
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script>
            $(document).ready(function(){
                $.get("http://pokeapi.co/api/v2/pokemon/2/", function(res) {
                    // console.log(res);
                    // console.log(res.abilities[1].name);
                    // console.log(res.name);
                    // console.log(res.sprites.front_default);
                    var html_str = "";
                        // html_str += "<h4>Types</h4>";
                        // html_str += "<ul>"; 
                        var image = "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/1.png";

                    for(var i = 0; i < 152; i++) {
                        html_str += "<img src=" + image.replace(1,i) + ">";
                    }
                    // html_str += "</ul>";
                    $("#bulbasaur").html(html_str);
                }, "json");
            })
        </script>
    </head>
    <body>
        <div id="bulbasaur"></div>
        

    </body>
</html>
