/*
SQLyog Ultimate v9.02 
MySQL - 5.5.5-10.1.30-MariaDB : Database - senar-rs
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `apoiadores` */

DROP TABLE IF EXISTS `apoiadores`;

CREATE TABLE `apoiadores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `apoiadores` */

insert  into `apoiadores`(`id`,`logo`,`link`,`created_at`,`updated_at`,`deleted_at`) values (1,'apoiadores\\May2021\\jZFNbwxx3FPCVO5KuHOA.png','apoiadores','2021-05-03 17:22:18','2021-05-03 17:22:18',NULL);

/*Table structure for table `banners` */

DROP TABLE IF EXISTS `banners`;

CREATE TABLE `banners` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Imagem` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ordem` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `pagina_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `banners` */

insert  into `banners`(`id`,`Imagem`,`titulo`,`subtitulo`,`link`,`ordem`,`status`,`pagina_id`,`created_at`,`updated_at`,`deleted_at`) values (1,'banners\\May2021\\mtQ3pB3sxtFrGMtfF3Ow.png','Titulo','Subtitulo','Link',0,1,1,'2021-05-02 14:10:06','2021-05-02 14:22:29',NULL);

/*Table structure for table `blocos_estaticos` */

DROP TABLE IF EXISTS `blocos_estaticos`;

CREATE TABLE `blocos_estaticos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagem` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ordem` int(11) DEFAULT NULL,
  `pagina_sessao_id` int(11) DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `galeria_fotos` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `conteudo` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `blocos_estaticos` */

insert  into `blocos_estaticos`(`id`,`titulo`,`imagem`,`video`,`ordem`,`pagina_sessao_id`,`link`,`galeria_fotos`,`created_at`,`updated_at`,`deleted_at`,`conteudo`) values (1,'Titulo','blocos-estaticos\\May2021\\2VAH2k3ICEZnCv8u9w3W.png','Video',0,1,'Link','[\"blocos-estaticos\\\\May2021\\\\2wgIQCxh3oG7ustePJCN.png\",\"blocos-estaticos\\\\May2021\\\\ReRdPhI45aIwHA2n4adl.png\",\"blocos-estaticos\\\\May2021\\\\MWJxJco4vFQCpJQbJAKI.png\",\"blocos-estaticos\\\\May2021\\\\Cf3XB4rWKPwD2iRQOGyE.png\",\"blocos-estaticos\\\\May2021\\\\wU83S9fLjDShyyJzODWQ.png\",\"blocos-estaticos\\\\May2021\\\\p0cTMhdLQ310ArC6ycOY.png\"]','2021-05-02 15:30:00','2021-05-02 15:30:00',NULL,'Conteúdo');

/*Table structure for table `contatos_assuntos` */

DROP TABLE IF EXISTS `contatos_assuntos`;

CREATE TABLE `contatos_assuntos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `assunto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `contatos_assuntos` */

insert  into `contatos_assuntos`(`id`,`assunto`,`created_at`,`updated_at`,`deleted_at`) values (1,'Add Contato Assunto','2021-05-03 17:58:19','2021-05-03 17:58:19',NULL);

/*Table structure for table `contatosa_assuntos_emails` */

DROP TABLE IF EXISTS `contatosa_assuntos_emails`;

CREATE TABLE `contatosa_assuntos_emails` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `assunto_id` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `contatosa_assuntos_emails` */

insert  into `contatosa_assuntos_emails`(`id`,`assunto_id`,`email`,`created_at`,`updated_at`,`deleted_at`) values (1,1,'E-mai','2021-05-03 18:06:41','2021-05-03 18:06:41',NULL);

/*Table structure for table `contribuicoes_previdencia_rural` */

DROP TABLE IF EXISTS `contribuicoes_previdencia_rural`;

CREATE TABLE `contribuicoes_previdencia_rural` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `download` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `contribuicoes_previdencia_rural` */

insert  into `contribuicoes_previdencia_rural`(`id`,`titulo`,`download`,`link`,`status`,`created_at`,`updated_at`,`deleted_at`) values (1,'Titulo','[{\"download_link\":\"contribuicoes-previdencia-rural\\\\May2021\\\\6u7lpr9B4RAteGGgrGuo.png\",\"original_name\":\"cnaBrasil.png\"}]','http://googole.com.br/',1,'2021-05-03 14:29:26','2021-05-03 14:29:26',NULL);

/*Table structure for table `cursos` */

DROP TABLE IF EXISTS `cursos`;

CREATE TABLE `cursos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `data_inicio` date DEFAULT NULL,
  `data_fim` date DEFAULT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descricao` text COLLATE utf8mb4_unicode_ci,
  `desc_fase_evento` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regiaoevento` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cod_curso` bigint(20) DEFAULT NULL,
  `areadeinteresse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modalidade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `situacao` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cargahorariatotal` int(11) DEFAULT NULL,
  `escolaridade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `minimodeparticipantes` int(11) DEFAULT NULL,
  `maximodeparticipantes` int(11) DEFAULT NULL,
  `conteudoprogramatico` text COLLATE utf8mb4_unicode_ci,
  `imagem` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cursos` */

insert  into `cursos`(`id`,`data_inicio`,`data_fim`,`titulo`,`descricao`,`desc_fase_evento`,`regiaoevento`,`cod_curso`,`areadeinteresse`,`modalidade`,`situacao`,`cargahorariatotal`,`escolaridade`,`idade`,`minimodeparticipantes`,`maximodeparticipantes`,`conteudoprogramatico`,`imagem`,`created_at`,`updated_at`,`deleted_at`) values (1,'2021-05-02','2021-05-05','Titulo','Descrição','Descrição Fase Evento','Região Evento',123123,'Área de Interesse','Modalidade','Situação',1,'Escolaridade','Idade Idade',1,2,'Conteúdo programático','cursos\\May2021\\JICmDpUd6DfszMAphwNX.png','2021-05-02 16:59:25','2021-05-02 16:59:25',NULL);

/*Table structure for table `cursos_depoimentos` */

DROP TABLE IF EXISTS `cursos_depoimentos`;

CREATE TABLE `cursos_depoimentos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `texto` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `curso_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cursos_depoimentos` */

insert  into `cursos_depoimentos`(`id`,`texto`,`created_at`,`updated_at`,`deleted_at`,`curso_id`) values (1,'Add Depoimento de curso','2021-05-02 16:43:05','2021-05-02 16:59:39',NULL,1);

/*Table structure for table `cursos_requisitos` */

DROP TABLE IF EXISTS `cursos_requisitos`;

CREATE TABLE `cursos_requisitos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `texto` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `curso_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cursos_requisitos` */

insert  into `cursos_requisitos`(`id`,`texto`,`created_at`,`updated_at`,`deleted_at`,`curso_id`) values (1,'Add Cursos Requisito','2021-05-02 16:37:05','2021-05-02 16:59:54',NULL,1);

/*Table structure for table `data_rows` */

DROP TABLE IF EXISTS `data_rows`;

CREATE TABLE `data_rows` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `data_type_id` int(10) unsigned NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `browse` tinyint(1) NOT NULL DEFAULT '1',
  `read` tinyint(1) NOT NULL DEFAULT '1',
  `edit` tinyint(1) NOT NULL DEFAULT '1',
  `add` tinyint(1) NOT NULL DEFAULT '1',
  `delete` tinyint(1) NOT NULL DEFAULT '1',
  `details` text COLLATE utf8mb4_unicode_ci,
  `order` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `data_rows_data_type_id_foreign` (`data_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=317 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `data_rows` */

