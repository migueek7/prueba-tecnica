<?php 
class LinkModel {

    static public function linkPage($link) 
    {

        $title = 'Prueba Tecnica FrontEnd';

        if($link == 'home'){
            $respuesta = [
				"page" => "views/pages/home.php",
				"title" => $title
			];
        }elseif($link[0] == "home" || $link[0] == "cart")
		{	
			$respuesta = [
				"page" => "views/pages/$link[0].php",
				"title" => $title
			];
		}
		else
		{
			$respuesta = [
				"page" => "views/pages/error404.php",
				"title" => "Error 404"
			];
		}

		return $respuesta;

    }
}