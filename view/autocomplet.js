var searchBar = document.getElementById("gametitle");
searchBar.addEventListener("keyup", () => gameSearch(searchBar.value));


function gameSearch(title) {
  var httpRequest = new XMLHttpRequest();
  httpRequest.open("GET", "index.php?controller=jeu&action=search&title="+title, true);
  httpRequest.addEventListener("load", function() {
    if(title != ""){
      gameResponse(httpRequest);
    }else{
      var auto_box = document.getElementById("search-result");
      auto_box.innerHTML="";
    } 
  });
  httpRequest.send(null);
}

function gameResponse(httpRequest){
  var tab = JSON.parse(httpRequest.responseText);
  showgame(tab);
}

function showgame(gameTab){
  var auto_box = document.getElementById("search-result");
  auto_box.innerHTML="";
  if(gameTab == false){
    auto_box.innerHTML="Aucun jeux";
  }else{
    gameTab.forEach((element) => auto_box.innerHTML=auto_box.innerHTML+"<p>"+element.titre+"</p>");
  }
}