insert  into `data_rows`(`id`,`data_type_id`,`field`,`type`,`display_name`,`required`,`browse`,`read`,`edit`,`add`,`delete`,`details`,`order`) values (1,1,'id','number','ID',1,0,0,0,0,0,NULL,1),(2,1,'name','text','Name',1,1,1,1,1,1,NULL,2),(3,1,'email','text','Email',1,1,1,1,1,1,NULL,3),(4,1,'password','password','Password',1,0,0,1,1,0,NULL,4),(5,1,'remember_token','text','Remember Token',0,0,0,0,0,0,NULL,5),(6,1,'created_at','timestamp','Created At',0,1,1,0,0,0,NULL,6),(7,1,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,7),(8,1,'avatar','image','Avatar',0,1,1,1,1,1,NULL,8),(9,1,'user_belongsto_role_relationship','relationship','Role',0,1,1,1,1,0,'{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":0}',10),(10,1,'user_belongstomany_role_relationship','relationship','Roles',0,1,1,1,1,0,'{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}',11),(11,1,'settings','hidden','Settings',0,0,0,0,0,0,NULL,12),(12,2,'id','number','ID',1,0,0,0,0,0,NULL,1),(13,2,'name','text','Name',1,1,1,1,1,1,NULL,2),(14,2,'created_at','timestamp','Created At',0,0,0,0,0,0,NULL,3),(15,2,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,4),(16,3,'id','number','ID',1,0,0,0,0,0,NULL,1),(17,3,'name','text','Name',1,1,1,1,1,1,NULL,2),(18,3,'created_at','timestamp','Created At',0,0,0,0,0,0,NULL,3),(19,3,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,4),(20,3,'display_name','text','Display Name',1,1,1,1,1,1,NULL,5),(21,1,'role_id','text','Role',1,1,1,1,1,1,NULL,9),(22,4,'id','text','Id',1,1,0,0,0,0,'{}',1),(27,4,'created_at','timestamp','Criado em',0,1,0,0,0,0,'{}',4),(28,4,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',5),(29,5,'id','text','Id',1,0,0,0,0,0,'{}',1),(39,5,'status','checkbox','Status',0,1,1,1,1,1,'{\"on\":\"Ativo\",\"off\":\"Inativo\",\"checked\":true}',7),(40,5,'created_at','timestamp','Criado Em',0,1,0,0,0,0,'{}',12),(41,5,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',9),(56,4,'titulo','text','Titulo',0,1,1,1,1,1,'{}',2),(57,4,'texto','text_area','Texto',0,1,1,1,1,1,'{}',3),(58,4,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,'{}',6),(59,5,'Imagem','image','Imagem',0,1,1,1,1,1,'{}',2),(60,5,'titulo','text','Titulo',0,1,1,1,1,1,'{}',3),(61,5,'subtitulo','text','Subtitulo',0,1,1,1,1,1,'{}',4),(62,5,'link','text','Link',0,1,1,1,1,1,'{}',5),(63,5,'ordem','number','Ordem',0,1,1,1,1,1,'{}',6),(64,5,'pagina_id','hidden','Pagina Id',0,1,1,1,1,1,'{}',8),(65,5,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,'{}',10),(66,5,'banner_belongsto_pagina_relationship','relationship','Página',0,1,1,1,1,1,'{\"model\":\"App\\\\Pagina\",\"table\":\"paginas\",\"type\":\"belongsTo\",\"column\":\"pagina_id\",\"key\":\"id\",\"label\":\"titulo\",\"pivot_table\":\"banners\",\"pivot\":\"0\",\"taggable\":\"0\"}',11),(67,6,'id','text','Id',1,0,0,0,0,0,'{}',1),(68,6,'imagem','image','Imagem',0,1,1,1,1,1,'{\"resize\":{\"width\":\"1000\",\"height\":null},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"300\",\"height\":\"250\"}}]}',2),(69,6,'titulo','text','Título',0,1,1,1,1,1,'{}',3),(70,6,'subtitulo','text','Subtítulo',0,1,1,1,1,1,'{}',4),(71,6,'publico_alvo','text','Publico Alvo',0,1,1,1,1,1,'{}',5),(72,6,'pre_requisitos','text','Pré-requisitos',0,1,1,1,1,1,'{}',6),(73,6,'qty_participantes_grupo','number','Número de participantes por grupo',0,1,1,1,1,1,'{}',7),(74,6,'carga_horario','text','Carga Horario',0,1,1,1,1,1,'{}',8),(75,6,'conteudo_pragmatico','markdown_editor','Conteúdo Programático',0,1,1,1,1,1,'{}',9),(76,6,'assistencia_tecnica','markdown_editor','Assistência Técnica',0,1,1,1,1,1,'{}',10),(77,6,'galeria_fotos','multiple_images','Galeria de Fotos',0,1,1,1,1,1,'{}',11),(78,6,'created_at','timestamp','Criado em',0,1,0,0,0,0,'{}',12),(79,6,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',13),(80,6,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,'{}',14),(81,7,'id','text','Id',1,0,0,0,0,0,'{}',1),(82,7,'titulo','text','Titulo',0,1,1,1,1,1,'{}',2),(83,7,'imagem','image','Imagem',0,1,1,1,1,1,'{}',4),(84,7,'video','text','Video',0,1,1,1,1,1,'{}',5),(85,7,'ordem','number','Ordem',0,1,1,1,1,1,'{}',6),(86,7,'pagina_sessao_id','hidden','Pagina Sessao Id',0,1,1,1,1,1,'{}',7),(87,7,'link','text','Link',0,1,1,1,1,1,'{}',8),(88,7,'galeria_fotos','multiple_images','Galeria Fotos',0,1,1,1,1,1,'{}',9),(89,7,'created_at','timestamp','Criado em',0,1,0,0,0,0,'{}',10),(90,7,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',11),(91,7,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,'{}',12),(92,7,'conteudo','markdown_editor','Conteúdo',0,1,1,1,1,1,'{}',3),(93,8,'id','text','Id',1,0,0,0,0,0,'{}',1),(94,8,'titulo','text','Titulo',0,1,1,1,1,1,'{}',2),(95,8,'pagina_id','hidden','Pagina Id',0,0,0,1,1,0,'{}',4),(96,8,'created_at','timestamp','Criado em',0,1,0,0,0,0,'{}',5),(97,8,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',6),(98,8,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,'{}',7),(99,8,'paginas_sesso_belongsto_pagina_relationship','relationship','Página',0,1,1,1,1,1,'{\"model\":\"App\\\\Pagina\",\"table\":\"paginas\",\"type\":\"belongsTo\",\"column\":\"pagina_id\",\"key\":\"id\",\"label\":\"titulo\",\"pivot_table\":\"banners\",\"pivot\":\"0\",\"taggable\":\"0\"}',3),(100,7,'blocos_estatico_belongsto_paginas_sesso_relationship','relationship','Sessão de página',0,1,1,1,1,1,'{\"model\":\"App\\\\PaginasSessao\",\"table\":\"paginas_sessoes\",\"type\":\"belongsTo\",\"column\":\"pagina_sessao_id\",\"key\":\"id\",\"label\":\"titulo\",\"pivot_table\":\"banners\",\"pivot\":\"0\",\"taggable\":\"0\"}',13),(101,9,'id','text','Id',1,0,0,0,0,0,'{}',1),(102,9,'titulo','text','Titulo',0,1,1,1,1,1,'{}',2),(103,9,'created_at','timestamp','Criado em',0,1,0,0,0,0,'{}',3),(104,9,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',4),(105,9,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,'{}',5),(106,10,'id','text','Id',1,0,0,0,0,0,'{}',1),(107,10,'titulo','text','Titulo',0,1,1,1,1,1,'{}',2),(108,10,'subtitulo','text','Subtítulo',0,1,1,1,1,1,'{}',3),(109,10,'texto','markdown_editor','Texto',0,1,1,1,1,1,'{}',5),(110,10,'status','checkbox','Status',0,1,1,1,1,1,'{\"on\":\"Ativo\",\"off\":\"Inativo\",\"checked\":true}',6),(111,10,'categoria','hidden','Categoria',0,0,1,1,1,0,'{}',7),(112,10,'galeria','multiple_images','Galeria',0,1,1,1,1,1,'{}',8),(113,10,'created_at','timestamp','Criado em',0,1,1,0,0,0,'{}',9),(114,10,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',10),(115,10,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,'{}',11),(116,10,'noticia_belongsto_noticias_categoria_relationship','relationship','Categoria',0,1,1,1,1,1,'{\"model\":\"App\\\\NoticiasCategoria\",\"table\":\"noticias_categorias\",\"type\":\"belongsTo\",\"column\":\"categoria\",\"key\":\"id\",\"label\":\"titulo\",\"pivot_table\":\"banners\",\"pivot\":\"0\",\"taggable\":\"0\"}',4),(117,11,'id','text','Id',1,0,0,0,0,0,'{}',1),(118,11,'titulo','text','Titulo',0,1,1,1,1,1,'{}',2),(119,11,'subtitulo','text','Subtítulo',0,1,1,1,1,1,'{}',3),(120,11,'link','text','Link',0,1,1,1,1,1,'{}',4),(121,11,'imagem','image','Imagem',0,1,1,1,1,1,'{}',5),(122,11,'created_at','timestamp','Criado em',0,1,0,0,0,1,'{}',6),(123,11,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',7),(124,11,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,'{}',8),(125,12,'id','text','Id',1,1,0,0,0,0,'{}',1),(126,12,'texto','markdown_editor','Texto',0,1,1,1,1,1,'{}',2),(127,12,'created_at','timestamp','Criado em',0,1,0,0,0,0,'{}',3),(128,12,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',4),(129,12,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,'{}',5),(130,13,'id','text','Id',1,1,0,0,0,0,'{}',1),(131,13,'texto','markdown_editor','Texto',0,1,1,1,1,1,'{}',2),(132,13,'created_at','timestamp','Criado em',0,1,0,0,0,1,'{}',3),(133,13,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',4),(134,13,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,'{}',5),(135,14,'id','text','Id',1,1,0,0,0,0,'{}',1),(136,14,'data_inicio','date','Data Inicio',0,1,1,1,1,1,'{}',2),(137,14,'data_fim','date','Data Fim',0,1,1,1,1,1,'{}',3),(138,14,'titulo','text','Titulo',0,1,1,1,1,1,'{}',4),(139,14,'descricao','text_area','Descrição',0,1,1,1,1,1,'{}',5),(140,14,'desc_fase_evento','text','Descrição Fase Evento',0,1,1,1,1,1,'{}',6),(141,14,'regiaoevento','text','Região Evento',0,1,1,1,1,1,'{}',7),(142,14,'cod_curso','number','Cód. Curso',0,1,1,1,1,1,'{}',8),(143,14,'areadeinteresse','text','Área de Interesse',0,1,1,1,1,1,'{}',9),(144,14,'modalidade','text','Modalidade',0,1,1,1,1,1,'{}',10),(145,14,'situacao','text','Situação',0,1,1,1,1,1,'{}',11),(146,14,'cargahorariatotal','number','Carga horaria total',0,1,1,1,1,1,'{}',12),(147,14,'escolaridade','text','Escolaridade',0,1,1,1,1,1,'{}',13),(148,14,'idade','text','Idade',0,1,1,1,1,1,'{}',14),(149,14,'minimodeparticipantes','number','Mínimo de participantes',0,1,1,1,1,1,'{}',15),(150,14,'maximodeparticipantes','number','Máximo de participantes',0,1,1,1,1,1,'{}',16),(151,14,'conteudoprogramatico','markdown_editor','Conteúdo programático',0,1,1,1,1,1,'{}',17),(152,14,'imagem','image','Imagem',0,1,1,1,1,1,'{}',18),(153,14,'created_at','timestamp','Created At',0,1,0,0,0,0,'{}',19),(154,14,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',20),(155,14,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,'{}',21),(156,13,'curso_id','hidden','Curso Id',0,0,0,1,1,0,'{}',6),(157,13,'cursos_depoimento_belongsto_curso_relationship','relationship','cursos',0,1,1,1,1,1,'{\"model\":\"App\\\\Curso\",\"table\":\"cursos\",\"type\":\"belongsTo\",\"column\":\"curso_id\",\"key\":\"id\",\"label\":\"titulo\",\"pivot_table\":\"banners\",\"pivot\":\"0\",\"taggable\":\"0\"}',7),(158,12,'curso_id','hidden','Curso Id',0,0,0,1,1,0,'{}',6),(160,12,'cursos_requisito_belongsto_curso_relationship_1','relationship','Curso',0,1,1,1,1,1,'{\"model\":\"App\\\\Curso\",\"table\":\"cursos\",\"type\":\"belongsTo\",\"column\":\"curso_id\",\"key\":\"id\",\"label\":\"titulo\",\"pivot_table\":\"banners\",\"pivot\":\"0\",\"taggable\":\"0\"}',8),(161,15,'id','text','Id',1,1,0,0,0,0,'{}',1),(162,15,'data_inicio','date','Data Inicio',0,1,1,1,1,1,'{}',2),(163,15,'data_fim','date','Data Fim',0,1,1,1,1,1,'{}',3),(164,15,'titulo','text','Titulo',0,1,1,1,1,1,'{}',4),(165,15,'estado','text','Estado',0,1,1,1,1,1,'{}',5),(166,15,'cidade','text','Cidade',0,1,1,1,1,1,'{}',6),(167,15,'texto','text_area','Texto',0,1,1,1,1,1,'{}',7),(168,15,'link','text','Link',0,1,1,1,1,1,'{}',8),(169,15,'download','file','Download',0,1,1,1,1,1,'{}',9),(170,15,'status','checkbox','Status',0,1,1,1,1,1,'{\"on\":\"Ativo\",\"off\":\"Inativo\",\"checked\":true}',10),(171,15,'created_at','timestamp','Criado em',0,1,0,0,0,0,'{}',11),(172,15,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',12),(173,15,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,'{}',13),(174,16,'id','text','Id',1,1,0,0,0,0,'{}',1),(175,16,'titulo','text','Titulo',0,1,1,1,1,1,'{}',2),(176,16,'texto','text_area','Texto',0,1,1,1,1,1,'{}',3),(177,16,'status','checkbox','Status',0,1,1,1,1,1,'{\"on\":\"Ativo\",\"off\":\"Inativo\",\"checked\":true}',4),(178,16,'created_at','timestamp','Criado em',0,1,1,1,0,1,'{}',5),(179,16,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',6),(180,16,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,'{}',7),(181,17,'id','text','Id',1,1,0,0,0,0,'{}',1),(182,17,'texto','markdown_editor','Texto',0,1,1,1,1,1,'{}',2),(183,17,'autoria','text','Autoria',0,1,1,1,1,1,'{}',3),(184,17,'regiao_autor','text','Região Autor',0,1,1,1,1,1,'{}',4),(185,17,'status','checkbox','Status',0,1,1,1,1,1,'{\"on\":\"Ativo\",\"off\":\"Inativo\",\"checked\":true}',5),(186,17,'created_at','timestamp','Criado em',0,1,0,0,0,0,'{}',6),(187,17,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',7),(188,17,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,'{}',8),(189,18,'id','text','Id',1,1,0,0,0,0,'{}',1),(190,18,'titulo','text','Titulo',0,1,1,1,1,1,'{}',2),(191,18,'status','checkbox','Status',0,1,1,1,1,1,'{\"on\":\"Ativo\",\"off\":\"Inativo\",\"checked\":true}',3),(192,18,'created_at','timestamp','Criado em',0,1,0,0,0,0,'{}',4),(193,18,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',5),(194,18,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,'{}',6),(195,19,'id','text','Id',1,0,0,0,0,0,'{}',1),(196,19,'titulo','text','Titulo',0,1,1,1,1,1,'{}',2),(197,19,'link','text','Link',0,1,1,1,1,1,'{}',3),(198,19,'status','checkbox','Status',0,1,1,1,1,1,'{\"on\":\"Ativo\",\"off\":\"Inativo\",\"checked\":true}',4),(199,19,'categoria_id','hidden','Categoria Id',0,0,0,1,1,1,'{}',6),(200,19,'created_at','timestamp','Criado em',0,1,0,0,0,0,'{}',7),(201,19,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',8),(202,19,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,'{}',9),(203,19,'legislaco_belongsto_legislacoes_categoria_relationship','relationship','legislacoes_categorias',0,1,1,1,1,1,'{\"model\":\"App\\\\LegislacoesCategoria\",\"table\":\"legislacoes_categorias\",\"type\":\"belongsTo\",\"column\":\"categoria_id\",\"key\":\"id\",\"label\":\"titulo\",\"pivot_table\":\"banners\",\"pivot\":\"0\",\"taggable\":\"0\"}',5),(204,20,'id','text','Id',1,1,0,0,0,0,'{}',1),(205,20,'titulo','text','Titulo',0,1,1,1,1,1,'{}',2),(206,20,'texto','markdown_editor','Texto',0,1,1,1,1,1,'{}',3),(207,20,'status','checkbox','Status',0,1,1,1,1,1,'{\"on\":\"Ativo\",\"off\":\"Inativo\",\"checked\":true}',4),(208,20,'created_at','timestamp','Criado em',0,1,0,0,0,0,'{}',5),(209,20,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',6),(210,20,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,'{}',7),(211,21,'id','text','Id',1,1,0,0,0,0,'{}',1),(212,21,'titulo','text','Titulo',0,1,1,1,1,1,'{}',2),(213,21,'download','file','Download',0,1,1,1,1,1,'{}',3),(214,21,'status','checkbox','Status',0,1,1,1,1,1,'{\"on\":\"Ativo\",\"off\":\"Inativo\",\"checked\":true}',4),(215,21,'categoria_id','hidden','Categoria Id',0,0,0,1,1,0,'{}',5),(216,21,'created_at','timestamp','Criado em',0,1,0,0,0,0,'{}',7),(217,21,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',8),(218,21,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,'{}',9),(219,21,'relatorios_atvidade_belongsto_relatorios_atvidades_categoria_relationship','relationship','Categoria',0,1,1,1,1,1,'{\"model\":\"\\\\App\\\\RelatoriosAtvidadesCategoria\",\"table\":\"relatorios_atvidades_categorias\",\"type\":\"belongsTo\",\"column\":\"categoria_id\",\"key\":\"id\",\"label\":\"titulo\",\"pivot_table\":\"banners\",\"pivot\":\"0\",\"taggable\":\"0\"}',6),(220,22,'id','text','Id',1,1,0,0,0,0,'{}',1),(221,22,'titulo','text','Titulo',0,1,1,1,1,1,'{}',2),(222,22,'download','file','Download',0,1,1,1,1,1,'{}',3),(223,22,'link','text','Link',0,1,1,1,1,1,'{}',4),(224,22,'status','checkbox','Status',0,1,1,1,1,1,'{\"on\":\"Ativo\",\"off\":\"Inativo\",\"checked\":true}',5),(225,22,'created_at','timestamp','Criado em',0,1,1,0,0,1,'{}',6),(226,22,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',7),(227,22,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,'{}',8),(228,24,'id','text','Id',1,1,0,0,0,0,'{}',1),(229,24,'status','checkbox','Status',0,1,1,1,1,1,'{\"on\":\"Ativo\",\"off\":\"Inativo\",\"checked\":true}',2),(230,24,'modalidade','text','Modalidade',0,1,1,1,1,1,'{}',3),(231,24,'objeto','text','Objeto',0,1,1,1,1,1,'{}',4),(232,24,'numero_ano','text','Numero Ano',0,1,1,1,1,1,'{}',5),(233,24,'processo','text','Processo',0,1,1,1,1,1,'{}',6),(234,24,'licitante','text','Licitante',0,1,1,1,1,1,'{}',7),(235,24,'arquivo_edital','file','Arquivo Edital',0,1,1,1,1,1,'{}',8),(236,24,'data_abertura','date','Data Abertura',0,1,1,1,1,1,'{}',10),(237,24,'arquivo_resultado','file','Arquivo Resultado',0,1,1,1,1,1,'{}',9),(238,24,'created_at','timestamp','Criado em',0,1,1,0,0,1,'{}',11),(239,24,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',12),(240,24,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,'{}',13),(241,25,'id','text','Id',1,1,0,0,0,0,'{}',1),(242,25,'licitacao_id','hidden','Licitacao Id',0,0,0,1,1,0,'{}',2),(243,25,'titulo','text','Titulo',0,1,1,1,1,1,'{}',3),(244,25,'arquivo','file','Arquivo',0,1,1,1,1,1,'{}',4),(245,25,'created_at','timestamp','Criado em',0,1,0,0,0,0,'{}',6),(246,25,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',7),(247,25,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,'{}',8),(248,25,'licitacoes_arquivo_belongsto_licitaco_relationship','relationship','Licitação',0,1,1,1,1,1,'{\"model\":\"App\\\\Licitacao\",\"table\":\"licitacoes\",\"type\":\"belongsTo\",\"column\":\"licitacao_id\",\"key\":\"id\",\"label\":\"objeto\",\"pivot_table\":\"banners\",\"pivot\":\"0\",\"taggable\":\"0\"}',5),(249,26,'id','text','Id',1,1,0,0,0,0,'{}',1),(250,26,'titulo','text','Titulo',0,1,1,1,1,1,'{}',2),(251,26,'texto','markdown_editor','Texto',0,0,1,1,1,1,'{}',3),(252,26,'created_at','timestamp','Criado em',0,1,1,0,0,0,'{}',4),(253,26,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',5),(254,26,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,'{}',6),(255,27,'id','text','Id',1,1,0,0,0,0,'{}',1),(256,27,'transparencia_id','hidden','Transparencia Id',0,0,0,1,1,0,'{}',2),(257,27,'titulo','text','Titulo',0,1,1,1,1,1,'{}',3),(258,27,'arquivo','file','Arquivo',0,1,1,1,1,1,'{}',4),(259,27,'created_at','timestamp','Criado em',0,1,1,0,0,1,'{}',6),(260,27,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',7),(261,27,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,'{}',8),(262,27,'tranparencias_arquivo_belongsto_tranparencia_relationship','relationship','Transparência',0,1,1,1,1,1,'{\"model\":\"App\\\\Tranparencia\",\"table\":\"tranparencias\",\"type\":\"belongsTo\",\"column\":\"transparencia_id\",\"key\":\"id\",\"label\":\"titulo\",\"pivot_table\":\"banners\",\"pivot\":\"0\",\"taggable\":\"0\"}',5),(263,28,'id','text','Id',1,1,0,0,0,0,'{}',1),(264,28,'regiao','text','Região',0,1,1,1,1,1,'{}',2),(265,28,'cidade','text','Cidade',0,1,1,1,1,1,'{}',3),(266,28,'supervisor_nome','text','Supervisor Nome',0,1,1,1,1,1,'{}',4),(267,28,'supervisor_email','text','Supervisor E-mail',0,1,1,1,1,1,'{}',5),(268,28,'created_at','timestamp','Criado em',0,1,0,0,0,0,'{}',6),(269,28,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',7),(270,28,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,'{}',8),(271,29,'id','text','Id',1,1,0,0,0,0,'{}',1),(272,29,'logo','image','Logo',0,1,1,1,1,1,'{}',2),(273,29,'link','text','Link',0,1,1,1,1,1,'{}',3),(274,29,'created_at','timestamp','Criado em',0,1,0,0,0,0,'{}',4),(275,29,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',5),(276,29,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,'{}',6),(277,30,'id','text','Id',1,1,0,0,0,0,'{}',1),(278,30,'titulo','text','Titulo',0,1,1,1,1,1,'{}',2),(279,30,'texto','markdown_editor','Texto',0,1,1,1,1,1,'{}',3),(280,30,'created_at','timestamp','Criado em',0,1,0,0,0,0,'{}',4),(281,30,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',5),(282,30,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,'{}',6),(283,31,'id','text','Id',1,1,0,0,0,0,'{}',1),(284,31,'oportunidade_id','hidden','Oportunidade Id',0,0,0,1,1,0,'{}',3),(285,31,'titulo','text','Titulo',0,1,1,1,1,1,'{}',4),(286,31,'arquivo','file','Arquivo',0,1,1,1,1,1,'{}',5),(287,31,'created_at','timestamp','Criado em',0,1,0,0,0,0,'{}',6),(288,31,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',7),(289,31,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,'{}',8),(290,31,'opotunidades_arquivo_belongsto_oportunidade_relationship','relationship','Oportunidade',0,1,1,1,1,1,'{\"model\":\"App\\\\Oportunidade\",\"table\":\"oportunidades\",\"type\":\"belongsTo\",\"column\":\"oportunidade_id\",\"key\":\"id\",\"label\":\"titulo\",\"pivot_table\":\"apoiadores\",\"pivot\":\"0\",\"taggable\":\"0\"}',2),(291,32,'id','text','Id',1,1,0,0,0,0,'{}',1),(292,32,'nome','text','Nome',0,1,1,1,1,1,'{}',2),(293,32,'telefones','text','Telefones',0,1,1,1,1,1,'{}',3),(294,32,'email','text','E-mail',0,1,1,1,1,1,'{}',4),(295,32,'sistema','select_dropdown','Sistema',0,1,1,1,1,1,'{\"default\":\"\",\"options\":{\"Farsul\":\"Farsul\",\"Fetag\":\"Fetag\"}}',5),(296,32,'created_at','timestamp','Criado em',0,1,0,0,0,0,'{}',6),(297,32,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',7),(298,33,'id','text','Id',1,1,0,0,0,0,'{}',1),(299,33,'sindicato_id','hidden','Sindicato Id',0,0,0,1,1,0,'{}',3),(300,33,'municipio','text','Município',0,1,1,1,1,1,'{}',4),(301,33,'created_at','timestamp','Criado em',0,1,0,0,0,0,'{}',5),(302,33,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',6),(303,33,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,'{}',7),(304,33,'sindicatos_municipio_belongsto_sindicato_relationship','relationship','Sindicato',0,1,1,1,1,1,'{\"model\":\"App\\\\Sindicato\",\"table\":\"sindicatos\",\"type\":\"belongsTo\",\"column\":\"sindicato_id\",\"key\":\"id\",\"label\":\"nome\",\"pivot_table\":\"apoiadores\",\"pivot\":\"0\",\"taggable\":\"0\"}',2),(305,34,'id','text','Id',1,1,0,0,0,0,'{}',1),(306,34,'assunto','text','Assunto',0,1,1,1,1,1,'{}',2),(307,34,'created_at','timestamp','Criado em',0,1,0,0,0,0,'{}',3),(308,34,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',4),(309,34,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,'{}',5),(310,35,'id','text','Id',1,1,0,0,0,0,'{}',1),(311,35,'assunto_id','hidden','Assunto Id',0,0,1,1,1,0,'{}',3),(312,35,'email','text','E-mail',0,1,1,1,1,1,'{}',4),(313,35,'created_at','timestamp','Criado em',0,1,0,0,0,0,'{}',5),(314,35,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',6),(315,35,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,'{}',7),(316,35,'contatosa_assuntos_email_belongsto_contatos_assunto_relationship','relationship','Assunto',0,1,1,1,1,1,'{\"model\":\"App\\\\ContatosAssunto\",\"table\":\"contatos_assuntos\",\"type\":\"belongsTo\",\"column\":\"assunto_id\",\"key\":\"id\",\"label\":\"assunto\",\"pivot_table\":\"apoiadores\",\"pivot\":\"0\",\"taggable\":\"0\"}',2);

/*Table structure for table `data_types` */

DROP TABLE IF EXISTS `data_types`;

CREATE TABLE `data_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `server_side` tinyint(4) NOT NULL DEFAULT '0',
  `details` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `data_types` */

insert  into `data_types`(`id`,`name`,`slug`,`display_name_singular`,`display_name_plural`,`icon`,`model_name`,`policy_name`,`controller`,`description`,`generate_permissions`,`server_side`,`details`,`created_at`,`updated_at`) values (1,'users','users','User','Users','voyager-person','TCG\\Voyager\\Models\\User','TCG\\Voyager\\Policies\\UserPolicy','TCG\\Voyager\\Http\\Controllers\\VoyagerUserController','',1,0,NULL,'2021-03-27 22:10:47','2021-03-27 22:10:47'),(2,'menus','menus','Menu','Menus','voyager-list','TCG\\Voyager\\Models\\Menu',NULL,'','',1,0,NULL,'2021-03-27 22:10:47','2021-03-27 22:10:47'),(3,'roles','roles','Role','Roles','voyager-lock','TCG\\Voyager\\Models\\Role',NULL,'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController','',1,0,NULL,'2021-03-27 22:10:47','2021-03-27 22:10:47'),(4,'paginas','paginas','Pagina','Paginas',NULL,'App\\Pagina',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2021-05-02 14:02:18','2021-05-02 14:02:57'),(5,'banners','banners','Banner','Banners',NULL,'App\\Banner',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2021-05-02 14:05:37','2021-05-02 14:08:48'),(6,'programas_capacitacao','programas-capacitacao','Programas Capacitacao','Programas Capacitacaos',NULL,'App\\ProgramasCapacitacao',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2021-05-02 14:36:59','2021-05-02 14:47:20'),(7,'blocos_estaticos','blocos-estaticos','Blocos Estatico','Blocos Estaticos',NULL,'App\\BlocosEstatico',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2021-05-02 14:56:15','2021-05-02 15:29:24'),(8,'paginas_sessoes','paginas-sessoes','Sessão de página','Sessões de págnas',NULL,'App\\PaginasSessao',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2021-05-02 15:09:21','2021-05-02 15:12:43'),(9,'noticias_categorias','noticias-categorias','Noticias Categoria','Noticias Categorias',NULL,'App\\NoticiasCategoria',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2021-05-02 15:40:05','2021-05-02 15:41:15'),(10,'noticias','noticias','Noticia','Noticias',NULL,'App\\Noticia',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2021-05-02 15:43:16','2021-05-02 15:45:07'),(11,'destques','destaques','Destaque','Destaques',NULL,'App\\Destque',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2021-05-02 16:21:01','2021-05-02 16:24:21'),(12,'cursos_requisitos','cursos-requisitos','Cursos Requisito','Cursos Requisitos',NULL,'App\\CursosRequisito',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2021-05-02 16:36:10','2021-05-02 16:58:00'),(13,'cursos_depoimentos','cursos-depoimentos','Depoimento de curso','Depoimentos de curso',NULL,'App\\CursosDepoimento',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2021-05-02 16:42:43','2021-05-02 16:56:00'),(14,'cursos','cursos','Curso','Cursos',NULL,'App\\Curso',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}','2021-05-02 16:53:54','2021-05-02 16:53:54'),(15,'eventos','eventos','Evento','Eventos',NULL,'App\\Evento',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}','2021-05-02 17:09:02','2021-05-02 17:09:02'),(16,'objetivos','objetivos','Objetivo','Objetivos',NULL,'App\\Objetivo',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}','2021-05-02 17:13:20','2021-05-02 17:13:20'),(17,'depoimentos','depoimentos','Depoimento','Depoimentos',NULL,'App\\Depoimento',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}','2021-05-02 17:16:12','2021-05-02 17:16:12'),(18,'legislacoes_categorias','legislacoes-categorias','Legislacoes Categoria','Legislacoes Categorias',NULL,'App\\LegislacoesCategoria',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2021-05-02 17:18:29','2021-05-02 17:19:00'),(19,'legislacoes','legislacoes','Lesgislação','Legislações',NULL,'App\\Legislacao',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2021-05-02 17:21:57','2021-05-02 17:27:06'),(20,'relatorios_atvidades_categorias','relatorios-atvidades-categorias','Categoria de relatório de atividades','Categorias de relatório de atividades',NULL,'App\\RelatoriosAtvidadesCategoria',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}','2021-05-02 17:31:41','2021-05-02 17:31:41'),(21,'relatorios_atvidades','relatorios-atvidades','Relatório de atividades','Relatórios de atividades',NULL,'App\\RelatoriosAtvidade',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2021-05-03 14:14:58','2021-05-03 14:17:12'),(22,'contribuicoes_previdencia_rural','contribuicoes-previdencia-rural','Contribuição Previdência Rural','Contribuições Previdência Rural',NULL,'App\\ContribuicoesPrevidenciaRural',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2021-05-03 14:23:12','2021-05-03 14:25:24'),(24,'licitacoes','licitacoes','Livitação','Licitações',NULL,'App\\Licitacao',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2021-05-03 14:38:39','2021-05-03 14:41:26'),(25,'licitacoes_arquivos','licitacoes-arquivos','Licitacoes Arquivo','Licitacoes Arquivos',NULL,'App\\LicitacoesArquivo',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2021-05-03 14:56:18','2021-05-03 14:59:33'),(26,'tranparencias','tranparencias','Tranparencia','Tranparencias',NULL,'App\\Tranparencia',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}','2021-05-03 15:10:51','2021-05-03 15:10:51'),(27,'tranparencias_arquivos','tranparencias-arquivos','Transparência Arquivo','Transparência Arquivos',NULL,'App\\TranparenciasArquivo',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2021-05-03 15:15:39','2021-05-03 15:17:14'),(28,'regioes','regioes','Região','Regiões',NULL,'App\\Regiao',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}','2021-05-03 17:17:55','2021-05-03 17:17:55'),(29,'apoiadores','apoiadores','Apoiador','Apoiadores',NULL,'App\\Apoiador',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}','2021-05-03 17:21:43','2021-05-03 17:21:43'),(30,'oportunidades','oportunidades','Oportunidade','Oportunidades',NULL,'App\\Oportunidade',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}','2021-05-03 17:26:42','2021-05-03 17:26:42'),(31,'opotunidades_arquivos','opotunidades-arquivos','Oportunidades Arquivo','Oportunidades Arquivos',NULL,'App\\OpotunidadesArquivo',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2021-05-03 17:33:11','2021-05-03 17:36:23'),(32,'sindicatos','sindicatos','Sindicato','Sindicatos',NULL,'App\\Sindicato',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2021-05-03 17:41:50','2021-05-03 17:43:32'),(33,'sindicatos_municipios','sindicatos-municipios','Sindicato Município','Sindicatos Munícipios',NULL,'App\\SindicatosMunicipio',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2021-05-03 17:48:04','2021-05-03 17:50:15'),(34,'contatos_assuntos','contatos-assuntos','Contato Assunto','Contato Assuntos',NULL,'App\\ContatosAssunto',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}','2021-05-03 17:57:56','2021-05-03 17:57:56'),(35,'contatosa_assuntos_emails','contato-assuntos-email','Contato Assunto E-mail','Contato Assunto E-mails',NULL,'App\\ContatosAssuntosEmails',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2021-05-03 17:59:17','2021-05-03 18:04:04');

/*Table structure for table `depoimentos` */

DROP TABLE IF EXISTS `depoimentos`;

CREATE TABLE `depoimentos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `texto` text COLLATE utf8mb4_unicode_ci,
  `autoria` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regiao_autor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `depoimentos` */

insert  into `depoimentos`(`id`,`texto`,`autoria`,`regiao_autor`,`status`,`created_at`,`updated_at`,`deleted_at`) values (1,'Texto\r\nAdd DepoimentoAdd DepoimentoAdd DepoimentoAdd DepoimentoAdd DepoimentoAdd DepoimentoAdd DepoimentoAdd DepoimentoAdd DepoimentoAdd DepoimentoAdd DepoimentoAdd DepoimentoAdd Depoimento','Autoria','Região Autor',1,'2021-05-02 17:16:39','2021-05-02 17:16:39',NULL);

/*Table structure for table `destques` */

DROP TABLE IF EXISTS `destques`;

CREATE TABLE `destques` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagem` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `destques` */

insert  into `destques`(`id`,`titulo`,`subtitulo`,`link`,`imagem`,`created_at`,`updated_at`,`deleted_at`) values (1,'Titulo','Subtítulo','Link','destques\\May2021\\orL9xk9mwLCquL6nNqHD.png','2021-05-02 16:23:24','2021-05-02 16:23:24',NULL);

/*Table structure for table `eventos` */

DROP TABLE IF EXISTS `eventos`;

CREATE TABLE `eventos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `data_inicio` date DEFAULT NULL,
  `data_fim` date DEFAULT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cidade` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `texto` text COLLATE utf8mb4_unicode_ci,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `download` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `eventos` */

insert  into `eventos`(`id`,`data_inicio`,`data_fim`,`titulo`,`estado`,`cidade`,`texto`,`link`,`download`,`status`,`created_at`,`updated_at`,`deleted_at`) values (1,'2021-05-02','2021-05-04','Titulo','Estado','Cidade','Texto','Link','[{\"download_link\":\"eventos\\\\May2021\\\\eQtqXpGsJAW12uOElAl3.png\",\"original_name\":\"casaRural.png\"}]',1,'2021-05-02 17:10:14','2021-05-02 17:10:14',NULL);

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `legislacoes` */

DROP TABLE IF EXISTS `legislacoes`;

CREATE TABLE `legislacoes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `legislacoes` */

insert  into `legislacoes`(`id`,`titulo`,`link`,`status`,`categoria_id`,`created_at`,`updated_at`,`deleted_at`) values (1,'Titulo','Link',1,1,'2021-05-02 17:27:28','2021-05-02 17:27:28',NULL);

/*Table structure for table `legislacoes_categorias` */

DROP TABLE IF EXISTS `legislacoes_categorias`;

CREATE TABLE `legislacoes_categorias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `legislacoes_categorias` */

insert  into `legislacoes_categorias`(`id`,`titulo`,`status`,`created_at`,`updated_at`,`deleted_at`) values (1,'Titulo',1,'2021-05-02 17:19:25','2021-05-02 17:19:25',NULL);

/*Table structure for table `licitacoes` */

DROP TABLE IF EXISTS `licitacoes`;

CREATE TABLE `licitacoes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` int(11) DEFAULT NULL,
  `modalidade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `objeto` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_ano` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `processo` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `licitante` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arquivo_edital` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_abertura` date DEFAULT NULL,
  `arquivo_resultado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `licitacoes` */

insert  into `licitacoes`(`id`,`status`,`modalidade`,`objeto`,`numero_ano`,`processo`,`licitante`,`arquivo_edital`,`data_abertura`,`arquivo_resultado`,`created_at`,`updated_at`,`deleted_at`) values (1,1,'Modalidade','Objeto','Numero Ano','Processo','Licitante','[{\"download_link\":\"licitacoes\\\\May2021\\\\473ZueoQ7NJ5VSscvYYj.png\",\"original_name\":\"casaRural.png\"}]','2021-05-08','[{\"download_link\":\"licitacoes\\\\May2021\\\\0Qa4MfCFbvcU10ikNMlu.png\",\"original_name\":\"cnaBrasil.png\"}]','2021-05-03 14:42:02','2021-05-03 14:42:02',NULL);

/*Table structure for table `licitacoes_arquivos` */

DROP TABLE IF EXISTS `licitacoes_arquivos`;

CREATE TABLE `licitacoes_arquivos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `licitacao_id` int(11) DEFAULT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arquivo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `licitacoes_arquivos` */

insert  into `licitacoes_arquivos`(`id`,`licitacao_id`,`titulo`,`arquivo`,`created_at`,`updated_at`,`deleted_at`) values (1,1,'Titulo','[{\"download_link\":\"licitacoes-arquivos\\\\May2021\\\\XrnF9hbMMF1KzIqrnpTQ.png\",\"original_name\":\"farsul.png\"}]','2021-05-03 14:59:56','2021-05-03 14:59:56',NULL);

/*Table structure for table `menu_items` */

DROP TABLE IF EXISTS `menu_items`;

CREATE TABLE `menu_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(10) unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `menu_items_menu_id_foreign` (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `menu_items` */

insert  into `menu_items`(`id`,`menu_id`,`title`,`url`,`target`,`icon_class`,`color`,`parent_id`,`order`,`created_at`,`updated_at`,`route`,`parameters`) values (1,1,'Dashboard','','_self','voyager-boat',NULL,NULL,1,'2021-03-27 22:10:47','2021-03-27 22:10:47','voyager.dashboard',NULL),(2,1,'Media','','_self','voyager-images',NULL,NULL,5,'2021-03-27 22:10:47','2021-03-27 22:10:47','voyager.media.index',NULL),(3,1,'Users','','_self','voyager-person',NULL,NULL,3,'2021-03-27 22:10:47','2021-03-27 22:10:47','voyager.users.index',NULL),(4,1,'Roles','','_self','voyager-lock',NULL,NULL,2,'2021-03-27 22:10:47','2021-03-27 22:10:47','voyager.roles.index',NULL),(5,1,'Tools','','_self','voyager-tools',NULL,NULL,9,'2021-03-27 22:10:47','2021-03-27 22:10:47',NULL,NULL),(6,1,'Menu Builder','','_self','voyager-list',NULL,5,10,'2021-03-27 22:10:47','2021-03-27 22:10:47','voyager.menus.index',NULL),(7,1,'Database','','_self','voyager-data',NULL,5,11,'2021-03-27 22:10:47','2021-03-27 22:10:47','voyager.database.index',NULL),(8,1,'Compass','','_self','voyager-compass',NULL,5,12,'2021-03-27 22:10:47','2021-03-27 22:10:47','voyager.compass.index',NULL),(9,1,'BREAD','','_self','voyager-bread',NULL,5,13,'2021-03-27 22:10:47','2021-03-27 22:10:47','voyager.bread.index',NULL),(10,1,'Settings','','_self','voyager-settings',NULL,NULL,14,'2021-03-27 22:10:47','2021-03-27 22:10:47','voyager.settings.index',NULL),(14,1,'Hooks','','_self','voyager-hook',NULL,5,13,'2021-03-27 22:10:48','2021-03-27 22:10:48','voyager.hooks',NULL),(16,1,'Paginas','','_self',NULL,NULL,NULL,15,'2021-05-02 14:02:19','2021-05-02 14:02:19','voyager.paginas.index',NULL),(17,1,'Banners','','_self',NULL,NULL,NULL,16,'2021-05-02 14:05:37','2021-05-02 14:05:37','voyager.banners.index',NULL),(18,1,'Programas Capacitacaos','','_self',NULL,NULL,NULL,17,'2021-05-02 14:36:59','2021-05-02 14:36:59','voyager.programas-capacitacao.index',NULL),(19,1,'Blocos Estaticos','','_self',NULL,NULL,NULL,18,'2021-05-02 14:56:15','2021-05-02 14:56:15','voyager.blocos-estaticos.index',NULL),(20,1,'Sessões de págnas','','_self',NULL,NULL,NULL,19,'2021-05-02 15:09:21','2021-05-02 15:09:21','voyager.paginas-sessoes.index',NULL),(21,1,'Noticias Categorias','','_self',NULL,NULL,NULL,20,'2021-05-02 15:40:05','2021-05-02 15:40:05','voyager.noticias-categorias.index',NULL),(22,1,'Noticias','','_self',NULL,NULL,NULL,21,'2021-05-02 15:43:17','2021-05-02 15:43:17','voyager.noticias.index',NULL),(23,1,'Destaques','','_self',NULL,'#000000',NULL,22,'2021-05-02 16:21:01','2021-05-02 16:25:28','voyager.destaques.index','null'),(24,1,'Cursos Requisitos','','_self',NULL,NULL,NULL,23,'2021-05-02 16:36:10','2021-05-02 16:36:10','voyager.cursos-requisitos.index',NULL),(25,1,'Depoimentos de curso','','_self',NULL,NULL,NULL,24,'2021-05-02 16:42:43','2021-05-02 16:42:43','voyager.cursos-depoimentos.index',NULL),(26,1,'Cursos','','_self',NULL,NULL,NULL,25,'2021-05-02 16:53:54','2021-05-02 16:53:54','voyager.cursos.index',NULL),(27,1,'Eventos','','_self',NULL,NULL,NULL,26,'2021-05-02 17:09:02','2021-05-02 17:09:02','voyager.eventos.index',NULL),(28,1,'Objetivos','','_self',NULL,NULL,NULL,27,'2021-05-02 17:13:20','2021-05-02 17:13:20','voyager.objetivos.index',NULL),(29,1,'Depoimentos','','_self',NULL,NULL,NULL,28,'2021-05-02 17:16:12','2021-05-02 17:16:12','voyager.depoimentos.index',NULL),(30,1,'Legislacoes Categorias','','_self',NULL,NULL,NULL,29,'2021-05-02 17:18:29','2021-05-02 17:18:29','voyager.legislacoes-categorias.index',NULL),(31,1,'Legislacos','','_self',NULL,NULL,NULL,30,'2021-05-02 17:21:57','2021-05-02 17:21:57','voyager.legislacoes.index',NULL),(32,1,'Categorias de relatório de atividades','','_self',NULL,NULL,NULL,31,'2021-05-02 17:31:41','2021-05-02 17:31:41','voyager.relatorios-atvidades-categorias.index',NULL),(33,1,'Relatórios de atividades','','_self',NULL,NULL,NULL,32,'2021-05-03 14:14:58','2021-05-03 14:14:58','voyager.relatorios-atvidades.index',NULL),(34,1,'Contribuições Previdência Rural','','_self',NULL,NULL,NULL,33,'2021-05-03 14:23:12','2021-05-03 14:23:12','voyager.contribuicoes-previdencia-rural.index',NULL),(35,1,'Licitacos','','_self',NULL,NULL,NULL,34,'2021-05-03 14:38:39','2021-05-03 14:38:39','voyager.licitacoes.index',NULL),(36,1,'Licitacoes Arquivos','','_self',NULL,NULL,NULL,35,'2021-05-03 14:56:18','2021-05-03 14:56:18','voyager.licitacoes-arquivos.index',NULL),(37,1,'Tranparencias','','_self',NULL,NULL,NULL,36,'2021-05-03 15:10:52','2021-05-03 15:10:52','voyager.tranparencias.index',NULL),(38,1,'Transparência Arquivos','','_self',NULL,NULL,NULL,37,'2021-05-03 15:15:39','2021-05-03 15:15:39','voyager.tranparencias-arquivos.index',NULL),(39,1,'Regiões','','_self',NULL,NULL,NULL,38,'2021-05-03 17:17:55','2021-05-03 17:17:55','voyager.regioes.index',NULL),(40,1,'Apoiadores','','_self',NULL,NULL,NULL,39,'2021-05-03 17:21:43','2021-05-03 17:21:43','voyager.apoiadores.index',NULL),(41,1,'Oportunidades','','_self',NULL,NULL,NULL,40,'2021-05-03 17:26:42','2021-05-03 17:26:42','voyager.oportunidades.index',NULL),(42,1,'Oportunidades Arquivos','','_self',NULL,NULL,NULL,41,'2021-05-03 17:33:11','2021-05-03 17:33:11','voyager.opotunidades-arquivos.index',NULL),(43,1,'Sindicatos','','_self',NULL,NULL,NULL,42,'2021-05-03 17:41:51','2021-05-03 17:41:51','voyager.sindicatos.index',NULL),(44,1,'Sindicatos Munícipios','','_self',NULL,NULL,NULL,43,'2021-05-03 17:48:05','2021-05-03 17:48:05','voyager.sindicatos-municipios.index',NULL),(45,1,'Contato Assuntos','','_self',NULL,NULL,NULL,44,'2021-05-03 17:57:57','2021-05-03 17:57:57','voyager.contatos-assuntos.index',NULL),(46,1,'Contatosa Assuntos Emails','/admin/contato-assuntos-email','_self',NULL,'#000000',NULL,45,'2021-05-03 17:59:17','2021-05-03 18:06:17',NULL,'');

/*Table structure for table `menus` */

DROP TABLE IF EXISTS `menus`;

CREATE TABLE `menus` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `menus` */

insert  into `menus`(`id`,`name`,`created_at`,`updated_at`) values (1,'admin','2021-03-27 22:10:47','2021-03-27 22:10:47');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2016_01_01_000000_add_voyager_user_fields',1),(4,'2016_01_01_000000_create_data_types_table',1),(5,'2016_05_19_173453_create_menu_table',1),(6,'2016_10_21_190000_create_roles_table',1),(7,'2016_10_21_190000_create_settings_table',1),(8,'2016_11_30_135954_create_permission_table',1),(9,'2016_11_30_141208_create_permission_role_table',1),(10,'2016_12_26_201236_data_types__add__server_side',1),(11,'2017_01_13_000000_add_route_to_menu_items_table',1),(12,'2017_01_14_005015_create_translations_table',1),(13,'2017_01_15_000000_make_table_name_nullable_in_permissions_table',1),(14,'2017_03_06_000000_add_controller_to_data_types_table',1),(15,'2017_04_21_000000_add_order_to_data_rows_table',1),(16,'2017_07_05_210000_add_policyname_to_data_types_table',1),(17,'2017_08_05_000000_add_group_to_settings_table',1),(18,'2017_11_26_013050_add_user_role_relationship',1),(19,'2017_11_26_015000_create_user_roles_table',1),(20,'2018_03_11_000000_add_user_settings',1),(21,'2018_03_14_000000_add_details_to_data_types_table',1),(22,'2018_03_16_000000_make_settings_value_nullable',1),(23,'2019_08_19_000000_create_failed_jobs_table',1),(24,'2016_01_01_000000_create_pages_table',2),(25,'2016_01_01_000000_create_posts_table',2),(26,'2016_02_15_204651_create_categories_table',2),(27,'2017_04_11_000000_alter_post_nullable_fields_table',2);

/*Table structure for table `noticias` */

DROP TABLE IF EXISTS `noticias`;

CREATE TABLE `noticias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `texto` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) DEFAULT NULL,
  `categoria` int(11) DEFAULT NULL,
  `galeria` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `noticias` */

insert  into `noticias`(`id`,`titulo`,`subtitulo`,`texto`,`status`,`categoria`,`galeria`,`created_at`,`updated_at`,`deleted_at`) values (1,'Titulo','Subtítulo','Texto',1,1,'[\"noticias\\\\May2021\\\\gbQMwdyGDqSLp7Mv3FXo.png\",\"noticias\\\\May2021\\\\veDNilXlunlQu3NrZMr5.png\",\"noticias\\\\May2021\\\\7xTjpHssvHI4OcKyQPKd.png\",\"noticias\\\\May2021\\\\CR3VWlQ7kmQ4nCISquxw.png\",\"noticias\\\\May2021\\\\yP8wqrE4YmDJpZFstuyF.png\",\"noticias\\\\May2021\\\\K959BGyvy60JhLKsxwot.png\"]','2021-05-02 15:45:59','2021-05-02 15:45:59',NULL);

/*Table structure for table `noticias_categorias` */

DROP TABLE IF EXISTS `noticias_categorias`;

CREATE TABLE `noticias_categorias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `noticias_categorias` */

insert  into `noticias_categorias`(`id`,`titulo`,`created_at`,`updated_at`,`deleted_at`) values (1,'Noticias Categoria','2021-05-02 15:40:00','2021-05-02 15:40:52',NULL);

/*Table structure for table `objetivos` */

DROP TABLE IF EXISTS `objetivos`;

CREATE TABLE `objetivos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `texto` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `objetivos` */

insert  into `objetivos`(`id`,`titulo`,`texto`,`status`,`created_at`,`updated_at`,`deleted_at`) values (1,'Titulo','Texto',1,'2021-05-02 17:13:34','2021-05-02 17:13:34',NULL);

/*Table structure for table `oportunidades` */

DROP TABLE IF EXISTS `oportunidades`;

CREATE TABLE `oportunidades` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `texto` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oportunidades` */

insert  into `oportunidades`(`id`,`titulo`,`texto`,`created_at`,`updated_at`,`deleted_at`) values (1,'oportunidades','oportunidades','2021-05-03 17:29:29','2021-05-03 17:29:29',NULL);

/*Table structure for table `opotunidades_arquivos` */

DROP TABLE IF EXISTS `opotunidades_arquivos`;

CREATE TABLE `opotunidades_arquivos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `oportunidade_id` int(11) DEFAULT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arquivo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `opotunidades_arquivos` */

/*Table structure for table `paginas` */

DROP TABLE IF EXISTS `paginas`;

CREATE TABLE `paginas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `texto` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `paginas` */

insert  into `paginas`(`id`,`titulo`,`texto`,`created_at`,`updated_at`,`deleted_at`) values (1,'Titulo','Texto','2021-05-02 14:03:18','2021-05-02 14:03:18',NULL),(2,'teste 2','teste 2','2021-05-02 14:15:01','2021-05-02 14:15:01',NULL);

/*Table structure for table `paginas_sessoes` */

DROP TABLE IF EXISTS `paginas_sessoes`;

CREATE TABLE `paginas_sessoes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pagina_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `paginas_sessoes` */

insert  into `paginas_sessoes`(`id`,`titulo`,`pagina_id`,`created_at`,`updated_at`,`deleted_at`) values (1,'teste',1,'2021-05-02 15:13:40','2021-05-02 15:13:40',NULL);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `permission_role` */

DROP TABLE IF EXISTS `permission_role`;

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permission_role` */

insert  into `permission_role`(`permission_id`,`role_id`) values (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(20,1),(21,1),(22,1),(23,1),(24,1),(25,1),(26,1),(27,1),(28,1),(29,1),(30,1),(31,1),(32,1),(33,1),(34,1),(35,1),(36,1),(37,1),(38,1),(39,1),(40,1),(42,1),(43,1),(44,1),(45,1),(46,1),(47,1),(48,1),(49,1),(50,1),(51,1),(52,1),(53,1),(54,1),(55,1),(56,1),(57,1),(58,1),(59,1),(60,1),(61,1),(62,1),(63,1),(64,1),(65,1),(66,1),(67,1),(68,1),(69,1),(70,1),(71,1),(72,1),(73,1),(74,1),(75,1),(76,1),(77,1),(78,1),(79,1),(80,1),(81,1),(82,1),(83,1),(84,1),(85,1),(86,1),(87,1),(88,1),(89,1),(90,1),(91,1),(92,1),(93,1),(94,1),(95,1),(96,1),(97,1),(98,1),(99,1),(100,1),(101,1),(102,1),(103,1),(104,1),(105,1),(106,1),(107,1),(108,1),(109,1),(110,1),(111,1),(112,1),(113,1),(114,1),(115,1),(116,1),(117,1),(118,1),(119,1),(120,1),(121,1),(122,1),(123,1),(124,1),(125,1),(126,1),(127,1),(128,1),(129,1),(130,1),(131,1),(132,1),(133,1),(134,1),(135,1),(136,1),(137,1),(138,1),(139,1),(140,1),(141,1),(142,1),(143,1),(144,1),(145,1),(146,1),(147,1),(148,1),(149,1),(150,1),(151,1),(152,1),(153,1),(154,1),(155,1),(156,1),(157,1),(158,1),(159,1),(160,1),(161,1),(162,1),(163,1),(164,1),(165,1),(166,1),(167,1),(168,1),(169,1),(170,1),(171,1),(172,1),(173,1),(174,1),(175,1),(176,1),(177,1),(178,1),(179,1),(180,1),(181,1),(182,1),(183,1),(184,1),(185,1),(186,1),(187,1),(188,1),(189,1),(190,1),(191,1),(192,1),(193,1),(194,1),(195,1),(196,1);

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permissions_key_index` (`key`(191))
) ENGINE=InnoDB AUTO_INCREMENT=197 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permissions` */

insert  into `permissions`(`id`,`key`,`table_name`,`created_at`,`updated_at`) values (1,'browse_admin',NULL,'2021-03-27 22:10:47','2021-03-27 22:10:47'),(2,'browse_bread',NULL,'2021-03-27 22:10:47','2021-03-27 22:10:47'),(3,'browse_database',NULL,'2021-03-27 22:10:47','2021-03-27 22:10:47'),(4,'browse_media',NULL,'2021-03-27 22:10:47','2021-03-27 22:10:47'),(5,'browse_compass',NULL,'2021-03-27 22:10:47','2021-03-27 22:10:47'),(6,'browse_menus','menus','2021-03-27 22:10:47','2021-03-27 22:10:47'),(7,'read_menus','menus','2021-03-27 22:10:47','2021-03-27 22:10:47'),(8,'edit_menus','menus','2021-03-27 22:10:47','2021-03-27 22:10:47'),(9,'add_menus','menus','2021-03-27 22:10:47','2021-03-27 22:10:47'),(10,'delete_menus','menus','2021-03-27 22:10:47','2021-03-27 22:10:47'),(11,'browse_roles','roles','2021-03-27 22:10:47','2021-03-27 22:10:47'),(12,'read_roles','roles','2021-03-27 22:10:47','2021-03-27 22:10:47'),(13,'edit_roles','roles','2021-03-27 22:10:48','2021-03-27 22:10:48'),(14,'add_roles','roles','2021-03-27 22:10:48','2021-03-27 22:10:48'),(15,'delete_roles','roles','2021-03-27 22:10:48','2021-03-27 22:10:48'),(16,'browse_users','users','2021-03-27 22:10:48','2021-03-27 22:10:48'),(17,'read_users','users','2021-03-27 22:10:48','2021-03-27 22:10:48'),(18,'edit_users','users','2021-03-27 22:10:48','2021-03-27 22:10:48'),(19,'add_users','users','2021-03-27 22:10:48','2021-03-27 22:10:48'),(20,'delete_users','users','2021-03-27 22:10:48','2021-03-27 22:10:48'),(21,'browse_settings','settings','2021-03-27 22:10:48','2021-03-27 22:10:48'),(22,'read_settings','settings','2021-03-27 22:10:48','2021-03-27 22:10:48'),(23,'edit_settings','settings','2021-03-27 22:10:48','2021-03-27 22:10:48'),(24,'add_settings','settings','2021-03-27 22:10:48','2021-03-27 22:10:48'),(25,'delete_settings','settings','2021-03-27 22:10:48','2021-03-27 22:10:48'),(41,'browse_hooks',NULL,'2021-03-27 22:10:48','2021-03-27 22:10:48'),(42,'browse_paginas','paginas','2021-05-02 14:02:19','2021-05-02 14:02:19'),(43,'read_paginas','paginas','2021-05-02 14:02:19','2021-05-02 14:02:19'),(44,'edit_paginas','paginas','2021-05-02 14:02:19','2021-05-02 14:02:19'),(45,'add_paginas','paginas','2021-05-02 14:02:19','2021-05-02 14:02:19'),(46,'delete_paginas','paginas','2021-05-02 14:02:19','2021-05-02 14:02:19'),(47,'browse_banners','banners','2021-05-02 14:05:37','2021-05-02 14:05:37'),(48,'read_banners','banners','2021-05-02 14:05:37','2021-05-02 14:05:37'),(49,'edit_banners','banners','2021-05-02 14:05:37','2021-05-02 14:05:37'),(50,'add_banners','banners','2021-05-02 14:05:37','2021-05-02 14:05:37'),(51,'delete_banners','banners','2021-05-02 14:05:37','2021-05-02 14:05:37'),(52,'browse_programas_capacitacao','programas_capacitacao','2021-05-02 14:36:59','2021-05-02 14:36:59'),(53,'read_programas_capacitacao','programas_capacitacao','2021-05-02 14:36:59','2021-05-02 14:36:59'),(54,'edit_programas_capacitacao','programas_capacitacao','2021-05-02 14:36:59','2021-05-02 14:36:59'),(55,'add_programas_capacitacao','programas_capacitacao','2021-05-02 14:36:59','2021-05-02 14:36:59'),(56,'delete_programas_capacitacao','programas_capacitacao','2021-05-02 14:36:59','2021-05-02 14:36:59'),(57,'browse_blocos_estaticos','blocos_estaticos','2021-05-02 14:56:15','2021-05-02 14:56:15'),(58,'read_blocos_estaticos','blocos_estaticos','2021-05-02 14:56:15','2021-05-02 14:56:15'),(59,'edit_blocos_estaticos','blocos_estaticos','2021-05-02 14:56:15','2021-05-02 14:56:15'),(60,'add_blocos_estaticos','blocos_estaticos','2021-05-02 14:56:15','2021-05-02 14:56:15'),(61,'delete_blocos_estaticos','blocos_estaticos','2021-05-02 14:56:15','2021-05-02 14:56:15'),(62,'browse_paginas_sessoes','paginas_sessoes','2021-05-02 15:09:21','2021-05-02 15:09:21'),(63,'read_paginas_sessoes','paginas_sessoes','2021-05-02 15:09:21','2021-05-02 15:09:21'),(64,'edit_paginas_sessoes','paginas_sessoes','2021-05-02 15:09:21','2021-05-02 15:09:21'),(65,'add_paginas_sessoes','paginas_sessoes','2021-05-02 15:09:21','2021-05-02 15:09:21'),(66,'delete_paginas_sessoes','paginas_sessoes','2021-05-02 15:09:21','2021-05-02 15:09:21'),(67,'browse_noticias_categorias','noticias_categorias','2021-05-02 15:40:05','2021-05-02 15:40:05'),(68,'read_noticias_categorias','noticias_categorias','2021-05-02 15:40:05','2021-05-02 15:40:05'),(69,'edit_noticias_categorias','noticias_categorias','2021-05-02 15:40:05','2021-05-02 15:40:05'),(70,'add_noticias_categorias','noticias_categorias','2021-05-02 15:40:05','2021-05-02 15:40:05'),(71,'delete_noticias_categorias','noticias_categorias','2021-05-02 15:40:05','2021-05-02 15:40:05'),(72,'browse_noticias','noticias','2021-05-02 15:43:17','2021-05-02 15:43:17'),(73,'read_noticias','noticias','2021-05-02 15:43:17','2021-05-02 15:43:17'),(74,'edit_noticias','noticias','2021-05-02 15:43:17','2021-05-02 15:43:17'),(75,'add_noticias','noticias','2021-05-02 15:43:17','2021-05-02 15:43:17'),(76,'delete_noticias','noticias','2021-05-02 15:43:17','2021-05-02 15:43:17'),(77,'browse_destques','destques','2021-05-02 16:21:01','2021-05-02 16:21:01'),(78,'read_destques','destques','2021-05-02 16:21:01','2021-05-02 16:21:01'),(79,'edit_destques','destques','2021-05-02 16:21:01','2021-05-02 16:21:01'),(80,'add_destques','destques','2021-05-02 16:21:01','2021-05-02 16:21:01'),(81,'delete_destques','destques','2021-05-02 16:21:01','2021-05-02 16:21:01'),(82,'browse_cursos_requisitos','cursos_requisitos','2021-05-02 16:36:10','2021-05-02 16:36:10'),(83,'read_cursos_requisitos','cursos_requisitos','2021-05-02 16:36:10','2021-05-02 16:36:10'),(84,'edit_cursos_requisitos','cursos_requisitos','2021-05-02 16:36:10','2021-05-02 16:36:10'),(85,'add_cursos_requisitos','cursos_requisitos','2021-05-02 16:36:10','2021-05-02 16:36:10'),(86,'delete_cursos_requisitos','cursos_requisitos','2021-05-02 16:36:10','2021-05-02 16:36:10'),(87,'browse_cursos_depoimentos','cursos_depoimentos','2021-05-02 16:42:43','2021-05-02 16:42:43'),(88,'read_cursos_depoimentos','cursos_depoimentos','2021-05-02 16:42:43','2021-05-02 16:42:43'),(89,'edit_cursos_depoimentos','cursos_depoimentos','2021-05-02 16:42:43','2021-05-02 16:42:43'),(90,'add_cursos_depoimentos','cursos_depoimentos','2021-05-02 16:42:43','2021-05-02 16:42:43'),(91,'delete_cursos_depoimentos','cursos_depoimentos','2021-05-02 16:42:43','2021-05-02 16:42:43'),(92,'browse_cursos','cursos','2021-05-02 16:53:54','2021-05-02 16:53:54'),(93,'read_cursos','cursos','2021-05-02 16:53:54','2021-05-02 16:53:54'),(94,'edit_cursos','cursos','2021-05-02 16:53:54','2021-05-02 16:53:54'),(95,'add_cursos','cursos','2021-05-02 16:53:54','2021-05-02 16:53:54'),(96,'delete_cursos','cursos','2021-05-02 16:53:54','2021-05-02 16:53:54'),(97,'browse_eventos','eventos','2021-05-02 17:09:02','2021-05-02 17:09:02'),(98,'read_eventos','eventos','2021-05-02 17:09:02','2021-05-02 17:09:02'),(99,'edit_eventos','eventos','2021-05-02 17:09:02','2021-05-02 17:09:02'),(100,'add_eventos','eventos','2021-05-02 17:09:02','2021-05-02 17:09:02'),(101,'delete_eventos','eventos','2021-05-02 17:09:02','2021-05-02 17:09:02'),(102,'browse_objetivos','objetivos','2021-05-02 17:13:20','2021-05-02 17:13:20'),(103,'read_objetivos','objetivos','2021-05-02 17:13:20','2021-05-02 17:13:20'),(104,'edit_objetivos','objetivos','2021-05-02 17:13:20','2021-05-02 17:13:20'),(105,'add_objetivos','objetivos','2021-05-02 17:13:20','2021-05-02 17:13:20'),(106,'delete_objetivos','objetivos','2021-05-02 17:13:20','2021-05-02 17:13:20'),(107,'browse_depoimentos','depoimentos','2021-05-02 17:16:12','2021-05-02 17:16:12'),(108,'read_depoimentos','depoimentos','2021-05-02 17:16:12','2021-05-02 17:16:12'),(109,'edit_depoimentos','depoimentos','2021-05-02 17:16:12','2021-05-02 17:16:12'),(110,'add_depoimentos','depoimentos','2021-05-02 17:16:12','2021-05-02 17:16:12'),(111,'delete_depoimentos','depoimentos','2021-05-02 17:16:12','2021-05-02 17:16:12'),(112,'browse_legislacoes_categorias','legislacoes_categorias','2021-05-02 17:18:29','2021-05-02 17:18:29'),(113,'read_legislacoes_categorias','legislacoes_categorias','2021-05-02 17:18:29','2021-05-02 17:18:29'),(114,'edit_legislacoes_categorias','legislacoes_categorias','2021-05-02 17:18:29','2021-05-02 17:18:29'),(115,'add_legislacoes_categorias','legislacoes_categorias','2021-05-02 17:18:29','2021-05-02 17:18:29'),(116,'delete_legislacoes_categorias','legislacoes_categorias','2021-05-02 17:18:29','2021-05-02 17:18:29'),(117,'browse_legislacoes','legislacoes','2021-05-02 17:21:57','2021-05-02 17:21:57'),(118,'read_legislacoes','legislacoes','2021-05-02 17:21:57','2021-05-02 17:21:57'),(119,'edit_legislacoes','legislacoes','2021-05-02 17:21:57','2021-05-02 17:21:57'),(120,'add_legislacoes','legislacoes','2021-05-02 17:21:57','2021-05-02 17:21:57'),(121,'delete_legislacoes','legislacoes','2021-05-02 17:21:57','2021-05-02 17:21:57'),(122,'browse_relatorios_atvidades_categorias','relatorios_atvidades_categorias','2021-05-02 17:31:41','2021-05-02 17:31:41'),(123,'read_relatorios_atvidades_categorias','relatorios_atvidades_categorias','2021-05-02 17:31:41','2021-05-02 17:31:41'),(124,'edit_relatorios_atvidades_categorias','relatorios_atvidades_categorias','2021-05-02 17:31:41','2021-05-02 17:31:41'),(125,'add_relatorios_atvidades_categorias','relatorios_atvidades_categorias','2021-05-02 17:31:41','2021-05-02 17:31:41'),(126,'delete_relatorios_atvidades_categorias','relatorios_atvidades_categorias','2021-05-02 17:31:41','2021-05-02 17:31:41'),(127,'browse_relatorios_atvidades','relatorios_atvidades','2021-05-03 14:14:58','2021-05-03 14:14:58'),(128,'read_relatorios_atvidades','relatorios_atvidades','2021-05-03 14:14:58','2021-05-03 14:14:58'),(129,'edit_relatorios_atvidades','relatorios_atvidades','2021-05-03 14:14:58','2021-05-03 14:14:58'),(130,'add_relatorios_atvidades','relatorios_atvidades','2021-05-03 14:14:58','2021-05-03 14:14:58'),(131,'delete_relatorios_atvidades','relatorios_atvidades','2021-05-03 14:14:58','2021-05-03 14:14:58'),(132,'browse_contribuicoes_previdencia_rural','contribuicoes_previdencia_rural','2021-05-03 14:23:12','2021-05-03 14:23:12'),(133,'read_contribuicoes_previdencia_rural','contribuicoes_previdencia_rural','2021-05-03 14:23:12','2021-05-03 14:23:12'),(134,'edit_contribuicoes_previdencia_rural','contribuicoes_previdencia_rural','2021-05-03 14:23:12','2021-05-03 14:23:12'),(135,'add_contribuicoes_previdencia_rural','contribuicoes_previdencia_rural','2021-05-03 14:23:12','2021-05-03 14:23:12'),(136,'delete_contribuicoes_previdencia_rural','contribuicoes_previdencia_rural','2021-05-03 14:23:12','2021-05-03 14:23:12'),(137,'browse_licitacoes','licitacoes','2021-05-03 14:38:39','2021-05-03 14:38:39'),(138,'read_licitacoes','licitacoes','2021-05-03 14:38:39','2021-05-03 14:38:39'),(139,'edit_licitacoes','licitacoes','2021-05-03 14:38:39','2021-05-03 14:38:39'),(140,'add_licitacoes','licitacoes','2021-05-03 14:38:39','2021-05-03 14:38:39'),(141,'delete_licitacoes','licitacoes','2021-05-03 14:38:39','2021-05-03 14:38:39'),(142,'browse_licitacoes_arquivos','licitacoes_arquivos','2021-05-03 14:56:18','2021-05-03 14:56:18'),(143,'read_licitacoes_arquivos','licitacoes_arquivos','2021-05-03 14:56:18','2021-05-03 14:56:18'),(144,'edit_licitacoes_arquivos','licitacoes_arquivos','2021-05-03 14:56:18','2021-05-03 14:56:18'),(145,'add_licitacoes_arquivos','licitacoes_arquivos','2021-05-03 14:56:18','2021-05-03 14:56:18'),(146,'delete_licitacoes_arquivos','licitacoes_arquivos','2021-05-03 14:56:18','2021-05-03 14:56:18'),(147,'browse_tranparencias','tranparencias','2021-05-03 15:10:52','2021-05-03 15:10:52'),(148,'read_tranparencias','tranparencias','2021-05-03 15:10:52','2021-05-03 15:10:52'),(149,'edit_tranparencias','tranparencias','2021-05-03 15:10:52','2021-05-03 15:10:52'),(150,'add_tranparencias','tranparencias','2021-05-03 15:10:52','2021-05-03 15:10:52'),(151,'delete_tranparencias','tranparencias','2021-05-03 15:10:52','2021-05-03 15:10:52'),(152,'browse_tranparencias_arquivos','tranparencias_arquivos','2021-05-03 15:15:39','2021-05-03 15:15:39'),(153,'read_tranparencias_arquivos','tranparencias_arquivos','2021-05-03 15:15:39','2021-05-03 15:15:39'),(154,'edit_tranparencias_arquivos','tranparencias_arquivos','2021-05-03 15:15:39','2021-05-03 15:15:39'),(155,'add_tranparencias_arquivos','tranparencias_arquivos','2021-05-03 15:15:39','2021-05-03 15:15:39'),(156,'delete_tranparencias_arquivos','tranparencias_arquivos','2021-05-03 15:15:39','2021-05-03 15:15:39'),(157,'browse_regioes','regioes','2021-05-03 17:17:55','2021-05-03 17:17:55'),(158,'read_regioes','regioes','2021-05-03 17:17:55','2021-05-03 17:17:55'),(159,'edit_regioes','regioes','2021-05-03 17:17:55','2021-05-03 17:17:55'),(160,'add_regioes','regioes','2021-05-03 17:17:55','2021-05-03 17:17:55'),(161,'delete_regioes','regioes','2021-05-03 17:17:55','2021-05-03 17:17:55'),(162,'browse_apoiadores','apoiadores','2021-05-03 17:21:43','2021-05-03 17:21:43'),(163,'read_apoiadores','apoiadores','2021-05-03 17:21:43','2021-05-03 17:21:43'),(164,'edit_apoiadores','apoiadores','2021-05-03 17:21:43','2021-05-03 17:21:43'),(165,'add_apoiadores','apoiadores','2021-05-03 17:21:43','2021-05-03 17:21:43'),(166,'delete_apoiadores','apoiadores','2021-05-03 17:21:43','2021-05-03 17:21:43'),(167,'browse_oportunidades','oportunidades','2021-05-03 17:26:42','2021-05-03 17:26:42'),(168,'read_oportunidades','oportunidades','2021-05-03 17:26:42','2021-05-03 17:26:42'),(169,'edit_oportunidades','oportunidades','2021-05-03 17:26:42','2021-05-03 17:26:42'),(170,'add_oportunidades','oportunidades','2021-05-03 17:26:42','2021-05-03 17:26:42'),(171,'delete_oportunidades','oportunidades','2021-05-03 17:26:42','2021-05-03 17:26:42'),(172,'browse_opotunidades_arquivos','opotunidades_arquivos','2021-05-03 17:33:11','2021-05-03 17:33:11'),(173,'read_opotunidades_arquivos','opotunidades_arquivos','2021-05-03 17:33:11','2021-05-03 17:33:11'),(174,'edit_opotunidades_arquivos','opotunidades_arquivos','2021-05-03 17:33:11','2021-05-03 17:33:11'),(175,'add_opotunidades_arquivos','opotunidades_arquivos','2021-05-03 17:33:11','2021-05-03 17:33:11'),(176,'delete_opotunidades_arquivos','opotunidades_arquivos','2021-05-03 17:33:11','2021-05-03 17:33:11'),(177,'browse_sindicatos','sindicatos','2021-05-03 17:41:51','2021-05-03 17:41:51'),(178,'read_sindicatos','sindicatos','2021-05-03 17:41:51','2021-05-03 17:41:51'),(179,'edit_sindicatos','sindicatos','2021-05-03 17:41:51','2021-05-03 17:41:51'),(180,'add_sindicatos','sindicatos','2021-05-03 17:41:51','2021-05-03 17:41:51'),(181,'delete_sindicatos','sindicatos','2021-05-03 17:41:51','2021-05-03 17:41:51'),(182,'browse_sindicatos_municipios','sindicatos_municipios','2021-05-03 17:48:05','2021-05-03 17:48:05'),(183,'read_sindicatos_municipios','sindicatos_municipios','2021-05-03 17:48:05','2021-05-03 17:48:05'),(184,'edit_sindicatos_municipios','sindicatos_municipios','2021-05-03 17:48:05','2021-05-03 17:48:05'),(185,'add_sindicatos_municipios','sindicatos_municipios','2021-05-03 17:48:05','2021-05-03 17:48:05'),(186,'delete_sindicatos_municipios','sindicatos_municipios','2021-05-03 17:48:05','2021-05-03 17:48:05'),(187,'browse_contatos_assuntos','contatos_assuntos','2021-05-03 17:57:56','2021-05-03 17:57:56'),(188,'read_contatos_assuntos','contatos_assuntos','2021-05-03 17:57:56','2021-05-03 17:57:56'),(189,'edit_contatos_assuntos','contatos_assuntos','2021-05-03 17:57:56','2021-05-03 17:57:56'),(190,'add_contatos_assuntos','contatos_assuntos','2021-05-03 17:57:56','2021-05-03 17:57:56'),(191,'delete_contatos_assuntos','contatos_assuntos','2021-05-03 17:57:56','2021-05-03 17:57:56'),(192,'browse_contatosa_assuntos_emails','contatosa_assuntos_emails','2021-05-03 17:59:17','2021-05-03 17:59:17'),(193,'read_contatosa_assuntos_emails','contatosa_assuntos_emails','2021-05-03 17:59:17','2021-05-03 17:59:17'),(194,'edit_contatosa_assuntos_emails','contatosa_assuntos_emails','2021-05-03 17:59:17','2021-05-03 17:59:17'),(195,'add_contatosa_assuntos_emails','contatosa_assuntos_emails','2021-05-03 17:59:17','2021-05-03 17:59:17'),(196,'delete_contatosa_assuntos_emails','contatosa_assuntos_emails','2021-05-03 17:59:17','2021-05-03 17:59:17');

/*Table structure for table `programas_capacitacao` */

DROP TABLE IF EXISTS `programas_capacitacao`;

CREATE TABLE `programas_capacitacao` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `imagem` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titulo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publico_alvo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pre_requisitos` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty_participantes_grupo` int(11) DEFAULT NULL,
  `carga_horario` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `conteudo_pragmatico` text COLLATE utf8mb4_unicode_ci,
  `assistencia_tecnica` text COLLATE utf8mb4_unicode_ci,
  `galeria_fotos` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `programas_capacitacao` */

insert  into `programas_capacitacao`(`id`,`imagem`,`titulo`,`subtitulo`,`publico_alvo`,`pre_requisitos`,`qty_participantes_grupo`,`carga_horario`,`conteudo_pragmatico`,`assistencia_tecnica`,`galeria_fotos`,`created_at`,`updated_at`,`deleted_at`) values (1,'programas-capacitacao\\May2021\\C2KwtwKYxTi8tslNRPFT.png','Título','Subtítulo','Publico Alvo','Pré-requisitos',8,'Carga Horario','**Conteúdo Programático**\r\nConteúdo Programático','**Assistência Técnica**\r\nAssistência Técnica','[\"programas-capacitacao\\\\May2021\\\\tDLjebxlndXPzapYXcTK.png\",\"programas-capacitacao\\\\May2021\\\\EoIbi2MprPbXnRU5ThGb.png\",\"programas-capacitacao\\\\May2021\\\\sEODbt78VZczNIjDQ3eh.png\",\"programas-capacitacao\\\\May2021\\\\CKppcOA8ANG1JwM271Wb.png\",\"programas-capacitacao\\\\May2021\\\\8qnzm6ccYGxDac6Ht9kN.png\",\"programas-capacitacao\\\\May2021\\\\YY8eYwLiJZARc6yxa2W1.png\"]','2021-05-02 14:48:27','2021-05-02 14:48:27',NULL);

/*Table structure for table `regioes` */

DROP TABLE IF EXISTS `regioes`;

CREATE TABLE `regioes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `regiao` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cidade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supervisor_nome` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supervisor_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `regioes` */

insert  into `regioes`(`id`,`regiao`,`cidade`,`supervisor_nome`,`supervisor_email`,`created_at`,`updated_at`,`deleted_at`) values (1,'Região','Cidade','Supervisor Nome','Supervisor E-mail','2021-05-03 17:18:43','2021-05-03 17:18:43',NULL);

/*Table structure for table `relatorios_atvidades` */

DROP TABLE IF EXISTS `relatorios_atvidades`;

CREATE TABLE `relatorios_atvidades` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `download` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `relatorios_atvidades` */

insert  into `relatorios_atvidades`(`id`,`titulo`,`download`,`status`,`categoria_id`,`created_at`,`updated_at`,`deleted_at`) values (1,'Titulo','[{\"download_link\":\"relatorios-atvidades\\\\May2021\\\\NBItMXT6mAGz4HhbcviH.png\",\"original_name\":\"casaRural.png\"}]',1,1,'2021-05-03 14:17:38','2021-05-03 14:17:38',NULL);

/*Table structure for table `relatorios_atvidades_categorias` */

DROP TABLE IF EXISTS `relatorios_atvidades_categorias`;

CREATE TABLE `relatorios_atvidades_categorias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `texto` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `relatorios_atvidades_categorias` */

insert  into `relatorios_atvidades_categorias`(`id`,`titulo`,`texto`,`status`,`created_at`,`updated_at`,`deleted_at`) values (1,'Add Categoria de relatório de atividades','Add Categoria de relatório de atividades',1,'2021-05-02 17:32:01','2021-05-02 17:32:01',NULL);

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`display_name`,`created_at`,`updated_at`) values (1,'admin','Administrator','2021-03-27 22:10:47','2021-03-27 22:10:47'),(2,'user','Normal User','2021-03-27 22:10:47','2021-03-27 22:10:47');

/*Table structure for table `settings` */

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `details` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `settings` */

insert  into `settings`(`id`,`key`,`display_name`,`value`,`details`,`type`,`order`,`group`) values (1,'site.title','Site Title','Site Title','','text',1,'Site'),(2,'site.description','Site Description','Site Description','','text',2,'Site'),(3,'site.logo','Site Logo','','','image',3,'Site'),(4,'site.google_analytics_tracking_id','Google Analytics Tracking ID','','','text',4,'Site'),(5,'admin.bg_image','Admin Background Image','','','image',5,'Admin'),(6,'admin.title','Admin Title','Voyager','','text',1,'Admin'),(7,'admin.description','Admin Description','Welcome to Voyager. The Missing Admin for Laravel','','text',2,'Admin'),(8,'admin.loader','Admin Loader','','','image',3,'Admin'),(9,'admin.icon_image','Admin Icon Image','','','image',4,'Admin'),(10,'admin.google_analytics_client_id','Google Analytics Client ID (used for admin dashboard)','','','text',1,'Admin');

/*Table structure for table `sindicatos` */

DROP TABLE IF EXISTS `sindicatos`;

CREATE TABLE `sindicatos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefones` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sistema` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sindicatos` */

insert  into `sindicatos`(`id`,`nome`,`telefones`,`email`,`sistema`,`created_at`,`updated_at`) values (1,'Sindicato','Sindicato','Sindicato','Fetag','2021-05-03 17:43:50','2021-05-03 17:43:50');

/*Table structure for table `sindicatos_municipios` */

DROP TABLE IF EXISTS `sindicatos_municipios`;

CREATE TABLE `sindicatos_municipios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sindicato_id` int(11) DEFAULT NULL,
  `municipio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sindicatos_municipios` */

insert  into `sindicatos_municipios`(`id`,`sindicato_id`,`municipio`,`created_at`,`updated_at`,`deleted_at`) values (1,1,'Município','2021-05-03 17:50:37','2021-05-03 17:50:37',NULL);

/*Table structure for table `tranparencias` */

DROP TABLE IF EXISTS `tranparencias`;

CREATE TABLE `tranparencias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `texto` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tranparencias` */

insert  into `tranparencias`(`id`,`titulo`,`texto`,`created_at`,`updated_at`,`deleted_at`) values (1,'Titulo','Texto','2021-05-03 15:11:46','2021-05-03 15:11:46',NULL);

/*Table structure for table `tranparencias_arquivos` */

DROP TABLE IF EXISTS `tranparencias_arquivos`;

CREATE TABLE `tranparencias_arquivos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `transparencia_id` int(11) DEFAULT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arquivo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tranparencias_arquivos` */

insert  into `tranparencias_arquivos`(`id`,`transparencia_id`,`titulo`,`arquivo`,`created_at`,`updated_at`,`deleted_at`) values (1,NULL,'Titulo','[{\"download_link\":\"tranparencias-arquivos\\\\May2021\\\\MNsp7ma43zhKTKB2RcI4.png\",\"original_name\":\"casaRural.png\"}]','2021-05-03 15:17:36','2021-05-03 15:17:36',NULL);

/*Table structure for table `translations` */

DROP TABLE IF EXISTS `translations`;

CREATE TABLE `translations` (
  `id` int(10) unsigned NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `translations` */

insert  into `translations`(`id`,`table_name`,`column_name`,`foreign_key`,`locale`,`value`,`created_at`,`updated_at`) values (1,'data_types','display_name_singular',5,'pt','Post','2021-03-27 22:10:48','2021-03-27 22:10:48'),(2,'data_types','display_name_singular',6,'pt','Página','2021-03-27 22:10:48','2021-03-27 22:10:48'),(3,'data_types','display_name_singular',1,'pt','Utilizador','2021-03-27 22:10:48','2021-03-27 22:10:48'),(4,'data_types','display_name_singular',4,'pt','Categoria','2021-03-27 22:10:48','2021-03-27 22:10:48'),(5,'data_types','display_name_singular',2,'pt','Menu','2021-03-27 22:10:48','2021-03-27 22:10:48'),(6,'data_types','display_name_singular',3,'pt','Função','2021-03-27 22:10:48','2021-03-27 22:10:48'),(7,'data_types','display_name_plural',5,'pt','Posts','2021-03-27 22:10:48','2021-03-27 22:10:48'),(8,'data_types','display_name_plural',6,'pt','Páginas','2021-03-27 22:10:48','2021-03-27 22:10:48'),(9,'data_types','display_name_plural',1,'pt','Utilizadores','2021-03-27 22:10:48','2021-03-27 22:10:48'),(10,'data_types','display_name_plural',4,'pt','Categorias','2021-03-27 22:10:48','2021-03-27 22:10:48'),(11,'data_types','display_name_plural',2,'pt','Menus','2021-03-27 22:10:48','2021-03-27 22:10:48'),(12,'data_types','display_name_plural',3,'pt','Funções','2021-03-27 22:10:48','2021-03-27 22:10:48'),(13,'categories','slug',1,'pt','categoria-1','2021-03-27 22:10:48','2021-03-27 22:10:48'),(14,'categories','name',1,'pt','Categoria 1','2021-03-27 22:10:48','2021-03-27 22:10:48'),(15,'categories','slug',2,'pt','categoria-2','2021-03-27 22:10:48','2021-03-27 22:10:48'),(16,'categories','name',2,'pt','Categoria 2','2021-03-27 22:10:48','2021-03-27 22:10:48'),(17,'pages','title',1,'pt','Olá Mundo','2021-03-27 22:10:48','2021-03-27 22:10:48'),(18,'pages','slug',1,'pt','ola-mundo','2021-03-27 22:10:48','2021-03-27 22:10:48'),(19,'pages','body',1,'pt','<p>Olá Mundo. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\r\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>','2021-03-27 22:10:48','2021-03-27 22:10:48'),(20,'menu_items','title',1,'pt','Painel de Controle','2021-03-27 22:10:48','2021-03-27 22:10:48'),(21,'menu_items','title',2,'pt','Media','2021-03-27 22:10:48','2021-03-27 22:10:48'),(22,'menu_items','title',12,'pt','Publicações','2021-03-27 22:10:48','2021-03-27 22:10:48'),(23,'menu_items','title',3,'pt','Utilizadores','2021-03-27 22:10:48','2021-03-27 22:10:48'),(24,'menu_items','title',11,'pt','Categorias','2021-03-27 22:10:48','2021-03-27 22:10:48'),(25,'menu_items','title',13,'pt','Páginas','2021-03-27 22:10:48','2021-03-27 22:10:48'),(26,'menu_items','title',4,'pt','Funções','2021-03-27 22:10:48','2021-03-27 22:10:48'),(27,'menu_items','title',5,'pt','Ferramentas','2021-03-27 22:10:48','2021-03-27 22:10:48'),(28,'menu_items','title',6,'pt','Menus','2021-03-27 22:10:48','2021-03-27 22:10:48'),(29,'menu_items','title',7,'pt','Base de dados','2021-03-27 22:10:48','2021-03-27 22:10:48'),(30,'menu_items','title',10,'pt','Configurações','2021-03-27 22:10:48','2021-03-27 22:10:48');

/*Table structure for table `user_roles` */

DROP TABLE IF EXISTS `user_roles`;

CREATE TABLE `user_roles` (
  `user_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `user_roles_user_id_index` (`user_id`),
  KEY `user_roles_role_id_index` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `user_roles` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`role_id`,`name`,`email`,`avatar`,`email_verified_at`,`password`,`remember_token`,`settings`,`created_at`,`updated_at`) values (1,1,'Admin','admin@admin.com','users/default.png',NULL,'$2y$10$TCfaCZOk31A/NxMqcbcYr.OrGyD7.fR3xcgrAXDn.h7RclHtbL3J6','R8oWtJcTXeG6B9QMlCUAlT2pFQq5cGf2fRZZyhjJLEGLywVrtdVG8mYTfUVH',NULL,'2021-03-27 22:10:48','2021-03-27 22:10:48'),(2,1,'Leonardo Menezes','leonardo@lsmenezes.com.br','users/default.png',NULL,'$2y$10$nTTwNZiEjC4utkT2OOi.ju5Bs7fAzGRvkXEHfu2A0Q8qFNf40TYJi',NULL,'{\"locale\":\"en\"}','2021-05-02 13:06:45','2021-05-02 13:06:45');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
