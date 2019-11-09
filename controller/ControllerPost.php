<?php
require_once File::build_path(array('model','ModelPost.php'));  
class ControllerPost{

    public static function readAll(){
        $controller = 'post';
        $view = 'list';
        $pagetitle='Liste des postes';

        $tab_post = ModelPost::getAllPost();

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
        $id = "";
        $auteur_id = "";
        $date_publication = "";
        $contenu = "";
        $jeu_id = "";
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

        if($_GET["emotion_id"] == "") {
          $emotion = new ModelEmotions($_GET);
          $emotion_id = $emotion->getId();
          $_GET["emotion_id"] = $emotion_id;
        }
        echo "je vais bien dans cette action";
        $post = new ModelPost($_GET);
        $post->save();
        self::readAll();    

        require_once File::build_path(array('view', 'view.php'));
        // self::readAll();
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
        $action = 'created';
        $option = 'readonly';
        $id = $v->getId();
        $auteur_id = $v->getAuteur_id();
        $date_publication = $v->getDate_publication();
        $contenu = $v->getContenu();
        $jeu_id = $v->getJeu_id();
        $titre = $v->getTitre();
        $emotion_id = $v->getEmotion_id();
        $emotion = ModelEmotions::getEmotionById($emotion_id);
        $nbUpvote = $v->getnbUpvote();
  
  
        $controller='post';
        $view='update';
        $pagetitle='Mise à jour du Post';
  
        require_once File::build_path(array('view', 'view.php'));
      }

    public static function updated() {
        $id = $_GET['id'];
        $controller ='jeu';
        $v = ModelPost::getPostById($id);
  
          
          if ($v->update($_GET) == false) {
            $view='error';
            $pagetitle='Erreur d\'Id';
  
            require_once File::build_path(array('view', 'view.php'));
  
          } else {
            $view='updated';
            $pagetitle='Post mis à jour !';
  
            require_once File::build_path(array('view', 'view.php'));
          } 
    }
}
?>