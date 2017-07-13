# Japensouse

Este é um projeto pessoal que inicialmente foi criado para auxiliar no gerenciamento de idéias enviadas através de uma página na web. Atualmente o projeto serve como um estudo do framework e não está em uso.

---

- [**Requerimentos**](#requerimentos)
- [**Instalação**](#instalação)
- [**Contribuindo**](#contribuindo)
- [**Licença**](#licença)

---

## Requerimentos

- Composer
- Node Package Manager
- PHP >= 5.6.4
    - OpenSSL PHP Extension
    - PDO PHP Extension
    - Mbstring PHP Extension
    - Tokenizer PHP Extension
    - XML PHP Extension

## Instalação

Faça um clone do repositório.

```
git clone git@github.com:rhberro/japensouse.git
```

Acesse a pasta do projeto e crie um clone do arquivo .env.example nomeado .env.

```
cd japensouse
cp .env.example .env
```

Instale as dependências do composer.

```
composer install
```

Execute o comando para gerar uma chave para a aplicação.

```
php artisan key:generate
```

Instale as dependências do node package manager.

```
npm install
```

Execute o comando para gerar os estilos e os scripts de toda a aplicação.

```
gulp
```

Antes de executar o seguinte comando, você precisa configurar os dados do seu banco de dados dentro do arquivo .env que se localiza na raíz do projeto.

```
php artisan migrate --seed
```

## Contribuindo

A contribuição está desabilitada pelo fato do projeto ser apenas para estudos.

## Licença

O projeto Japensouse é uma aplicação open-source disponibilizada nos termos da  licença [MIT](http://opensource.org/licenses/MIT).
