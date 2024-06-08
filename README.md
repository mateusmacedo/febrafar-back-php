# Agenda API

Esta é uma API Restful para um módulo de agenda desenvolvida em Laravel 8+ e MySQL 8. A API permite gerenciar atividades com funcionalidades de CRUD (Create, Read, Update, Delete) e autenticação de usuários usando Laravel Sanctum.

## Funcionalidades

- **CRUD de Atividades**: Criação, leitura, atualização e exclusão de atividades.
- **Autenticação**: Uso de Laravel Sanctum para autenticação de usuários.
- **Filtragem por Data**: Filtragem de atividades por intervalo de datas.
- **Validação de Datas**: Não permite o cadastro de atividades em finais de semana ou com datas sobrepostas.
- **Documentação da API**: Documentação gerada com Swagger.
- **Testes Automatizados**: Testes unitários com PHPUnit.

## Tecnologias Utilizadas

- PHP 8+
- Laravel 8+
- MySQL 8
- Laravel Sanctum
- PHPUnit
- Swagger

## Requisitos

- PHP 8+
- Composer
- MySQL 8

## Instalação

1. Clone o repositório:

   ```bash
   git clone https://github.com/seu-usuario/agenda-api.git
   cd agenda-api
   ```

2. Instale as dependências:

   ```bash
   composer install
   ```

3. Configure o arquivo `.env`:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=agenda
   DB_USERNAME=root
   DB_PASSWORD=yourpassword
   ```

4. Gere a chave da aplicação:

   ```bash
   php artisan key:generate
   ```

5. Execute as migrations:

   ```bash
   php artisan migrate
   ```

6. Publique as configurações do Laravel Sanctum:

   ```bash
   php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
   php artisan migrate
   ```

## Uso

### Autenticação

Para usar a API, você precisa autenticar o usuário usando Laravel Sanctum. Registre um usuário e obtenha um token de autenticação.

### Endpoints

- **Listar Atividades**

  ```http
  GET /api/activities
  ```

  Parâmetros de consulta:
  - `start_date`: Data de início do filtro.
  - `end_date`: Data final do filtro.

- **Criar Atividade**

  ```http
  POST /api/activities
  ```

  Corpo da requisição:

  ```json
  {
      "title": "Título da Atividade",
      "type": "Tipo da Atividade",
      "description": "Descrição da Atividade",
      "user_id": 1,
      "start_date": "2024-06-10",
      "due_date": "2024-06-11",
      "status": "open"
  }
  ```

- **Mostrar Atividade**

  ```http
  GET /api/activities/{id}
  ```

- **Atualizar Atividade**

  ```http
  PUT /api/activities/{id}
  ```

  Corpo da requisição:

  ```json
  {
      "title": "Novo Título da Atividade",
      "type": "Novo Tipo da Atividade",
      "description": "Nova Descrição da Atividade",
      "start_date": "2024-06-12",
      "due_date": "2024-06-13",
      "status": "completed"
  }
  ```

- **Excluir Atividade**

  ```http
  DELETE /api/activities/{id}
  ```

### Documentação da API

A documentação da API está disponível via Swagger. Acesse `/api/documentation` para visualizar a documentação completa dos endpoints.

## Testes

Para executar os testes automatizados, use o comando:

```bash
php artisan test
```

## Contribuição

Sinta-se à vontade para contribuir com o projeto. Para isso, siga os passos abaixo:

1. Faça um fork do repositório.
2. Crie uma branch para a sua feature (`git checkout -b feature/nova-feature`).
3. Commit suas mudanças (`git commit -am 'Adiciona nova feature'`).
4. Faça push para a branch (`git push origin feature/nova-feature`).
5. Crie um novo Pull Request.

## Licença

Este projeto está licenciado sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.
