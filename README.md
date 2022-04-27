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

1 - Realize o download do [`docker`](https://www.docker.com/get-started)
</br>

2 - Realize o clone do projeto

3 - Instale as dependências do PHP e a configuração do ambiente via [`composer`](https://getcomposer.org)
> Utilizando o composer local
>
> ```bash
> composer install
> ```
> Utilizando o composer local
</br>

## Tecnologias utilizadas
* PHP: 8.1
* Laravel: 9.9.0
* Composer: 2.2.6
* Laradock
* Docker
* Bash
