#!/bin/bash

echo "--------Configurando o ambiente do laradock...--------"

if [ ! -d ./laradock ]
then
    echo "Clonando repositório laradock"
    git clone https://github.com/Laradock/laradock.git ./laradock;
    echo "Sucesso: laradock clonado"
fi

echo "Configurando .env"
cp .env.laradock ./laradock/.env;
echo "Sucesso: .env configurado!"

echo "Subindo os containers do Nginx e do Mysql"
cd ./laradock;docker-compose up -d nginx mysql;
echo "Sucesso: containers online"

echo "--------Ambiente configurado com sucesso--------"