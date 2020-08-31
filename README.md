# raqiel

## Descrição

raqiel é um sistema livre de chamados técnicos.

## Passo-a-passo para implementar o sistema:

0. Garanta que sua maquina tenha apache2;

1. Setup mysql

Após fazer essa sessão lembre de editar o arquivo "inc/config.php", cada variável dele esta entre parenteses abaixo;

1a. Crie uma conta de usuario ( '$adm_user' ) com privilégios no mysql e senha ( '$adm_passwd' );

1b. Crie um banco de dados ( '$db' );

1c. Crie 3 tabelas, uma para chamados ( '$db_cht' ), uma para funcionario ( '$db_func' ) e a terceira para os comentario( '$db_comment' );

A estrutura detalhada de cada tabela pode ser consultada no arquivo "documentation/Estrutura_do_Banco_de_Dados.txt";

Os comandos para criar cada tabela são:

'CREATE TABLE tbchamado(
numero INT AUTO_INCREMENT,
nome VARCHAR(30),
email VARCHAR(40),
ramal VARCHAR(30),
sala VARCHAR(4),
setor VARCHAR(10),
solicitacao TEXT,
tipo TINYINT(1),
status TINYINT(1),
data DATETIME,
patrimonio VARCHAR(8),
atendimento_na_ausencia TINYINT(1),
horario_preferencial VARCHAR(255),
PRIMARY KEY ( numero )
);'
'CREATE TABLE tbfunc(
id INT AUTO_INCREMENT,
nome VARCHAR(30),
senha VARCHAR(32),
PRIMARY KEY ( id )
);'
'CREATE TABLE tbcomment(
id INT AUTO_INCREMENT,
numCht SMALLINT(10),
user VARCHAR(30),
comment TEXT,
PRIMARY KEY ( id )
);'

1.3) Renomeie '$servername' para o nome/IP do seu servidor;

1.4) Adicione uma entrada no $db_func para fazer o primeiro login:
'INSERT INTO tbfunc VALUES('root',md5('batata'));'

2) Setup PHP

2.0) Habilite o modo de debug no arquivo "/etc/php/7.3/apache2/php.ini" para caso algo dê errado;
2.1) Instale a biblioteca mysqli;
    'sudo apt-get install php-mysqli'

Pronto! Tudo deve estar funcionando!
