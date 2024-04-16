<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Requisitos para rodar a aplicação


- PHP 8.2.12
- Apache
- MySQL
- Xampp (opcional)

## Instruções

Renomeie o arquivo .env.example somente para .env e adicionar sua API Key na chave TMDB_APP_KEY do arquivo. Você pode conseguir uma api Key diretamente no [site do TMDB](https://developer.themoviedb.org/reference/intro/getting-started)

Após isso, caso você possua o Xampp instalado, basta dar o start no Apache e no MySQL. Do contrário, precisará rodá-los individualmente.

Entre na pasta em que o projeto está localizado, abra um terminal e digite "php artisan serve". A aplicação estará acessível no endereço localhost:8000/home.

## Como usar

Será necessário criar um novo registro e logar na aplicação com seu login. Com acesso a plataforma, todos os usuários poderão adicionar, editar e  remover filmes e clientes. Ainda é possível fazer as mesmas ações nas locações, também podendo marcá-las como devolvidas pelos clientes.

## Sobre

Este projeto é um trabalho para a disciplina de Desenvolvimento Web I do prof. Allan para pós graduação em desenvolvimento web do IFSP Barretos.

## Screenshots

<p align="center">
<img src="https://i.imgur.com/ZsYMtB6.png" alt="Login Screen">
<img src="https://i.imgur.com/tVculXa.png" alt="Movie List">
<img src="https://i.imgur.com/uof5sBy.png" alt="Dashboard">
<img src="https://i.imgur.com/ByumCvU.png" alt="Customer List">
<img src="https://i.imgur.com/yCtQ8te.png" alt="Rent List">
<img src="https://i.imgur.com/3QSS05v.png" alt="Customer Details">
</p>