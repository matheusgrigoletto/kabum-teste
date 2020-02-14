CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `users` VALUES (1, 'Kabum Admin', 'admin@kabum.com.br', SHA1('admin!kabum'), SYSDATE(), SYSDATE());

CREATE TABLE `clients` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `data_nascimento` date DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `rg` varchar(20) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `endereco` TEXT DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

insert into clients (id, nome, data_nascimento, cpf, rg, telefone) values (1, 'Kaleena Riseborough', '1992-07-17', '000.000.000-00', '00.000.000-0', '5321193767');
insert into clients (id, nome, data_nascimento, cpf, rg, telefone) values (2, 'Aguste Abramov', '1982-08-15', '000.000.000-00', '00.000.000-0', '1189215488');
insert into clients (id, nome, data_nascimento, cpf, rg, telefone) values (3, 'Jolene Duerdin', '1997-10-25', '000.000.000-00', '00.000.000-0', '5745773760');
insert into clients (id, nome, data_nascimento, cpf, rg, telefone) values (4, 'Roddy Witch', '1973-11-20', '000.000.000-00', '00.000.000-0', '7699964711');
insert into clients (id, nome, data_nascimento, cpf, rg, telefone) values (5, 'Eliza Loughan', '1993-09-11', '000.000.000-00', '00.000.000-0', '1389593081');
insert into clients (id, nome, data_nascimento, cpf, rg, telefone) values (6, 'Marlin Antonutti', '1994-10-01', '000.000.000-00', '00.000.000-0', '1838302995');
insert into clients (id, nome, data_nascimento, cpf, rg, telefone) values (7, 'Rob Meynell', '1981-12-26', '000.000.000-00', '00.000.000-0', '5868816704');
insert into clients (id, nome, data_nascimento, cpf, rg, telefone) values (8, 'Nydia Broune', '2003-09-08', '000.000.000-00', '00.000.000-0', '3535040325');
insert into clients (id, nome, data_nascimento, cpf, rg, telefone) values (9, 'Kerk Summerscales', '1979-06-27', '000.000.000-00', '00.000.000-0', '9235569981');
insert into clients (id, nome, data_nascimento, cpf, rg, telefone) values (10, 'Gnni Purdom', '2002-05-28', '000.000.000-00', '00.000.000-0', '4408679477');
insert into clients (id, nome, data_nascimento, cpf, rg, telefone) values (11, 'Hunt Seyers', '1990-10-17', '000.000.000-00', '00.000.000-0', '5583866733');
insert into clients (id, nome, data_nascimento, cpf, rg, telefone) values (12, 'Sonia Feron', '1995-02-24', '000.000.000-00', '00.000.000-0', '5007912624');
insert into clients (id, nome, data_nascimento, cpf, rg, telefone) values (13, 'Derby Parlet', '1995-12-13', '000.000.000-00', '00.000.000-0', '7408605141');
insert into clients (id, nome, data_nascimento, cpf, rg, telefone) values (14, 'Keslie Keyte', '1982-03-25', '000.000.000-00', '00.000.000-0', '5754663219');
insert into clients (id, nome, data_nascimento, cpf, rg, telefone) values (15, 'Thorny Anstey', '1988-04-19', '000.000.000-00', '00.000.000-0', '9572331231');
