//JS file
$(document).ready(function(){

    //The below jquery will get the data on each key stroke
    $("#search-term").on("keyup change", function() {
        var str = this.value;
        if (str.length > 0){
            getPokemonData(str);
        }
        else {
            document.getElementById("data").innerHTML = " "; 
        }
     });
});

function getPokemonData(str){
    $.ajax({
        url: "/loadpokemon",
        type: "get",
        data: { str: str},
        success: function (result) {
            var mydata = JSON.parse(result);
            if (mydata.length < 1){
                document.getElementById("data").innerHTML = "No data available";
            }
            else {
                var output = '<table class="table">';
                for (var i in mydata){
                    output += '<tr>';
                    output += '<td>' + mydata[i].name + '</td>';
                    output += '</tr>';
                }
                output += '</table>';
                document.getElementById("data").innerHTML = output; 
            }
        }  
    });
}