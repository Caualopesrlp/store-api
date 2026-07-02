Boa — você tem razão, isso fragmentado atrapalha mesmo. Vou te mandar **100% em um único bloco**, pronto pra copiar e colar direto no arquivo.

---

````md
# Store API

## 📌 Visão Geral

Esta API tem como objetivo gerenciar produtos e usuários, aplicando boas práticas de arquitetura backend com Laravel.

A aplicação segue arquitetura em camadas (Controller, Service, Repository) e padrão REST.

Todas as respostas são retornadas em JSON com estrutura padronizada.

---

## 📦 Padrão de Resposta

### ✅ Success Response

```json
{
  "message": "Operation successful",
  "data": {}
}
````

---

### ❌ Error Response

```json
{
  "message": "Operation failed",
  "errors": {}
}
```

Todas as respostas da API seguem este padrão.

---

## 👤 Users

### 📌 Register User

POST /api/register

Request Body:
{
"name": "John Doe",
"email": "[john@email.com](mailto:john@email.com)",
"password": "password"
}

Response:
{
"message": "User registered successfully",
"data": {
"id": 1,
"name": "John Doe",
"email": "[john@email.com](mailto:john@email.com)"
}
}

---

### 📌 Login User

POST /api/login

Request Body:
{
"email": "[john@email.com](mailto:john@email.com)",
"password": "password"
}

Response:
{
"message": "Login successful",
"data": {
"token": "auth_token_here"
}
}

---

### 📌 Get Authenticated User

GET /api/me

Headers:
Authorization: Bearer {token}

Response:
{
"message": "User retrieved successfully",
"data": {
"id": 1,
"name": "John Doe",
"email": "[john@email.com](mailto:john@email.com)"
}
}

---

## 🛍️ Products

### 📌 List Products

GET /api/products

Response:
{
"message": "Products retrieved successfully",
"data": [
{
"id": 1,
"name": "Mouse",
"description": "Wireless mouse",
"price": "99.90",
"stock": 10
}
]
}

---

### 📌 Get Product by ID

GET /api/products/{id}

Success Response:
{
"message": "Product retrieved successfully",
"data": {
"id": 1,
"name": "Mouse",
"description": "Wireless mouse",
"price": "99.90",
"stock": 10
}
}

Error Response:
{
"message": "Product not found"
}

---

### 📌 Create Product

POST /api/products

Headers:
Authorization: Bearer {token}

Request Body:
{
"name": "Mouse",
"description": "Wireless mouse",
"price": 99.90,
"stock": 10
}

Response:
{
"message": "Product created successfully",
"data": {
"id": 1,
"name": "Mouse",
"description": "Wireless mouse",
"price": "99.90",
"stock": 10
}
}

---

### 📌 Update Product

PUT /api/products/{id}

Headers:
Authorization: Bearer {token}

Request Body:
{
"name": "Mouse Updated",
"description": "Updated description",
"price": 120.00,
"stock": 5
}

Response:
{
"message": "Product updated successfully",
"data": {
"id": 1,
"name": "Mouse Updated",
"description": "Updated description",
"price": "120.00",
"stock": 5
}
}

---

### 📌 Delete Product

DELETE /api/products/{id}

Headers:
Authorization: Bearer {token}

Response:
{
"message": "Product deleted successfully"
}

---

## 🧠 Regras do Sistema

* Todos os endpoints seguem padrão REST
* Todas as respostas seguem padrão JSON definido
* Rotas de criação, atualização e exclusão são protegidas por autenticação
* Apenas usuários autenticados podem manipular produtos
* Qualquer usuário pode listar e visualizar produtos

---

## 🎯 Objetivo do Projeto

Este projeto foi desenvolvido com foco em aprendizado de backend com Laravel, aplicando:

* Arquitetura em camadas
* API REST
* Autenticação com Sanctum
* Boas práticas de organização de código
* Versionamento com Git

````

---

