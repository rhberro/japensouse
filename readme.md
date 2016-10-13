# Japensouse

[ ![StyleCI](https://styleci.io/repos/70777400/shield?branch=master)](https://styleci.io/repos/70777400)
[ ![Codeship Status for rhberro/japensouse](https://app.codeship.com/projects/a9b77090-7341-0134-92cd-7e557d266949/status?branch=master)](https://app.codeship.com/projects/178828)

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

## Licença
O projeto Japensouse é uma aplicação open-source disponibilizada nos termos da  licença [MIT](http://opensource.org/licenses/MIT).
