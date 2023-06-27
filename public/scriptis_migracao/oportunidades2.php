<?php 

include "./compartilhado.php";


$wt_osenar_trabalhe_conoscos = $legado_mysqli->query('SELECT * FROM wt_osenar_consultores');

foreach( $wt_osenar_trabalhe_conoscos as $wt_osenar_trabalhe_conosco )
{


	$insert = "INSERT INTO `oportunidades`
		            (
		             `titulo`,
		             `texto`,
		             `created_at`,
		             `updated_at`,		            
		             `categoria_id`,
		             `data_final_inscricao`,
		             `encerrado`,
		             `ordem`,
		             `status`,
		             `data_encerrado`)
			VALUES (
			        '".$wt_osenar_trabalhe_conosco['cargos']."',
			        'Edital: ".$wt_osenar_trabalhe_conosco['numero_edital']."',
			        now(),
			        now(),			        
			        2,
			        '".$wt_osenar_trabalhe_conosco['data_final_inscricao']."',
			        ".$wt_osenar_trabalhe_conosco['encerrado'].",
			        ".$wt_osenar_trabalhe_conosco['ordem'].",
			        ".$wt_osenar_trabalhe_conosco['status'].",
			        '".$wt_osenar_trabalhe_conosco['data_encerrado']."');";
	


	if (!$novo_mysqli->query( $insert )){
    	
    	printf("<p>Errormessage: %s</p>\n", $novo_mysqli->error);    	
    	deb($wt_osenar_trabalhe_conosco);
    	die($insert);

	}else{
		
		echo "#################################".PHP_EOL;
		echo "#################################".PHP_EOL;
		echo "#################################".PHP_EOL;
		echo "wt_osenar_trabalhe_conosco cadastrada com sucesso - ".$novo_mysqli->insert_id.PHP_EOL;
		

		$wt_osenar_trabalhe_conosco_arquivos = $legado_mysqli->query('SELECT * FROM wt_osenar_consultores_arquivo WHERE id_consultores ='.$wt_osenar_trabalhe_conosco['id'].';');
   		
   		$insert_id = $novo_mysqli->insert_id;

		foreach ($wt_osenar_trabalhe_conosco_arquivos as $wt_osenar_trabalhe_conosco_arquivo) {
			
			$wt_osenar_trabalhe_conosco_arquivo_arquivo = "";

			if ($wt_osenar_trabalhe_conosco_arquivo['link'] == "") {

					$wt_osenar_trabalhe_conosco_arquivo_arquivo = json_encode(
											array(
												'download_link' => "opotunidades-arquivos\\\\legado\\\\".$wt_osenar_trabalhe_conosco_arquivo['id'].".pdf",
												'original_name'=> $wt_osenar_trabalhe_conosco_arquivo['id'].".pdf"
											)
										);
			}

			$insert_wt_osenar_trabalhe_conosco_arquivo = "INSERT INTO `opotunidades_arquivos`
															            (
															             `oportunidade_id`,
															             `titulo`,
															             `arquivo`,
															             `created_at`,
															             `updated_at`,															            
															             `link`,
															             `ordem`,
															             `status`
															            )
																VALUES (
																        ".$insert_id.",
																        '".$wt_osenar_trabalhe_conosco_arquivo['titulo']."',
																        '[".$wt_osenar_trabalhe_conosco_arquivo_arquivo."]',
																        now(),
																        now(),																        
																        '".$wt_osenar_trabalhe_conosco_arquivo['link']."',
																        ".$wt_osenar_trabalhe_conosco_arquivo['ordem'].",
																        ".$wt_osenar_trabalhe_conosco_arquivo['status']."
																    );";


			if (!$novo_mysqli->query( $insert_wt_osenar_trabalhe_conosco_arquivo )){
    			printf("<p>Errormessage: %s</p>\n", $novo_mysqli->error);
    			deb($wt_osenar_trabalhe_conosco_arquivo);
    			die($insert_wt_osenar_trabalhe_conosco_arquivo);
			}else{
				echo "Licitação Arquivo cadastrado com sucesso".PHP_EOL;
			}									    

		}	


	}

}















