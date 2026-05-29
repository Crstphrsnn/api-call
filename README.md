# Postman API Testing Demonstration – Laravel Student API

## Full Name
Cristopherson T. Domantay

## Project Title
Postman API Testing Demonstration – Laravel Student API

## Short Project Description
This project demonstrates how to test a Laravel REST API using Postman. The API manages student records and supports common HTTP methods: GET, POST, PUT, PATCH, and DELETE.

The API reference is based on the GitHub repository:
https://github.com/Crstphrsnn/api-call

## API Resource
Student

## Student Fields
- id
- name
- email
- course
- created_at
- updated_at

## Base URL
When the Laravel server is running locally, use:

```text
http://127.0.0.1:8000/api/students
```

## Setup Instructions

### 1. Download the Reference Project
Open the GitHub repository and download the project:

https://github.com/Crstphrsnn/api/students


Then open the project folder in VSCode.

### 3. Configure the Database
Open the `.env` file and set your database connection.

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=student_api
DB_USERNAME=root
DB_PASSWORD=
```

Create the `student_api` database in phpMyAdmin.

### 4. Run Migration
Run:

```bash
php artisan migrate
```

This creates the `students` table.

### 5. Start the Laravel Server
Run:

```bash
php artisan serve
```

Expected result:

```text
Server running on [http://127.0.0.1:8000]
```

### 8. Open Postman
Open Postman and create requests using this base URL:

```text
http://127.0.0.1:8000/api
```

## Postman API Testing Demonstration

### 1. POST – Create a Student

**Method:** POST  
**URL:**

```text
http://127.0.0.1:8000/api/students
```

**Headers:**

```text
Accept: application/json
Content-Type: application/json
```

**Body > raw > JSON:**

```json
{
  "name": "tope",
  "email": "tope@gmail.com",
  "course": "BSIT"
}
```

**Expected Status Code:**

```text
201 Created
```

**Expected Response:**

```json
{
  "name": "tope",
  "email": "tope@gmail.com",
  "course": "BSIT",
  "updated_at": "2026-05-28T00:00:00.000000Z",
  "created_at": "2026-05-28T00:00:00.000000Z",
  "id": 1
}
```

### 2. GET – Fetch All Students

**Method:** GET  
**URL:**

```text
http://127.0.0.1:8000/api/students
```

**Expected Status Code:**

```text
200 OK
```

**Expected Response:**

```json
[
  {
    "id": 1,
    "name": "tope",
    "email": "tope@gmail.com",
    "course": "BSIT",
    "created_at": "2026-05-28T00:00:00.000000Z",
    "updated_at": "2026-05-28T00:00:00.000000Z"
  }
]
```

### 3. GET – Fetch One Student by ID

**Method:** GET  
**URL:**

```text
http://127.0.0.1:8000/api/students/1
```

**Expected Status Code:**

```text
200 OK
```

**Expected Response:**

```json
{
  "id": 1,
  "name": "tope",
  "email": "tope@gmail.com",
  "course": "BSIT",
  "created_at": "2026-05-28T00:00:00.000000Z",
  "updated_at": "2026-05-28T00:00:00.000000Z"
}
```

If the student does not exist, the expected response is:

```json
{
  "message": "Student not found!"
}
```

with status code:

```text
404 Not Found
```

### 4. PUT – Full Update Student

**Method:** PUT  
**URL:**

```text
http://127.0.0.1:8000/api/students/1
```

**Headers:**

```text
Accept: application/json
Content-Type: application/json
```

**Body > raw > JSON:**

```json
{
  "name": "cris",
  "email": "cris@gmail.com",
  "course": "BSIT"
}
```

**Expected Status Code:**

```text
200 OK
```

**Expected Response:**

```json
{
  "id": 1,
  "name": "cris",
  "email": "cris@gmail.com",
  "course": "BSIT",
  "created_at": "2026-05-28T00:00:00.000000Z",
  "updated_at": "2026-05-28T00:00:00.000000Z"
}
```

### 5. PATCH – Partial Update Student

**Method:** PATCH  
**URL:**

```text
http://127.0.0.1:8000/api/students/1
```

**Headers:**

```text
Accept: application/json
Content-Type: application/json
```

**Body > raw > JSON:**

```json
{
  "course": "BSIT - Web Development"
}
```

**Expected Status Code:**

```text
200 OK
```

**Expected Response:**

```json
{
  "id": 1,
  "name": "cris",
  "email": "cris@gmail.com",
  "course": "BSIT",
  "created_at": "2026-05-28T00:00:00.000000Z",
  "updated_at": "2026-05-28T00:00:00.000000Z"
}
```

### 6. DELETE – Delete One Student

**Method:** DELETE  
**URL:**

```text
http://127.0.0.1:8000/api/students/1
```

**Expected Status Code:**

```text
200 OK
```

**Expected Response:**

```json
{
  "message": "Student deleted successfully!"
}
```

### 7. DELETE – Delete All Students

**Method:** DELETE  
**URL:**

```text
http://127.0.0.1:8000/api/students
```

**Expected Status Code:**

```text
200 OK
```

**Expected Response:**

```json
{
  "message": "All students deleted successfully!"
}
```

## Common Postman Error Fix

### Error: connect ECONNREFUSED 127.0.0.1:8000
This means the Laravel development server is not running. Fix it by running:

```bash
php artisan serve
```

Then try the Postman request again.

## Notes
- Always use `/api` in the URL because the routes are inside `routes/api.php`.
- For POST, PUT, and PATCH requests, always choose `Body > raw > JSON` in Postman.
- Add the `Accept: application/json` header so Laravel returns JSON responses.

## Google Drive Link
- https://drive.google.com/drive/folders/1vuvf-VnZFiQbyh7mDyXcpYBlOFBX7Vwp