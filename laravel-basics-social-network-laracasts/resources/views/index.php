<!DOCTYPE html>
<html lang="se">
<head>
    <title>Sveriges Radio</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Play:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/styles.css" type="text/css">
</head>

<body>
    <header id="mainheader">
        <div class="contain">
            <h1 id="logo">DT084G - Projekt</h1>


          
            <section id="player">
                <select id="playchannel" class="form-control"></select>
                <button id="playbutton" class="btn btn-primary">Spela</button>
            </section>
         
            <!-- /#search -->
        </div>
        <!-- /.contain -->
    </header>

    <div class="container">
        <h2>SR - Sveriges Radio</h2>
        <div class="left">
            <section class="clist">
                <h3>Bläddra via kanal</h3>
                <nav id="mainnav">
                    <ul id="mainnavlist"></ul>
                    <div class="spacer" id="shownumrows">
                        <label for="numrows">Max antal: </label><input type="number" id="numrows" value="10" min="1" max="2000">&nbsp;&nbsp;
                    </div>
                </nav>
            </section>
            <!-- /#lan -->
        </div>
        <!-- /.left -->

        <div class="right">
            <div id="info"></div>
            <!-- /#info -->HELLO
        </div>
        <!-- /.right -->

        <footer>
            <p>Projektuppgift för kursen DT084G, Introduktion till programmering med JavaScript.</p>

            <div id="radioplayer"></div>
        </footer>
    </div>
    <!-- /.container -->

    <script>   // Denna fil ska innehålla er lösning till projektuppgiften.

"use strict";

/*  Delar till ej obligatorisk funktionalitet, som kan ge poäng för högre betyg
*   Radera rader för funktioner du vill visa på webbsidan. */
//document.getElementById("player").style.display = "none";      // Radera denna rad för att visa musikspelare
//document.getElementById("shownumrows").style.display = "none"; // Radera denna rad för att visa antal träffar

/* Här under börjar du skriva din JavaScript-kod */



// HERE STARTS MY CODE


// variabler
var mainnavlistEl = document.getElementById("mainnavlist");
var i;
var restUrl = "http://api.sr.se/api/v2/channels/?format=json";

//funktion för ajax-anrop navigation vänster
window.onload = loadData;

function loadData() {

    //ajax-antop
    var xhr = new XMLHttpRequest();

    xhr.onload = function () {
        //check for answer
        if (xhr.status === 200) {
            var jsonStr = JSON.parse(xhr.responseText);
            var channelsArr = jsonStr.channels;
            
            //navigation vänster
            // Inkluderat unika id och tagline för varje alternativ

            for (i = 0; i < channelsArr.length; i++) {
                // element
                document.getElementById("mainnavlist").innerHTML += "<li id='" + channelsArr[i].id + "' title= '" + channelsArr[i].tagline + "'>" + channelsArr[i].name + "</li>";
                
            }


        //    console.log(channelsArr);

        } else {
            mainnavlistEl.innerHTML = "Fel vid anrop: " + xhr.status;
        }
            // Dropdown list
            // Inkluderat unika id och tagline för varje alternativ
        for (i = 0; i < channelsArr.length; i++) {
            document.getElementById("playchannel").innerHTML += "<option id='" + channelsArr[i].id + "'" + "title='" + channelsArr[i].tagline + "'>" + channelsArr[i].name + "</option>";
        }
    }

    //Send Ajax

    xhr.open('GET', restUrl, true);
    xhr.send(null);

    
}

// schedule

//variabel för id


document.getElementById("mainnavlist").addEventListener("click", function infoData(e){

    var URL = "http://api.sr.se/api/v2/scheduledepisodes?channelid=" + e.target.id + "&format=json&indent=true";
 
    //document.getElementById("info").innerHTML = URL ;
    var idEl = document.getElementById("mainnavlist");
    var restUrl2 = "http://api.sr.se/api/v2/scheduledepisodes";


  /*  xhr.onload = function () {
        //check for answer
        if (xhr.status === 200) {
            var jsonStr = JSON.parse(xhr.responseText);
            var channelsArr = jsonStr.channels;
            
              for (i = 0; i < channelsArr.length; i++) {
                // element
                document.getElementById("mainnavlist").innerHTML += "<li id='" + channelsArr[i].id + "' title= '" + channelsArr[i].tagline + "'>" + channelsArr[i].name + "</li>";
                
            }*/
            document.getElementById("playchannel").addEventListener("change", myFunction);
            
  /*  var xhr = new XMLHttpRequest();
  
    xhr.onreadystatechange = function () {
     //    xhr.onclick = function () {
            //check answer 
           

        if(xhr.status === 200) {
    
            var jsonStr = JSON.parse(xhr.responseText);
            var scheduleArr = jsonStr.channels;

            console.log(scheduleArr);

         //   for(i = 0; i < scheduleArr.length; i++) {
             //   document.getElementById("info").innerHTML += "<p>" + scheduleArr[i].title + "</p>";
          //  }
        }
        document.getElementById("info").innerHTML += "<p>" + scheduleArr.name + "</p>";
    }
    
    xhr.open('GET', URL, true);
    xhr.send(null);
*/
    

})
</script>

    <script src="js/main.js"></script>
</body>

</html>