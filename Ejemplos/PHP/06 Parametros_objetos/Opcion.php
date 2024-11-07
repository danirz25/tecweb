<?php
class opcion{

        private $titulo;
        private $enlace;
        private $colorfondo;
  
    public function __construct($title, $link, $bcolor){
        $this->titulo = $title;
        $this->enlace = $link;
        $this->colorfondo = $bcolor;
        //echo "Opción";
    }

    public function graficar(){
        $estilo = 'background-color:'.$this->colorfondo;
        echo '<a style="'.$estilo.'" 
        href="'.$this->enlace.'">'.$this->titulo.'</a>';
    }



}

?>