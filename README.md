# Seleção de Desenvolvedor de Software - Escribo (TT3)

## :memo: Sobre
Implementar sistema CRUD de aluguel de veiculos com Slim Framework


## 👷 Como rodar

```bash
#Instale o composer
https://getcomposer.org

#Utilizando o XAMPP, clone o repositório na pasta \xampp\htdocs
git clone https://github.com/viniciusFelipeS/selecao-estribo-3

#Baixe as dependências
composer install

#Importe o banco de dados localizado na pasta sql
#Configure a conexão com o Banco de dados com as definições do seu sistema localizado no arquivo .env
DB_NAME...

#Altere o path do site para o nome da pasta principal no arquivo .env
URL_PATH

#Acesse localhost/pathDoSite para iniciar a aplicação
```


## 🛣️ Possiveis Rotas

| Nome da Rota | Caminho  |        Request        | Response |
|--------------|----------|:---------------------:|----------|
| Home         |     /    |        GET POST       |   json   |
| Pedidos      | /pedidos |        GET POST       |   json   |
| API          |   /api   | GET POST PATCH DELETE |   json   |
| Login        |  /login  |        GET POST       |   json   |
| Admin        |  /admin  | GET POST PATCH DELETE |   json   |
| LogOut       |  /logout |          POST         | Location |


## ➕ Outros

Perfil admin para acesso
email: admin@admin
senha: admin



