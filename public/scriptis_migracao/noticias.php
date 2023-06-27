<?php

include "./compartilhado.php";


$noticias = $legado_mysqli->query('SELECT * FROM WT_NOTICIA_NOTICIA');

foreach( $noticias as $key => $noticia )
{
	$images = scandir("C:\\xampp\\htdocs\\senar-rs\\storage\\app\\public\\noticias\\wt_noticia\\".$noticia['id']."\\imagem");
	$galeria = array();
	foreach ($images as $key => $image) {
		if ($image != '.' && $image != '..') {
			$galeria[] = "noticias\\\\wt_noticia\\\\".$noticia['id']."\\\\imagem\\\\".$image;
		}
	}

	
	$imagemDestque = "noticias\\\\wt_noticia\\\\".$noticia['id']."_list.jpg";		
	// if (count($galeria) > 0) {
	// 	$imagemDestque = $galeria[0];
	// }

	
	$galeria =  json_encode($galeria);

	$insert = "INSERT INTO `noticias`
	        (
                 `titulo`,
                 `subtitulo`,
                 `texto`,
                 `status`,
                 `categoria`,
                 `galeria`,
                 `imagem`,
                 `slug`,                 
                 `created_at`,
                 `updated_at`
            )
	        VALUES (
	            '".$noticia['nome']."',
	            '".$noticia['subtitulo']."',
	            '".$noticia['texto']."',
	            1,
	            1,
	            '".$galeria."',
	            '".$imagemDestque."',
	            '".slugify($noticia['nome'])."',
	            '".$noticia['data']."',
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















