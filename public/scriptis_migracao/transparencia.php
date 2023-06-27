<?php 

include "./compartilhado.php";

$transparencias = $legado_mysqli->query('SELECT * FROM WT_TRANSPARENCIA_CONTEUDO');

foreach( $transparencias as $transparencia )
{


	$insert = "INSERT INTO `tranparencias`
			            (
			             `titulo`,
			             `texto`,
			             `created_at`,
			             `updated_at`)
				VALUES (
				        '".$transparencia['titulo']."',
				        '".$transparencia['texto']."',
				        now(),
				        now());";
	


	if (!$novo_mysqli->query( $insert )){
    	
    	printf("<p>Errormessage: %s</p>\n", $novo_mysqli->error);    	
    	deb($transparencia);
    	die($insert);

	}else{
		
		echo "#################################".PHP_EOL;
		echo "#################################".PHP_EOL;
		echo "#################################".PHP_EOL;
		echo "Licitação cadastrada com sucesso - ".$novo_mysqli->insert_id.PHP_EOL;
		
		$insertedId = $novo_mysqli->insert_id;
		$transparencia_conteudo_itens = $legado_mysqli->query('SELECT * FROM WT_TRANSPARENCIA_CONTEUDOITEM WHERE id_transparencia ='.$transparencia['id'].';');

		foreach ($transparencia_conteudo_itens as $transparencia_conteudo_item) {
			
			$transparencia_conteudo_item_arquivo = json_encode(
											array(
												'download_link' => "tranparencias-arquivos\\\\legado\\\\".$transparencia['id']."\\\\".$transparencia_conteudo_item['id'].".pdf",
												'original_name'=> $transparencia_conteudo_item['id'].".pdf"
											)
										);

			$insert_transparencia_conteudo_item = "INSERT INTO `tranparencias_arquivos`
								            (`transparencia_id`,
								             `titulo`,
								             `arquivo`,
								             `created_at`,
								             `updated_at`)
								VALUES (".$insertedId.",
								        '".$transparencia_conteudo_item['titulo']."',
								        '[".$transparencia_conteudo_item_arquivo."]',
								        now(),
								        now());";


			if (!$novo_mysqli->query( $insert_transparencia_conteudo_item )){
    			printf("<p>Errormessage: %s</p>\n", $novo_mysqli->error);
    			deb($transparencia_conteudo_item);
    			die($insert_transparencia_conteudo_item);
			}else{
				echo "Licitação Arquivo cadastrado com sucesso".PHP_EOL;
			}									    

		}	


	}

}















