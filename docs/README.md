# Store API - Laravel

API REST desenvolvida com Laravel para fins de estudo e evolução em desenvolvimento backend.

Projeto focado em autenticação, CRUD e controle de ownership (cada usuário pode acessar apenas os próprios recursos).

---

## 📷 Demonstração

### Autenticação
[INSERIR PRINT AQUI]

### Criação de produto
[INSERIR PRINT AQUI]

---

## 📌 Funcionalidades

- Registro de usuários
- Login e logout utilizando Laravel Sanctum
- CRUD completo de produtos
- Controle de ownership (cada usuário acessa apenas seus próprios produtos)
- Validação de dados com Form Requests
- Tratamento de erros de autenticação, autorização e validação
- Arquitetura em camadas (Controllers, Services e Repositories)

---

## 🧱 Arquitetura

O projeto foi estruturado seguindo separação de responsabilidades:

- Controllers
- Services
- Repositories
- Form Requests
- Models

---

## ⚙️ Tecnologias

- PHP 8+
- Laravel
- MySQL
- Laravel Sanctum

---

## 📄 Documentação

A documentação adicional está disponível na pasta `docs/`.

- **API Contract:** `docs/API_CONTRACT.md`
- **Coleção do Bruno:** `docs/bruno/`

O API Contract descreve todos os endpoints, regras de negócio, exemplos de requisições, respostas e códigos de erro da API.

A coleção do Bruno permite importar todas as requisições e testar a API rapidamente.

---

## 🚀 Como rodar o projeto

```bash
git clone https://github.com/Caualopesrlp/store-api

cd store-api

composer install

cp .env.example .env

php artisan key:generate

php artisan migrate

php artisan serve
```

A API ficará disponível em:

```text
http://localhost:8000/api
```

---

## 🧪 Testando a API

O projeto inclui uma coleção do **Bruno** para facilitar os testes.

1. Abra a pasta `docs/bruno` no Bruno.
2. Configure o ambiente local, caso necessário.
3. Execute o endpoint de **Register** ou **Login**.
4. Utilize o token retornado para acessar as rotas protegidas.

---

## 🎯 Objetivos do projeto

Este projeto foi desenvolvido para praticar:

- Desenvolvimento de APIs REST com Laravel
- Autenticação utilizando Laravel Sanctum
- Arquitetura em camadas
- CRUD completo
- Ownership (controle de acesso por proprietário)
- Validação de dados
- Boas práticas de organização de código
- Versionamento utilizando Git

---

## 👨‍💻 Autor

**Cauã Lopes**

- GitHub: https://github.com/Caualopesrlp
- LinkedIn: https://linkedin.com/in/caualopesrlp