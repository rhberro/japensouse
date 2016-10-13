# Japensouse

[ ![StyleCI](https://styleci.io/repos/70777400/shield?branch=master)](https://styleci.io/repos/70777400)
[ ![Build Status](https://travis-ci.org/rhberro/japensouse.svg?branch=master)](https://travis-ci.org/rhberro/japensouse)

## Descrição

Este é um projeto pessoal que inicialmente foi criado para auxiliar no gerenciamento de idéias enviadas através de uma página na web. Atualmente o projeto serve como um estudo do framework e não está em produção.

## Requerimentos

- PHP >= 5.6.4
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension

## Instalação

```
git clone git@github.com:rhberro/japensouse.git
cd japensouse
cp .env.example .env
composer install
php artisan key:generate
npm install
gulp
php artisan migrate --seed
```


> **Nota:** Você precisa configurar seu banco de dados dentro do arquivo .env antes de executar o último comando da lista de instalação, caso contrário o comando vai resultar em um erro e sua aplicação não vai funcionar.

## Licença
O projeto Japensouse é uma aplicação open-source disponibilizada nos termos da  licença [MIT](http://opensource.org/licenses/MIT).
