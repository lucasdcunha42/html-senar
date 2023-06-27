<?php 

include "./compartilhado.php";

$licitacoes = $legado_mysqli->query('SELECT * FROM WT_CONTEUDO_LICITACAO');

foreach( $licitacoes as $licitacao )
{

	$arquivo_edital = json_encode(
							array(
									'download_link' =>"licitacoes\\\\legado\\\\".$licitacao['id'].".pdf",
								  	'original_name'=>$licitacao['id'].".pdf"
							)
					);
	$arquivo_resultado = json_encode(
							array(
								'download_link' => "licitacoes\\\\legado\\\\res_".$licitacao['id'].".pdf",
							  	'original_name'=> "res_".$licitacao['id'].".pdf"								 
							)
						);

	$insert = "INSERT INTO `licitacoes`
	            (`status`,
	             `modalidade`,
	             `objeto`,
	             `numero_ano`,
	             `processo`,
	             `licitante`,
	             `arquivo_edital`,
	             `data_abertura`,
	             `arquivo_resultado`,
	             `created_at`,
	             `updated_at`)
		VALUES (".$licitacao['status'].",
		        '".$licitacao['modalidade']."',
		        '".$licitacao['objeto']."',		        
		        '".$licitacao['numeroano']."',		        
		        '".$licitacao['processo']."',
		        '".$licitacao['licitantes']."',
		        '[".$arquivo_edital."]',
		        '".$licitacao['data']."',
		        '[".$arquivo_resultado."]',
		        now(),
		        now());";
	


	if (!$novo_mysqli->query( $insert )){
    	
    	printf("<p>Errormessage: %s</p>\n", $novo_mysqli->error);    	
    	deb($licitacao);
    	die($insert);

	}else{
		
		echo "#################################".PHP_EOL;
		echo "#################################".PHP_EOL;
		echo "#################################".PHP_EOL;
		echo "Licitação cadastrada com sucesso - ".$novo_mysqli->insert_id.PHP_EOL;
		

		$licitacao_arquivos = $legado_mysqli->query('SELECT * FROM WT_CONTEUDO_LICITACAOITEM WHERE id_licitacao ='.$licitacao['id'].';');

		foreach ($licitacao_arquivos as $licitacao_arquivo) {
			
			$licitacao_arquivo_arquivo = json_encode(
											array(
												'download_link' => "licitacoes\\\\legado\\\\".$licitacao['id']."\\\\".$licitacao_arquivo['id'].".pdf",
												'original_name'=> $licitacao_arquivo['id'].".pdf"
											)
										);

			$insert_arquivo = "INSERT INTO `licitacoes_arquivos`
										(`licitacao_id`,
										 `titulo`,
										 `arquivo`,
										 `created_at`,
										 `updated_at`)
								VALUES (".$novo_mysqli->insert_id.",
									    '".$licitacao_arquivo['titulo']."',
									    '[".$licitacao_arquivo_arquivo."]',
									    now(),
									    now());";

			if (!$novo_mysqli->query( $insert_arquivo )){
    			printf("<p>Errormessage: %s</p>\n", $novo_mysqli->error);
    			deb($licitacao_arquivo);
    			die($insert_arquivo);
			}else{
				echo "Licitação Arquivo cadastrado com sucesso".PHP_EOL;
			}									    

		}	


	}

}















