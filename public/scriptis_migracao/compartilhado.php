<?php

function deb($obj, $die = false)
{
	echo '<pre>'.print_r( $obj, 1 ).'</pre>';
	if($die) die;
}

/* ################################# SETUP CONEXÕES BANCO ################################# */
$legado_servidor 	= 'localhost';
$legado_usuario 	= 'root';
$legado_senha 		= '';
$legado_banco 		= 'senar-rs-legado';
$legado_port 		= 6969;
$legado_mysqli = new mysqli($legado_servidor, $legado_usuario, $legado_senha, $legado_banco, $legado_port);

$novo_servidor 	= 'mysql873.umbler.com';
$novo_usuario 	= 'senar_dsv';
$novo_senha 		= 'rDCx56ad)[';
$novo_banco 		= 'senar_dsv';
$novo_port 		= 41890;
$novo_mysqli = new mysqli($novo_servidor, $novo_usuario, $novo_senha, $novo_banco, $novo_port);



/* ################################# FUNÇÕES ################################# */


function slugify($txt){

   /* Get rid of accented characters */
   $search = explode(",","ç,æ,œ,á,é,í,ó,ú,à,è,ì,ò,ù,ä,ë,ï,ö,ü,ÿ,â,ê,î,ô,û,å,e,i,ø,u");
   $replace = explode(",","c,ae,oe,a,e,i,o,u,a,e,i,o,u,a,e,i,o,u,y,a,e,i,o,u,a,e,i,o,u");
   $txt = str_replace($search, $replace, $txt);

   /* Lowercase all the characters */
   $txt = strtolower($txt);

   /* Avoid whitespace at the beginning and the ending */
   $txt = trim($txt);

   /* Replace all the characters that are not in a-z or 0-9 by a hyphen */
   $txt = preg_replace("/[^a-z0-9]/", "-", $txt);
   /* Remove hyphen anywhere it's more than one */
   $txt = preg_replace("/[\-]+/", '-', $txt);
   return $txt;   
}