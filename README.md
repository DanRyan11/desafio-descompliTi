<!-- docker-compose up -d nginx mysql -->
<!-- docker-compose exec --user=laradock workspace bash -->
<!-- php artisan migrate -->

## Api para o teste da DescompliTi

Este projeto disponibiliza uma API REST que permite o acesso as cidades e estados integrando com a API de localidades do IBGE, e também a criação de endereços.

Recursos disponíveis para acesso via API:
* **Cidade**
* **Estado**
* **Endereço**

</br>

## Métodos
Requisições para a API devem seguir os padrões:
| Método | Descrição |
|---|---|
| `GET` | Retorna informações de um ou mais registros. |
| `POST` | Utilizado para criar um novo registro. |
| `PUT` | Atualiza dados de um registro ou altera sua situação. |
| `DELETE` | Remove um registro do sistema. |

## Respostas

| Código | Descrição |
|---|---|
| `200` | Requisição executada com sucesso (success).|
| `201` | Registro criado com sucesso (success).|
| `202` | Registro editado com sucesso (success).|
| `204` | Registro deletado com sucesso (success).|
| `400` | Erros de validação ou os campos informados não existem no sistema.|
| `401` | Dados de acesso inválidos.|
| `404` | Registro pesquisado não encontrado (Not found).|
| `405` | Método não implementado.|
| `422` | Dados informados estão fora do escopo definido para o campo.|
| `429` | Número máximo de requisições atingido. (*aguarde alguns segundos e tente novamente*)|

## Documentação da API
[**Documentação**](https://documenter.getpostman.com/view/9571261/UyrEgZjd)

## Ambiente de desenvolvimento com Docker

1 - Realize o download do [`docker`](https://www.docker.com/get-started), aconselhavel caso utilizar windows utilizar a distro linux.
</br>

2 - Realize o clone do projeto desafio-tr da forma que for melhor

3 - Configure o ambiente do laradock executando o script shell '**initLaradock.sh**' na raiz do projeto
> Caso ocorra algum erro efetue a instalação manual do laradock

INSTALAÇÃO MANUAL DO AMBIENTE LARADOCK

3.1 - Clone o diretório do laradock
> Utilizando o composer local
>
> ```bash
> git clone https://github.com/Laradock/laradock.git;
> ```
> Caso ocorra algum erro, é necessário fazer a configuração do ambiente manualmente

3.2 - Copie o .env.laradock para o .env do laradock
>
> ```bash
> cp .env.laradock ./laradock/.env;
> ```

3.3 - Entre na pasta laradock e suba os containers
>
> ```bash
> cd laradock; # Entra na pasta laradock
> docker-compose up -d nginx mysql; #  Faz o build dos container e sobe eles
> ```

4 - Instale as dependências do PHP via composer executando o comando dentro do container workspace
> ```bash
> composer install
> ```
</br>

5 - Execute as migrations
> Utilizando o artisan
> ```bash
> php artisan migrate
> ```
> Caso não funcione execute diretamente no container workspace

## Tecnologias utilizadas
* PHP: 8.1
* Laravel: 9.9.0
* Composer: 2.2.6
* Laradock
* Docker
* Bash
