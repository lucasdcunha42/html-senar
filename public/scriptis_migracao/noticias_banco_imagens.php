<?php 

include "./compartilhado.php";


$noticias = $legado_mysqli->query('SELECT * FROM wt_salaimprensa_bancoimagem');

foreach( $noticias as $key => $noticia )
{


	$images = scandir("C:\\xampp\\htdocs\\senar-rs\\storage\\app\\public\\noticias\\wt_bancoimagem\\".$noticia['id']);
	$galeria = array();	
	foreach ($images as $key => $image) {
		if ($image != '.' && $image != '..') {	
			$galeria[] = "noticias\\\\wt_bancoimagem\\\\".$noticia['id']."\\\\".$image;
		}
	}
	
	$imagemDestque = "";
	if (count($galeria) > 0) {
		$imagemDestque = $galeria[0];
	}


	$galeria =  json_encode($galeria);
	
	$insert = "INSERT INTO `noticias`
	        (
                 `titulo`,
                `status`,
                 `categoria`,
                 `galeria`,
                 `imagem`,
                 `created_at`,
                 `updated_at`
            )
	        VALUES (
	            '".$noticia['nome']."',	            
	            1,
	            1,
	            '".$galeria."',
	            '".$imagemDestque."',
	            now(),
	            now()
	        );";
	
	// die($insert);

	if (!$novo_mysqli->query( $insert )){
    	printf("<p>Errormessage: %s</p>\n", $mysqli->error);
    	deb($item);
	}else{
		echo "Noticia cadastrada com sucesso".PHP_EOL;
	}

}















