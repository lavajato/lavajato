<?php include "/controllers/PostsController.php" ?>

<?php
    $url = parse_url($_SERVER["REQUEST_URI"]);
    
    $path = split("/", $url["path"]);
    
    if(count($path) > 1) {
        
        if(empty($path[2])) {
            $nomeDaController = "PostsController";
        }
        else {
            $nomeDaController = $path[2] . "controller";
        }
        
        if(empty($path[3])) {
            $nomeDaAction = "Index";
        }else {
            $nomeDaAction = $path[3];
        }  
    }
    
    $params = array();
    
    if($_SERVER["REQUEST_METHOD"] == "GET") {
        $query = $_GET;
        foreach ($query as $key => $value) {
            if($key != "url")
                $params[] = $value;
        }
    }
    else {
        $params = $_POST;
    }
    
    if(class_exists($nomeDaController)) {
        $controller = new $nomeDaController();
        
        if(method_exists($controller, $nomeDaAction)) {
            $r = new ReflectionMethod($controller, $nomeDaAction);
            $parametrosDaAction = $r->getParameters();

            $r->invokeArgs($controller, $params);
        }
        else {
            echo "<h1>404 Not found </h1><p>Nenhuma action encontrada</p>";
        }
    }
    else {
        echo "<h1> 404 Not Found </h1> <p> Nenhuma controller encontrada </p>";
    }
?>