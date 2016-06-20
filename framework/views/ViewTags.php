<?php 

namespace senac\framework\views;

class ViewTags {

    public static function layout($layout) {
        include_once($layout);
    }

    public static function bloco($bloco) {
        echo isset($GLOBALS[$bloco]) ? $GLOBALS[$bloco] : "";
    }

    public static function iniciarBloco($bloco) {
        $GLOBALS[$bloco] = "";
        ob_start();
    }

    public static function terminarBloco($bloco) {
        $GLOBALS[$bloco] = ob_get_clean();
    }

    public static function actionLink($rota) {
        echo($rota);
    }

    public static function tabela($tipo, $registrosDoTipo, $opcoes = null) {
        if (!isset($tipo) || $tipo == null) {
            $tabela = "<table><thead><tr><th></th></tr></thead><tbody><tr><td> Bind não foi possível."." Verifique o tipo da fonte de dados </td></tr></tbody></table>";

            echo $tabela;
            return;
        }

        $tabela = "<table class='table table-hover table-striped'><thead><tr>";

        $reflexaoDaClasse = new\ReflectionClass($tipo);
        $propriedadesDoTipo = $reflexaoDaClasse->getProperties();

        foreach($propriedadesDoTipo as $propriedade) {
            $tabela = $tabela."<th>".$propriedade->getName()."</th>";
        }

        if ($opcoes != null && !empty($opcoes)) {
            foreach($opcoes as $opcao) {
                $tabela = $tabela."<th></th>";
            }
        }

        $tabela = $tabela."</tr></thead><tbody>";

        if (!isset($registrosDoTipo) || $registrosDoTipo == null || empty($registrosDoTipo)) {
            $tabela = $tabela."<tr><td colspan='" . count($propriedadesDoTipo + $opcoes) . "'> Nenhum registro encontrado. </tr></td>";
            $tabela = $tabela."</tbody></table>";

            echo $tabela;
            return;
        }

        foreach($registrosDoTipo as $registro) {
            $reflexaoDoObjeto = new\ReflectionClass($registro);
            $propriedades = $reflexaoDoObjeto->getProperties();
            $tabela = $tabela."<tr>";

            foreach($propriedades as $propriedade) {
                $propriedade->setAccessible(true);
                $tabela = $tabela."<td>".$propriedade->getValue($registro)."</td>";

            }

            if ($opcoes != null && !empty($opcoes)) {
                foreach($opcoes as $nome => $valor) {
                    $propriedade = $reflexaoDoObjeto->getProperty("id");
                    $propriedade->setAccessible(true);
                    $tabela = $tabela."<td> <a href='".$valor."/".$propriedade->getValue($registro)."'> <span class='label label-primary'>".$nome."</span> </td>";
                }
            }

            $tabela = $tabela."</tr>";
        }

        $tabela = $tabela."</tbody></table>";

        echo $tabela;
    }
}

?>