<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Gotta Catch'em All</title>
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <style>
            #pokedex{
                width: 200px;
                height: 300px;
                border: 3px solid black;
                float: right;
            }
            #bulbasaur{
                width: 800px;
                height: 600px;
            }
           
        </style>
       <script>
            $(document).ready(function(){
                $.get("http://pokeapi.co/api/v2/pokemon/2/", function(res) {
                    console.log(res);

                    newArr = "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/1.png";                   
                    var html_str = "";
                    html_str += "<h4>Pictures</h4>";
                    
                   
                    for(let i = 0; i < 152; i++) {
                        html_str += "<img id="+ i +" src=" + newArr.replace(1,i) + ">";
                    }
                    $("#bulbasaur").html(html_str);
                    var name = res.name;
                    console.log(name);

                        $("img").click(function(){  

                            image = this.id;
                            newGet = "";

                            for(let j=0; j<152; j++){
                                if(image == j){
                                    newGet += "http://pokeapi.co/api/v2/pokemon/"+j+"/";
                                }
                            }
                            $.get(newGet, function(data){
                                var pokedex = "";
                                pokedex += "<h2>" + data.name + "</h2>";
                                pokedex += "<img id=" + image +" src=" + newArr.replace(1,image) + ">";
                                pokedex += "<b> Types </b><br>";
                                for(let k = 0; k <  data.types.length; k++){
                                    pokedex += data.types[k].type.name + "<br>";
                                }
                                pokedex += "<b> height: </b><br>" + pokedex.height + "<br>";
                                pokedex += "<b> weight: </b><br>" + pokedex.weight + "<br>";

                                $("#pokedex").html(pokedex)
                            });
                            console.log(newGet);
                            pokedex += res.name;
                        });
                        
                });
            })
        </script>
    </head>
    <body>
        <div id="bulbasaur">
           <div id="pokedex">
           <img id="2" src="http://pokeapi.co/api/v2/pokemon/2/">

           
           </div>
        </div>
        
        
    </body>
</html>
