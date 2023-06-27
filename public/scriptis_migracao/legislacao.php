<?php 

include "./compartilhado.php";


$legislacao_categorias = $legado_mysqli->query('SELECT * FROM wt_osenar_legislacao_categoria');

foreach( $legislacao_categorias as $legislacao_categoria )
{


	$insert = "INSERT INTO `legislacoes_categorias`
			            (
			             `titulo`,
			             `status`,
			          	 `created_at`,
						 `updated_at`
			             )
				VALUES (
				        '". $legislacao_categoria['titulo']."',
				        '". $legislacao_categoria['status']."',
				        now(),
				        now()
				        );";
	


	if (!$novo_mysqli->query( $insert )){
    	
    	printf("<p>Errormessage: %s</p>\n", $novo_mysqli->error);    	
    	deb($legislacao_categoria);
    	die($insert);

	}else{
		
		echo "#################################".PHP_EOL;
		echo "#################################".PHP_EOL;
		echo "#################################".PHP_EOL;
		echo "Licitação cadastrada com sucesso - ".$novo_mysqli->insert_id.PHP_EOL;
		

		$categorias = $legado_mysqli->query('SELECT * FROM wt_osenar_legislacao WHERE id_categoria ='.$legislacao_categoria['id'].';');
   		
   		$categ_id = $novo_mysqli->insert_id;

		foreach ($categorias as $categoria) {
			
			$categoria_arquivo = "";

			if (is_null($categoria['link'])) {

				$categoria_arquivo = json_encode(
										array(
											'download_link' => "tranparencias-arquivos\\\\legado\\\\".$legislacao_categoria['id']."\\\\".$categoria['id'].".pdf",
											'original_name'=> $categoria['id'].".pdf"
										)
									);
			}

			$insert_categoria_arquivo = "INSERT INTO `legislacoes`
									            (
									             `titulo`,
									             `link`,
									             `status`,
									             `categoria_id`,
									             `created_at`,
									             `updated_at`,
									             `arquivo`)
										VALUES (
										        '".$categoria['titulo']."',
										        '".$categoria['link']."',
										        ".$categoria['status'].",
										        ".$categ_id.",
										        now(),
										        now(),
										        '[".$categoria_arquivo."]');";


			if (!$novo_mysqli->query( $insert_categoria_arquivo )){
    			printf("<p>Errormessage: %s</p>\n", $novo_mysqli->error);
    			deb($categoria);
    			die($insert_categoria_arquivo);
			}else{
				echo "Licitação Arquivo cadastrado com sucesso".PHP_EOL;
			}									    

		}	


	}

}















