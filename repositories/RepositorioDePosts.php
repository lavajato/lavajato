<?php include_once "/utils/Banco.php" ?>
<?php include_once "/models/Post.php" ?>

<?php 

    class RepositorioDePosts {
        private $conexao;
        
        public function __construct() {
            $this->conexao = Banco::AbrirConexao();
        } 
        
        public function __destruct() {
            Banco::FecharConexao();
        }
        
        public function Listar() {
            $query = $this->conexao->query("select * from post");

            $posts = array();

            while ($linha = $query->fetch()) {
                $posts[] = Banco::Bind(new Post(), $linha);
            }
            
            return $posts;
        }
        
        public function Pegar($id) {
            $query = $this->conexao->query("select * from post where id = $id");
            
            $linha = $query->fetch();
            return Banco::Bind(new Post(), $linha);
        }
        
        public function Inserir($post) {
            $query = $this->conexao->prepare("insert into post(titulo, autor, data, texto) values( :titulo, :autor, :data, :texto );");
            $query->bindValue(":titulo", $post->titulo);
            $query->bindValue(":autor", $post->autor);
            $query->bindValue(":data", $post->data);
            $query->bindValue(":texto", $post->texto);

            $query->execute();
        }
    }

?>