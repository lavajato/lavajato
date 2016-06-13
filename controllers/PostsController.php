<?php include_once "/repositories/RepositorioDePosts.php" ?>

<?php

    class PostsController {
        
        private $repositorioDePosts;
        
        public function __construct() {
            $this->repositorioDePosts = new RepositorioDePosts();
        }
        
        public function Index() {
            $posts = $this->repositorioDePosts->Listar(); 
            
            require "/Views/home.php";
        }
        
        public function Pegar($id) {
            $post = $this->repositorioDePosts->Pegar($id);
            
            require "/Views/post.php";
        }
        
        public function Inserir($titulo, $texto) {
            date_default_timezone_set("UTC");

            $post = new Post();
            $post->titulo = $titulo;
            $post->autor = "Lucílvio Lima";
            $post->data = date("F j, Y, g:i a");
            $post->texto = $texto;
            
            $this->repositorioDePosts->Inserir($post);
            
            return $this->Index();
        }
    }

?>