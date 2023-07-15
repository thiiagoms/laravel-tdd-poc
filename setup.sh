#!/usr/bin/env bash

reset

RED="\e[31m"
GREEN="\e[32m"
WHITE="\e[97m"
ENDCOLOR="\e[0m"

echo -e "
${RED}
██╗      █████╗ ██████╗  █████╗ ██╗   ██╗███████╗██╗         ████████╗██████╗ ██████╗
██║     ██╔══██╗██╔══██╗██╔══██╗██║   ██║██╔════╝██║         ╚══██╔══╝██╔══██╗██╔══██╗
██║     ███████║██████╔╝███████║██║   ██║█████╗  ██║            ██║   ██║  ██║██║  ██║
██║     ██╔══██║██╔══██╗██╔══██║╚██╗ ██╔╝██╔══╝  ██║            ██║   ██║  ██║██║  ██║
███████╗██║  ██║██║  ██║██║  ██║ ╚████╔╝ ███████╗███████╗       ██║   ██████╔╝██████╔╝
╚══════╝╚═╝  ╚═╝╚═╝  ╚═╝╚═╝  ╚═╝  ╚═══╝  ╚══════╝╚══════╝       ╚═╝   ╚═════╝ ╚═════╝
${ENDCOLOR}

    [*] Author: thiiagoms
    [*] E-mail: hiiagoms@proton.me
"

param=$1;

if [ "$param" = '--down' ]; then
    echo -e "[*] Desativando containers...\n"
    docker-compose down
    exit 1
fi

if [ "$param" = '--tests' ]; then
    echo -e "[*] Executando os testes...\n"
    docker-compose exec app php artisan test
    exit 1
fi

echo -e "=> Iniciando os containers (Isso pode demorar um pouco...)\n"
docker-compose up -d

echo -e "=> Instalando dependências da aplicação\n"
docker-compose exec app composer install

echo -e "=> Executando migrations\n"
docker-compose exec app cp .env.example .env
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan migrate
docker-compose exec app php artisan db:seed

echo -e "[*] Aplicação disponível em ${GREEN}http://localhost:8000/api/category${ENDCOLOR}\n"
