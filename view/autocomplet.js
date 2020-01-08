var searchBar = document.getElementById("gametitle");
var auto_box = document.getElementById("search-result");

//click sur les propostition de completion
if(auto_box){
  auto_box.onclick = fill;
}

//remplissage de barre avec la valeur clicker
function fill(e){
  var click = e.target;
  var monTexte = click.innerText;
  searchBar.value = monTexte;
  auto_box.innerHTML = "";
  auto_box.style.display = "none";
}

//recherche dans barre de recherche
if(searchBar){
  searchBar.addEventListener("keyup", () => gameSearch(searchBar.value));
}

//click sur un bouton de upvote
var button = document.getElementsByName("btn");
button.forEach((element) => element.onclick = upvote);

function upvote() {
  var id = this.id;
  var httpRequest = new XMLHttpRequest();
  httpRequest.open("GET", "index.php?controller=post&action=vote&id="+this.id, true);
  httpRequest.addEventListener("load", function() {
    var answer = JSON.parse(httpRequest.responseText);
    if(answer == false){
      alert("ERROR");
    }else{
      putvote(id);
    }
  });
  httpRequest.send(null);
}

//afficje les votes en directe
function putvote(id){
  var httpRequest = new XMLHttpRequest();
  httpRequest.open("GET", "index.php?controller=post&action=getnbvoteByPost&id="+id, true);
  httpRequest.addEventListener("load", function() {
    var answer = JSON.parse(httpRequest.responseText);
    var upvote = document.getElementById("upvote"+id);
    upvote.innerHTML = "Upvote : "+answer;
  });
  httpRequest.send(null);
}

function gameSearch(title) {
  var httpRequest = new XMLHttpRequest();
  httpRequest.open("GET", "index.php?controller=jeu&action=search&title="+title, true);
  httpRequest.addEventListener("load", function() {
    if(title != ""){
      gameResponse(httpRequest);
    }else{
      var auto_box = document.getElementById("search-result");
      auto_box.innerHTML="";
      auto_box.style.display = "none";
    } 
  });
  httpRequest.send(null);
}

function gameResponse(httpRequest){
  var tab = JSON.parse(httpRequest.responseText);
  showgame(tab);
}

function showgame(gameTab){
  auto_box.innerHTML="";
  auto_box.style.display = "block";
  if(gameTab == false){
    auto_box.innerHTML="Aucun jeux";
  }else{
    gameTab.forEach((element) => auto_box.innerHTML=auto_box.innerHTML+"<p>"+element.titre+"</p>");
  }
}
