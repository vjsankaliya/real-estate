## Real Estate Management System

This project is a Real Estate Management System built with Laravel, providing a RESTful API to manage real estate properties.
Features
- Create, Read, Update, Delete (CRUD) operations for real estate properties
- Soft-delete support for safe record removal
- Feature tests for critical endpoints
- Database seeding with at least 20 sample properties

Setup Instructions
1) Clone the Repository: git clone https://github.com/vjsankaliya/real-estate.git
2) Change directory: cd real-estate
3) Install Composer: composer install
4) Setup .env file: Copy .env.example to .env
5) Set your database credentials (In .env):
   - DB_CONNECTION=mysql
   - DB_HOST=127.0.0.1
   - DB_PORT=3306
   - DB_DATABASE=your_db_name
   - DB_USERNAME=your_db_user
   - DB_PASSWORD=your_db_password
6) Run Migrations: php artisan migrate
7) Seed Database: php artisan db:seed
8) Start the Development Server: php artisan serve
9) Running Tests: php artisan test

## API Endpoints
<table>
    <thead>
        <tr>
            <th>Method</th>
            <th>Endpoint</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>GET</td>
            <td>/api/real-estates</td>
            <td>List all properties (id, name, type, city, country)</td>
        </tr>
        <tr>
            <td>GET</td>
            <td>/api/real-estates/{id}</td>
            <td>Show a specific property (all attributes)</td>
        </tr>
        <tr>
            <td>POST</td>
            <td>/api/real-estates</td>
            <td>Add a new property</td>
        </tr>
        <tr>
            <td>PUT</td>
            <td>/api/real-estates/{id}</td>
            <td>Update a property and return updated record</td>
        </tr>
        <tr>
            <td>DELETE</td>
            <td>/api/real-estates/{id}</td>
            <td>Soft-delete a property and return deleted record</td>
        </tr>
    </tbody>
</table>>
