> **ATENÇÃO 1:** execute os comandos e procedimentos na sequencia em que são apresentados aqui.

> **ATENÇÃO 2:** quando o comando precisar ser executado como **root** ele virá precedido desta indicação **root@server#**. Quando o comando precisar ser executado como **usuário da aplicação** ele virá precedido desta indicação **user@server$**. 

## Prepare o servidor

Você precisa de um servidor com algum dos seguintes sistemas operacionais:

* Ubuntu 16.04 


> **ATENÇÃO 3:** É possível instalar em outras distribuições, no entanto não fizemos os testes de 
deploy que recobrem esses procedimentos. Você pode fazer estes testes e construir uma documentação com base em outros servidores. Se fizer isso, mande um pullrequest para a gente que incluiremos a documentação neste repositório oficial. 

## Dependências

* Atualize o **ÍNDICE DE PACOTES** de seu servidor

```
root@server# apt-get update
```

* Instale a ferramenta de versionamento de código **GIT**

```
root@server# apt-get install git

```
* Instale o servidor web e proxy **NGINX**

```
root@server# apt-get install nginx
```

* Instale alguns pacotes do php 7, entre os quais: **PHP7.1, PHP-GD, PHP-MCRYPT, PHP-JSON e PHP-FPM**

```
root@server# apt-get install php7.1 php-gd php-mcrypt php-json php-fpm
```

* Instale a ferramenta de banco de dados **MYSQL** em versão 5.7 ou superior

```
root@server# apt-get install mysql-server
```

* Instale a ferramenta **MEMCACHED**

```
root@server# apt-get install memcached
```

* Instale a ferramenta **BEANSTALKD**

```
root@server# apt-get install beanstalkd
```

- ElasticSearch

## User App

Sugerimos que o usuário usado para fazer a instalação não seja o root. Aqui, o usuário que está fazendo a instalação é o **buscaativa**. Assim, nos comandos abaixo, substitua o nome do usuário pelo que você estiver usando. 


```
root@server# useradd --create-home buscaativa
```
Mude a senha:

```
root@server# passwd buscaativa
```

Logue com o user da aplicação
```
root@server# su - buscaativa
```

Clone os repositórios das diferentes partes da aplicação dentro de cada diretório correspondente aos multiplos serviços. Sugerimos criar essas pastas na home do user da aplicação. 


```
buscaativa@server$ git clone https://github.com/lqdi/busca-ativa-escolar-lp.git YOUR-URL.com.br
buscaativa@server$ git clone https://github.com/lqdi/busca-ativa-escolar-alert-page.git ALERT.YOUR-URL.com.br
buscaativa@server$ git clone https://github.com/lqdi/busca-ativa-escolar-web.git WEB.YOUR-URL.com.br
buscaativa@server$ git clone https://github.com/institutotim/busca-ativa-escolar-api.git API.YOUR-URL.com.br
```

 

