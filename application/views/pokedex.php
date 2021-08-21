<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Gotta Catch'em All</title>
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <style>
            #container{
                width: 150px;
                height: 400px;
                border: 20px solid red;
                margin: -550px 1000px;
                padding: 50px;
            }
            p, h1{
                font-family: arial;
                text-transform: capitalize;
            }
            li{
                font-family: arial;
            }
            #bulbasaur{
                width: 900px;
                height: 600px; 
            }
           
        </style>
       <script>
            $(document).ready(function(){
                $.get("http://pokeapi.co/api/v2/pokemon/2/", function(res) {
                   
                    var html_str = "";
                    
                    var images = "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/1.png";

                    for(var i = 0; i < 152; i++) {
                        html_str += "<img id="+ i +" src=" + images.replace(1,i) + ">";
                    }
                    $("#bulbasaur").html(html_str);
                    var name = res.name;
                    console.log(name);

                        $("img").click(function(){

                            newImage = this.id;
                            getImage = "";

                            for(var j=0; j<152; j++){
                                if(newImage == j){
                                    getImage += "http://pokeapi.co/api/v2/pokemon/"+j+"/";
                                }
                            }
                            $.get(getImage, function(pokedex){
                                var image = "";
                                image += "<h1>" + pokedex.name + "</h1>";
                                image += "<img id=" + newImage +" src=" + images.replace(1,newImage) + ">";
                                image += "<p><b> Types <b></p><br>";
                                for(var k = 0; k <  pokedex.types.length; k++){
                                    image +=  "<li>" + pokedex.types[k].type.name + "<br>";
                                }
                                image += "<p><b> height: <b></p>" + pokedex.height + "<br>";
                                image += "<p> weight: </p>" + pokedex.weight + "<br>";

                                $("#container").html(image)
                            });
                            console.log(getImage);
                            image += res.name;
                        });
                        
                });
            })
        </script>
    </head>
    <body>
        <div id="bulbasaur"></div>
        <div id="container">
           <img id="2" src="">

           </div>
        
        
    </body>
</html>
