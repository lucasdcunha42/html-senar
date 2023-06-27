<?php 

include "./compartilhado.php";


$wt_conteudo_categorias_contribuicoes = $legado_mysqli->query('SELECT * FROM wt_conteudo_categorias_contribuicoes');

foreach( $wt_conteudo_categorias_contribuicoes as $wt_conteudo_categorias_contribuicao )
{


	$insert = "INSERT INTO `contribuicoes_previdencia_rural_categoria`
				            (
				             `titulo`,
				             `status`,
				             `created_at`,
				             `updated_at`
				            )
					VALUES (
					        '".$wt_conteudo_categorias_contribuicao['nome']."',
					        1,
					        now(),
					        now()
					        );";
	


	if (!$novo_mysqli->query( $insert )){
    	
    	printf("<p>Errormessage: %s</p>\n", $novo_mysqli->error);    	
    	deb($wt_conteudo_categorias_contribuicao);
    	die($insert);

	}else{
		
		echo "#################################".PHP_EOL;
		echo "#################################".PHP_EOL;
		echo "#################################".PHP_EOL;
		echo "wt_conteudo_categorias_contribuicao cadastrada com sucesso - ".$novo_mysqli->insert_id.PHP_EOL;
		

		$wt_conteudo_contribuicoes = $legado_mysqli->query('SELECT * FROM wt_conteudo_contribuicoes WHERE categoria_id ='.$wt_conteudo_categorias_contribuicao['id'].';');
   		
   		$categ_id = $novo_mysqli->insert_id;

		foreach ($wt_conteudo_contribuicoes as $wt_conteudo_contribuicao) {
			
			$wt_conteudo_contribuicao_arquivo = "";

			if ($wt_conteudo_contribuicao['link'] == "") {

					$wt_conteudo_contribuicao_arquivo = json_encode(
											array(
												'download_link' => "contribuicoes-previdencia-rural\\\\legado\\\\".$wt_conteudo_contribuicao['id'].".pdf",
												'original_name'=> $wt_conteudo_contribuicao['id'].".pdf"
											)
										);
			}

			$insert_wt_conteudo_contribuicao = "INSERT INTO `contribuicoes_previdencia_rural`
												            (
												             `titulo`,
												             `download`,
												             `link`,
												             `status`,
												             `created_at`,
												             `updated_at`,
												             `categoria_id`)
													VALUES (
													        '".$wt_conteudo_contribuicao['titulo']."',
													        '[".$wt_conteudo_contribuicao_arquivo."]',
													        '".$wt_conteudo_contribuicao['link']."',
													        1,
													        now(),
													        now(),
													        ".$categ_id.");";


			if (!$novo_mysqli->query( $insert_wt_conteudo_contribuicao )){
    			printf("<p>Errormessage: %s</p>\n", $novo_mysqli->error);
    			deb($wt_conteudo_contribuicao);
    			die($insert_wt_conteudo_contribuicao);
			}else{
				echo "Licitação Arquivo cadastrado com sucesso".PHP_EOL;
			}									    

		}	


	}

}















