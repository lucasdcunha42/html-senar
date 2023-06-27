<?php 

include "./compartilhado.php";


$wt_osenar_relatorios_tipos = $legado_mysqli->query('SELECT * FROM wt_osenar_relatorios_tipo');

foreach( $wt_osenar_relatorios_tipos as $wt_osenar_relatorios_tipo )
{


	$insert = "INSERT INTO `relatorios_atvidades_categorias`
				            (
				             `titulo`,
				             `texto`,
				             `status`,
				             `created_at`,
				             `updated_at`)
					VALUES (
					        '".$wt_osenar_relatorios_tipo['titulo']."',
					        '".$wt_osenar_relatorios_tipo['descricao']."',
					        ".$wt_osenar_relatorios_tipo['status'].",
					        now(),
					        now());";
	


	if (!$novo_mysqli->query( $insert )){
    	
    	printf("<p>Errormessage: %s</p>\n", $novo_mysqli->error);    	
    	deb($wt_osenar_relatorios_tipo);
    	die($insert);

	}else{
		
		echo "#################################".PHP_EOL;
		echo "#################################".PHP_EOL;
		echo "#################################".PHP_EOL;
		echo "wt_osenar_relatorios_tipo cadastrada com sucesso - ".$novo_mysqli->insert_id.PHP_EOL;
		

		$wt_osenar_relatorios = $legado_mysqli->query('SELECT * FROM wt_osenar_relatorios WHERE id_tipo ='.$wt_osenar_relatorios_tipo['id'].';');
   		
   		$categ_id = $novo_mysqli->insert_id;

		foreach ($wt_osenar_relatorios as $wt_osenar_relatorio) {
			
			$wt_osenar_relatorio_arquivo = "";

			if (is_null($wt_osenar_relatorio['link'])) {

					$wt_osenar_relatorio_arquivo = json_encode(
											array(
												'download_link' => "relatorios-atvidades\\\\relatorio\\\\".$wt_osenar_relatorios_tipo['id']."\\\\".$wt_osenar_relatorio['id'].".pdf",
												'original_name'=> $wt_osenar_relatorio['id'].".pdf"
											)
										);
			}

			$insert_wt_osenar_relatorio = "INSERT INTO `relatorios_atvidades`
										            (
										             `titulo`,
										             `download`,
										             `status`,
										             `categoria_id`,
										             `created_at`,
										             `updated_at`,
										            `link`)
											VALUES (
											        '".$wt_osenar_relatorio['titulo']."',
											        '".$wt_osenar_relatorio_arquivo."',
											        ".$wt_osenar_relatorio['status'].",
											        ".$categ_id.",
											        now(),
											        now(),
											        '".$wt_osenar_relatorio['link']."');";


			if (!$novo_mysqli->query( $insert_wt_osenar_relatorio )){
    			printf("<p>Errormessage: %s</p>\n", $novo_mysqli->error);
    			deb($wt_osenar_relatorio);
    			die($insert_wt_osenar_relatorio);
			}else{
				echo "Licitação Arquivo cadastrado com sucesso".PHP_EOL;
			}									    

		}	


	}

}















