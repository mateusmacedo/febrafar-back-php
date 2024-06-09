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
   git clone https://github.com/mateusmacedo/febrafar-back-php
   cd febrafar-back-php
   ```

2. Instale as dependências:

   ```bash
   composer install
   ```

3. Copie o arquivo `.env.example` para `.env` e configure o banco de dados:

   ```bash
   cp .env.example .env
   ```

4. Gere a chave da aplicação:

   ```bash
   php artisan key:generate
   ```

5. Execute o docker-compose para subir o banco de dados:

   ```bash
   docker-compose up -d
   ```

6. Execute as migrações e os seeders:

   ```bash
    php artisan migrate --seed
    ```

### Docker

Este projeto possui um arquivo `docker-compose.yml` para facilitar a execução do projeto. Para subir o ambiente, execute o comando:

```bash
docker-compose up -d
```

Para derrubar o ambiente, execute o comando:

```bash
docker-compose down
```

Ele irá subir um webserver Nginx, um container com o PHP(FPM), MySQL 8, Redis e RabbitMQ.

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
