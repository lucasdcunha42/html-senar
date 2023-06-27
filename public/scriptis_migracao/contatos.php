<?php 

include "./compartilhado.php";

$wt_contato_assuntos = $legado_mysqli->query('SELECT * FROM wt_contato_assunto');

foreach( $wt_contato_assuntos as $wt_contato_assunto )
{


	$insert = "INSERT INTO `contatos_assuntos`
				            (
				             `assunto`,
				             `created_at`,
				             `updated_at`
				            )
					VALUES (
					        '".$wt_contato_assunto['nome']."',
					        now(),
					        now()
					        );";
	


	if (!$novo_mysqli->query( $insert )){
    	
    	printf("<p>Errormessage: %s</p>\n", $novo_mysqli->error);    	
    	deb($wt_contato_assunto);
    	die($insert);

	}else{
		
		echo "#################################".PHP_EOL;
		echo "#################################".PHP_EOL;
		echo "#################################".PHP_EOL;
		echo "wt_contato_assunto cadastrada com sucesso - ".$novo_mysqli->insert_id.PHP_EOL;
		

		$wt_contato_assuntoemails = $legado_mysqli->query('SELECT * FROM wt_contato_assuntoemail WHERE id_assunto ='.$wt_contato_assunto['id'].';');
   		
   		$insert_id = $novo_mysqli->insert_id;

		foreach ($wt_contato_assuntoemails as $wt_contato_assuntoemail) {
			
			$insert_wt_contato_assuntoemail = "INSERT INTO `contatosa_assuntos_emails`
											            (
											             `assunto_id`,
											             `email`,
											             `created_at`,
											             `updated_at`
											             )
												VALUES (
												        ".$insert_id.",
												        '".$wt_contato_assuntoemail['email']."',
												        now(),
												        now()
												        );";


			if (!$novo_mysqli->query( $insert_wt_contato_assuntoemail )){
    			printf("<p>Errormessage: %s</p>\n", $novo_mysqli->error);
    			deb($wt_contato_assuntoemail);
    			die($insert_wt_contato_assuntoemail);
			}else{
				echo "Licitação Arquivo cadastrado com sucesso".PHP_EOL;
			}									    

		}	


	}

}















