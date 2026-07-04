# Store API - API Contract

Documentação da API REST desenvolvida com Laravel para fins de estudo e evolução em desenvolvimento backend.

---

# 🌐 Base URL

```
http://localhost:8000/api
```

---

# 📚 Endpoints

| Método | Endpoint | Auth | Descrição |
|---------|----------|:---:|-----------|
| POST | `/register` | ❌ | Registrar usuário |
| POST | `/login` | ❌ | Realizar login |
| POST | `/logout` | ✅ | Encerrar sessão |
| GET | `/products` | ✅ | Listar produtos do usuário autenticado |
| POST | `/products` | ✅ | Criar produto |
| PUT | `/products/{product}` | ✅ | Atualizar produto |
| DELETE | `/products/{product}` | ✅ | Excluir produto |

---

# 🔐 Autenticação

A API utiliza **Laravel Sanctum** para autenticação.

Após realizar o login ou registro, um token é retornado.

Todas as rotas protegidas devem enviar os seguintes headers:

```http
Content-Type: application/json
Accept: application/json
Authorization: Bearer {token}
```

---

# 📦 Padrão de Resposta

### ✅ Sucesso

```json
{
    "message": "Operação realizada com sucesso",
    "data": {}
}
```

### ❌ Erro

```json
{
    "message": "Descrição do erro",
    "errors": {}
}
```

---

# 👤 Autenticação

## 📝 Registrar usuário

**POST** `/register`

### Body

```json
{
    "name": "João",
    "email": "joao@email.com",
    "password": "123456",
    "password_confirmation": "123456"
}
```

### Resposta

**Status:** `201 Created`

```json
{
    "message": "Usuário registrado com sucesso",
    "data": {
        "user": {
            "id": 1,
            "name": "João",
            "email": "joao@email.com"
        },
        "token": "..."
    }
}
```

---

## 🔑 Login

**POST** `/login`

### Body

```json
{
    "email": "joao@email.com",
    "password": "123456"
}
```

### Resposta

**Status:** `200 OK`

```json
{
    "message": "Login realizado com sucesso",
    "data": {
        "user": {
            "id": 1,
            "name": "João",
            "email": "joao@email.com"
        },
        "token": "..."
    }
}
```

---

## 🚪 Logout

**POST** `/logout`

🔒 Requer autenticação.

### Resposta

**Status:** `200 OK`

```json
{
    "message": "Logout realizado com sucesso"
}
```

---

# 📦 Produtos

> Todas as rotas abaixo exigem autenticação.

---

## 📄 Listar produtos

**GET** `/products`

### Resposta

**Status:** `200 OK`

```json
{
    "data": [
        {
            "id": 1,
            "name": "Saxofone Alto",
            "description": "Yamaha YAS-32",
            "price": 150,
            "stock": 10
        }
    ]
}
```

---

## ➕ Criar produto

**POST** `/products`

### Body

```json
{
    "name": "Saxofone Alto",
    "description": "Yamaha YAS-32",
    "price": 150,
    "stock": 10
}
```

### Resposta

**Status:** `201 Created`

```json
{
    "message": "Produto criado com sucesso",
    "data": {
        "id": 1,
        "name": "Saxofone Alto",
        "description": "Yamaha YAS-32",
        "price": 150,
        "stock": 10
    }
}
```

---

## ✏️ Atualizar produto

**PUT** `/products/{product}`

### Body

```json
{
    "name": "Saxofone Atualizado",
    "description": "Modelo atualizado",
    "price": 250,
    "stock": 5
}
```

### Resposta

**Status:** `200 OK`

```json
{
    "message": "Produto atualizado com sucesso",
    "data": {
        "id": 1,
        "name": "Saxofone Atualizado",
        "description": "Modelo atualizado",
        "price": 250,
        "stock": 5
    }
}
```

---

## 🗑️ Excluir produto

**DELETE** `/products/{product}`

### Resposta

**Status:** `200 OK`

```json
{
    "message": "Produto deletado com sucesso"
}
```

---

# ⚠️ Possíveis respostas de erro

## ❌ 401 Unauthorized

Usuário não autenticado.

```json
{
    "message": "Unauthenticated."
}
```

---

## 🚫 403 Forbidden

Usuário tentou acessar, atualizar ou excluir um produto pertencente a outro usuário.

```json
{
    "message": "Unauthorized action."
}
```

---

## 📝 422 Unprocessable Entity

Erro de validação dos dados enviados.

```json
{
    "message": "Os dados enviados são inválidos.",
    "errors": {
        "email": [
            "Email é obrigatório."
        ]
    }
}
```

---


# ⚙️ Tecnologias

- PHP 8+
- Laravel 12
- MySQL
- Laravel Sanctum

---

# 🚀 Objetivo

Este projeto foi desenvolvido com foco em praticar:

- Desenvolvimento de APIs REST
- Arquitetura em camadas (Controller, Service e Repository)
- Autenticação com Laravel Sanctum
- CRUD completo
- Ownership (controle de acesso por proprietário)
- Validação de dados com Form Requests
- Organização de código seguindo boas práticas
- Versionamento utilizando Git