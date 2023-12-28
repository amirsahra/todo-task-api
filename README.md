# Todo task

Example RESTFUll API in Laravel
## Overview

This repository serves as a comprehensive example of a meticulously crafted RESTful API using Laravel. It not only showcases the implementation of RESTful endpoints but also embodies best practices in coding, leveraging Laravel's robust features.

### Features Showcased:

- **Implementation of RESTful API Endpoints:** Demonstrates a well-defined structure and functionality of various API endpoints adhering to RESTful principles.
- **Leveraging Laravel's Response and Request Handling:** Utilizes Laravel's built-in functionalities effectively for handling responses, managing requests, and ensuring secure data flow.
- **Exemplary Demonstration of Clean and Structured Code:** Emphasizes clean, maintainable, and structured coding practices, serving as a guide for developers to create organized and scalable applications.

This example repository offers an insightful reference for implementing RESTful APIs in Laravel. Dive into the codebase to gain a deeper understanding of utilizing Laravel's features effectively and implementing industry-best practices.

### Purpose

Primarily, this source code repository serves as an educational resource, exemplifying how to architect and structure a robust RESTful API project using Laravel. It aims to aid developers in comprehending the implementation of Laravel features and adopting optimal coding practices for their projects.

Feel free to explore, learn, and adapt the showcased patterns and practices to enhance your own projects.

## Installation

### Prerequisites

- PHP ^7.3 | ^8.0
- laravel 8

### Steps

1. Clone the repository:
    ```bash
    git clone https://github.com/amirsahra/todo-task-api.git
    ```
2. Install dependencies:
    ```bash
    composer install
    ```
3. Set up environment variables by creating a `.env` file:
    ```bash
    cp .env.example .env
    ```
   Update `.env` with your configuration (database, app key, etc.).

4. Run migrations and seeders (if applicable):
    ```bash
    php artisan migrate --seed
    ```

## Usage

Explain how to use your API:

1. Start the development server:
    ```bash
    php artisan serve
    ```

2. Use tools like Postman or curl to interact with the API endpoints.

## API Endpoints

### List of Available Endpoints

#### Auth Endpoints

- **Login**
    - Method: `POST`
    - Description: Logs in a user with their credentials.
    - Example:
      ```bash
      POST http://127.0.0.1:8000/api/V1/login

      Body:
      {
          "email": "vhammes@example.com",
          "password": "123456789"
      }
      ```

- **Logout**
    - Method: `POST`
    - Description: Logs out the currently logged-in user.
    - Example:
      ```bash
      POST http://127.0.0.1:8000/api/V1/logout

      Body:
      {
          "email": "vhammes@example.com",
          "password": "123456789"
      }
      ```

- **Register**
    - Method: `POST`
    - Description: Registers a new user.
    - Example:
      ```bash
      POST http://127.0.0.1:8000/api/V1/register

      Body:
      {
          "name": "amir",
          "email": "amirhosein.sahra@gmail.com",
          "password": "123456789"
      }
      ```

- **Show Current User**
    - Method: `GET`
    - Description: Retrieves information about the currently logged-in user.
    - Example:
      ```sql
      GET http://127.0.0.1:8000/api/user

      Headers:
      {
          "Authorization": "Bearer 1|pY6W2ys7VWlTgaSr4pAbc0XOVIRWcbdNihqaWCMU",
          "Accept": "application/json",
          "Referer": "localhost"
      }
      ```

#### Task Endpoints

- **Index**
    - Method: `GET`
    - Description: Retrieves all tasks.
    - Example:
      ```bash
      GET http://127.0.0.1:8000/api/V1/tasks

      Headers:
      {
          "Authorization": "Bearer 3|vJjX0aKJYOgcXodNqWqpWbImfE3MYUPxEwjPlMN2",
          "Accept": "application/json"
      }
      ```

- **Show**
    - Method: `GET`
    - Description: Retrieves details of a specific task by ID.
    - Example:
      ```bash
      GET http://127.0.0.1:8000/api/V1/tasks/1

      Headers:
      {
          "Authorization": "Bearer 3|vJjX0aKJYOgcXodNqWqpWbImfE3MYUPxEwjPlMN2",
          "Accept": "application/json"
      }
      ```

- **Store**
    - Method: `POST`
    - Description: Creates a new task.
    - Example:
      ```css
      POST http://127.0.0.1:8000/api/V1/tasks

      Headers:
      {
          "Authorization": "Bearer 3|vJjX0aKJYOgcXodNqWqpWbImfE3MYUPxEwjPlMN2",
          "Accept": "application/vnd.api+json"
      }
      Body:
      {
          "name": "amir hossein sahra"
      }
      ```

- **Update**
    - Method: `PUT`
    - Description: Updates an existing task by ID.
    - Example:
      ```css
      PUT http://127.0.0.1:8000/api/V1/tasks/13

      Headers:
      {
          "Authorization": "Bearer 3|vJjX0aKJYOgcXodNqWqpWbImfE3MYUPxEwjPlMN2",
          "Accept": "application/json"
      }
      Body:
      {
          "name": "new name update"
      }
      ```

- **Completed**
    - Method: `PATCH`
    - Description: Marks a task as completed by ID.
    - Example:
      ```bash
      PATCH http://127.0.0.1:8000/api/V1/tasks/10/complete

      Headers:
      {
          "Authorization": "Bearer 1|pY6W2ys7VWlTgaSr4pAbc0XOVIRWcbdNihqaWCMU",
          "Accept": "application/json"
      }
      ```

- **Destroy**
    - Method: `DELETE`
    - Description: Deletes a task by ID.
    - Example:
      ```bash
      DELETE http://127.0.0.1:8000/api/V1/tasks/11

      Headers:
      {
          "Authorization": "Bearer 3|vJjX0aKJYOgcXodNqWqpWbImfE3MYUPxEwjPlMN2"
      }
      ```

## Authentication
### Token-Based Authentication

This API utilizes Token-Based Authentication, specifically using the Bearer Token for authentication. In this method, a token serves as the authentication credential for each request sent.

#### Examples of Authentication

##### Login Endpoint

To log in, a POST request is used at this address:

```http
POST http://127.0.0.1:8000/api/V1/login

Body:
{
    "email": "vhammes@example.com",
    "password": "123456789"
}
```
This successful request provides the user with a token of type Bearer, 
which should be included in the headers of all subsequent requests:
```http 
Authorization: Bearer YOUR_ACCESS_TOKEN
```
#### Authentication Example in Endpoints
For instance, in the headers of the following request, 
the token used for authentication is sent as a Bearer in the request:
```http 
GET http://127.0.0.1:8000/api/user

Headers:
{
    "Authorization": "Bearer YOUR_ACCESS_TOKEN",
    "Accept": "application/json",
    "Referer": "localhost"
}
```

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
