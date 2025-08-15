# Laravel Posts API

A simple Laravel API for creating, editing, deleting, and listing posts.  
Supports authentication via OAuth2 using `access_token`.

---

## Features

- User authentication (login & register)
- Create, update, delete posts
- Fetch all posts
- Fetch single post by ID
- Secure access with Bearer Token (Laravel Sanctum or Passport)

---

## Requirements

- PHP >= 8.0
- Composer
- Laravel >= 9.x
- MySQL or any supported database
- cURL (for API testing)

---

## Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/kamranasif506/Laravel-Api.git
   cd Laravel-Api
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Set up environment variables**
   ```bash
   cp .env.example .env
   ```
   Update `.env` with your database details:
   ```ini
   DB_DATABASE=your_db
   DB_USERNAME=your_user
   DB_PASSWORD=your_password
   ```

4. **Generate app key**
   ```bash
   php artisan key:generate
   ```

5. **Run migrations**
   ```bash
   php artisan migrate
   ```

6. **Run the server**
   ```bash
   php artisan serve
   ```

---

## API Endpoints

### 1. Register
**POST** `/api/register`

Request:
```json
{
  "name": "User Name",
  "email": "user@example.com",
  "password": "password",
  "password_confirmation": "password"
}
```

### 2. Login
**POST** `/api/login`

Request:
```json
{
  "email": "user@example.com",
  "password": "password"
}
```

Response:
```json
{
  "access_token": "your-token",
  "token_type": "Bearer"
}
```

### 3. Get All Posts
**GET** `/api/posts`

```bash
curl -X GET http://127.0.0.1:8000/api/posts \
-H "Authorization: Bearer YOUR_ACCESS_TOKEN"
```

### 4. Get Single Post
**GET** `/api/posts/{id}`

### 5. Create Post
**POST** `/api/posts`

```bash
curl -X POST http://127.0.0.1:8000/api/posts \
-H "Authorization: Bearer YOUR_ACCESS_TOKEN" \
-H "Content-Type: application/json" \
-d '{"title":"New Post","content":"Post content here"}'
```

### 6. Update Post
**PUT** `/api/posts/{id}`

```bash
curl -X PUT http://127.0.0.1:8000/api/posts/1 \
-H "Authorization: Bearer YOUR_ACCESS_TOKEN" \
-H "Content-Type: application/json" \
-d '{"title":"Updated Title","content":"Updated content"}'
```

### 7. Delete Post
**DELETE** `/api/posts/{id}`

```bash
curl -X DELETE http://127.0.0.1:8000/api/posts/1 \
-H "Authorization: Bearer YOUR_ACCESS_TOKEN"
```

---

## Notes

- Replace `YOUR_ACCESS_TOKEN` with the token received from login.
- Ensure your `.env` file has correct database credentials before migrating.
- You can protect routes using Laravel Sanctum or Passport for OAuth2 tokens.

---

## License

The Laravel framework is open-sourced software licensed