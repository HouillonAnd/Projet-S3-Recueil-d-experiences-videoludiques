<?php
require_once File::build_path(array('model','ModelPost.php'));  
require_once File::build_path(array('model','ModelUpvote.php')); 
class ControllerPost{

    public static function readAll(){
        $controller = 'post';
        $view = 'list';
        $pagetitle='Liste des postes';

        $tab_post = ModelPost::getAllPost();

        require_once File::build_path(array('view', 'view.php'));
    }
     public static function readAllFresh(){
        $controller = 'post';
        $view = 'list';
        $pagetitle='Liste des postes';

        $tab_post = ModelPost::getAlPost(1);

        require_once File::build_path(array('view', 'view.php'));
    }

    public static function readAllHot(){
        $controller = 'post';
        $view = 'list';
        $pagetitle='Liste des postes';

        $tab_post = ModelPost::getAlPost(2);

        require_once File::build_path(array('view', 'view.php'));
    }

    public static function read() {
    	$id = $_GET['id'];
      $p = ModelPost::getPostById($id);     //appel au modèle pour gerer la BD
      $controller ='post';
           
   		if ($p == false) {
        $view='error';
        $pagetitle='Erreur d\'id';

        require_once File::build_path(array('view', 'view.php'));

   		} else {
          $view='detail';//ne pas oublier de rajouter le '.php' au moment du require dans view.php
          $pagetitle='Détails du post';

          require_once File::build_path(array('view', 'view.php'));
   		}
    }

    public static function create() {
        $controller = 'post';
        $view = 'form';
        $pagetitle = 'Création d\'un post';
        $action = 'created';
        $option = 'required';
        $id = "";
        $auteur = ModelUser::getUserByLogin($_SESSION["login"]);
        $auteur_id = $auteur->getLogin();
        $date_publication = "";
        $contenu = "";
        $jeu_id = "";
        $jeu = ModelJeu::getJeuById($jeu_id);
        $titre = "";
        $emotion_id = "";
        $emotion = ModelEmotions::getEmotionById($emotion_id);
        $nbUpvote = 0;

        require_once File::build_path(array('view', 'view.php'));
    }

    public static function created() {
        $controller='post';
        $view='created';
        $pagetitle='Post crée !';

        //création de la nouvelle émotion
        $emotion = new ModelEmotions($_GET);
        $emotion->save();
        $emotion_id = ModelEmotions::getRecentEmotionId();
        $_GET["emotion_id"] = $emotion_id;

        //récupération de l'identifiant du jeu
        $jeu = ModelJeu::getJeuByTitle($_GET['jeu_titre']);
        if($jeu != false){
          $jeu_id = $jeu->getID();
          $_GET['jeu_id'] = $jeu_id;
          
          //création du nouveau post
          $post = new ModelPost($_GET);
          $post->save();
          self::readAll();    
        }else{
          self::create();
        }
       
    }

    public static function error() {
        $controller='post';
        $view='error';
        $pagetitle='Page d\'erreur';
  
        require_once File::build_path(array('view', 'view.php'));
    }

    public static function delete() {
        $id = $_GET['id'];
        $v = ModelPost::deleteById($id);
        $controller='post';

        if ($v == false) {
          $view='error';
          $pagetitle='Erreur d\'Id';

          require_once File::build_path(array('view', 'view.php'));

        } else {
          $view='deleted';
          $pagetitle='Délétion du post';

          require_once File::build_path(array('view', 'view.php'));
      }
    }

    public static function update() {
        $id = $_GET['id'];
        $v = ModelPost::getPostById($id); 
        $action = 'updated';
        $option = 'readonly';
        $option = 'readonly';
        $id = $v->getId();
        $auteur_id = $v->getAuteur_id();
        $date_publication = $v->getDate_publication();
        $contenu = $v->getContenu();
        $jeu_id = $v->getJeu_id();
        $jeu = ModelJeu::getJeuById($jeu_id);
        $titre = $v->getTitre();
        $emotion_id = $v->getEmotion_id();
        $emotion = ModelEmotions::getEmotionById($emotion_id);
        $nbUpvote = $v->getnbUpvote();
  
  
        $controller='post';
        if(Session::is_admin() || Session::is_user($auteur_id)){
          $view='form';
          $pagetitle='Mise à jour du Post';
          require_once File::build_path(array('view', 'view.php'));
        }else{
          $view='error';
          $pagetitle='erreur d\'accès';
          require_once File::build_path(array('view', 'view.php'));
        }
      }

    public static function updated() {
        $id = $_GET['id'];
        $emotion_id = $_GET['emotion_id'];
        $controller ='jeu';
        $v = ModelPost::getPostById($id);
        $emotion = ModelEmotions::getEmotionById($emotion_id);
        $auteur_id = $v->getAuteur_id();

        if(Session::is_user($auteur_id)){
          if ($v->update($_GET) == false & $emotion->update($_GET) == false) {
            $view='error';
            $pagetitle='Erreur d\'Id';
            require_once File::build_path(array('view', 'view.php'));
          }else {
            self::readAll(); 
          }
        }else{
          $view='error';
          $pagetitle='Erreur d\'accès';
          require_once File::build_path(array('view', 'view.php'));
        }
    }

    public static function vote(){
      $id = $_GET["id"];
      $login = $_SESSION['login'];
      $post = ModelPost::getPostById($id);
      $vote = new ModelUpvote($login, $id);
      if($vote->checkvote() == false){
        $vote->save();
        echo  json_encode($post->vote(+1));
      }else{
        if($vote->delete() == true){
          echo  json_encode($post->vote(-1));
        }else{
          echo json_encode("falsedelet");
        }
      }
    }
}
?>
