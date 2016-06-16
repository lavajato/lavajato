<?php 

namespace senac\lavajato\utils\web;

use \senac\lavajato\AppConfig;

class WebUtils {

    public static function ImprimirRota($rota) {
        echo (AppConfig::$caminhoRelativo . $rota);
    }

    public static function PegarRota($rota) {
        return (AppConfig::$caminhoRelativo . $rota);
    }

    public static function PegarAsset($caminho) {
        echo(AppConfig::$assets . $caminho); 
    }

    public static function Tabela($tipo, $registrosDoTipo, $opcoes = null) {
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
                $tabela = $tabela."<th> op </th>";
            }
        }

        $tabela = $tabela."</tr></thead><tbody>";

        if (!isset($registrosDoTipo) || $registrosDoTipo == null || empty($registrosDoTipo)) {
            $tabela = $tabela."<tr><td> Nenhum registro encontrado. </tr></td>";
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
                    $tabela = $tabela."<td> <a href='" . $valor ."/" . $propriedade->getValue($registro) . "'>". $nome ." </td>";
                }
            }

            $tabela = $tabela."</tr>";
        }

        $tabela = $tabela."</tbody></table>";

        echo $tabela;
    }

}

// <table class="table table-hover">
//                     <thead>
//                         <tr>
//                             <th>#</th>
//                             <th>Data</th>
//                             <th>User</th>
//                             <th>Value</th>
//                         </tr>
//                     </thead>
//                     <tbody>
//                         <tr>
//                             <td>1</td>
//                             <td><span class="pie" style="display: none;">0.52,1.041</span>
//                                 <svg class="peity" height="16" width="16">
//                                     <path d="M 8 8 L 8 0 A 8 8 0 0 1 14.933563796318165 11.990700825968545 Z" fill="#1ab394"></path>
//                                     <path d="M 8 8 L 14.933563796318165 11.990700825968545 A 8 8 0 1 1 7.999999999999998 0 Z" fill="#d7d7d7"></path>
//                                 </svg>
//                             </td>
//                             <td>Samantha</td>
//                             <td class="text-navy"> <i class="fa fa-level-up"></i> 40% </td>
//                         </tr>
//                         <tr>
//                             <td>2</td>
//                             <td><span class="pie" style="display: none;">226,134</span>
//                                 <svg class="peity" height="16" width="16">
//                                     <path d="M 8 8 L 8 0 A 8 8 0 1 1 2.2452815972907922 13.55726696367198 Z" fill="#1ab394"></path>
//                                     <path d="M 8 8 L 2.2452815972907922 13.55726696367198 A 8 8 0 0 1 7.999999999999998 0 Z" fill="#d7d7d7"></path>
//                                 </svg>
//                             </td>
//                             <td>Jacob</td>
//                             <td class="text-warning"> <i class="fa fa-level-down"></i> -20% </td>
//                         </tr>
//                         <tr>
//                             <td>3</td>
//                             <td><span class="pie" style="display: none;">0.52/1.561</span>
//                                 <svg class="peity" height="16" width="16">
//                                     <path d="M 8 8 L 8 0 A 8 8 0 0 1 14.933563796318165 11.990700825968545 Z" fill="#1ab394"></path>
//                                     <path d="M 8 8 L 14.933563796318165 11.990700825968545 A 8 8 0 1 1 7.999999999999998 0 Z" fill="#d7d7d7"></path>
//                                 </svg>
//                             </td>
//                             <td>Damien</td>
//                             <td class="text-navy"> <i class="fa fa-level-up"></i> 26% </td>
//                         </tr>
//                     </tbody>
//                 </table>
// <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
//                 <ul class="pagination">
//                     <li class="paginate_button previous disabled" aria-controls="DataTables_Table_0" tabindex="0" id="DataTables_Table_0_previous"><a href="#">Previous</a></li>
//                     <li class="paginate_button active" aria-controls="DataTables_Table_0" tabindex="0"><a href="#">1</a></li>
//                     <li class="paginate_button " aria-controls="DataTables_Table_0" tabindex="0"><a href="#">2</a></li>
//                     <li class="paginate_button " aria-controls="DataTables_Table_0" tabindex="0"><a href="#">3</a></li>
//                     <li class="paginate_button " aria-controls="DataTables_Table_0" tabindex="0"><a href="#">4</a></li>
//                     <li class="paginate_button " aria-controls="DataTables_Table_0" tabindex="0"><a href="#">5</a></li>
//                     <li class="paginate_button " aria-controls="DataTables_Table_0" tabindex="0"><a href="#">6</a></li>
//                     <li class="paginate_button next" aria-controls="DataTables_Table_0" tabindex="0" id="DataTables_Table_0_next"><a href="#">Next</a></li>
//                 </ul>
//             </div>

?>