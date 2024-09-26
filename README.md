
# E-Commerce Product Management System

This is a simple e-commerce product management system built using **Laravel** and **Breeze**. The system allows users to create, read, update, and delete (CRUD) products with fields like `name`, `slug`, `sku`, `price`, `quantity`, and `category`.

## Features

- **Product Management**: Create, update, delete, and list products.
- **Category Management**: Assign categories to products.
- **Validation**: Server-side validation for product fields.
- **Blade Components**: Uses reusable components with Laravel Breeze for form fields and error handling.
- **User Authentication**: Provided by Laravel Breeze.
- **CRUD Operations**: Fully functional CRUD operations for products.

## Technologies Used

- **Laravel 10.x**
- **Breeze** for authentication and basic components
- **Tailwind CSS** for styling
- **MySQL** for the database
- **PHP 8.x**

## Setup Instructions

### Prerequisites

Before setting up the project, ensure you have the following installed on your system:

- PHP 8.x or higher
- Composer
- MySQL or any other supported database
- Node.js and npm

### Step-by-Step Installation Guide

1. **Clone the repository:**

   ```bash
   git clone https://github.com/your-username/your-repo.git
   cd your-repo
   ```

2. **Install dependencies:**

   Run the following command to install PHP and JavaScript dependencies:

   ```bash
   composer install
   npm install
   ```

3. **Set up environment variables:**

   Create a copy of the `.env` file from the example file and update the necessary database credentials.

   ```bash
   cp .env.example .env
   ```

   Update the `.env` file to include your database information:

   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

4. **Generate an application key:**

   Run the following command to generate the application key:

   ```bash
   php artisan key:generate
   ```

5. **Run database migrations and seed the database:**

   Use the following commands to create the necessary tables and seed the database with some sample categories:

   ```bash
   php artisan migrate --seed
   ```

6. **Compile assets:**

   Run the following command to compile the front-end assets:

   ```bash
   npm run dev
   ```

7. **Serve the application:**

   Use the Laravel development server to serve the application:

   ```bash
   php artisan serve
   ```

   Visit `http://localhost:8000` in your browser.

### Seeding Categories

To populate the `categories` table with some initial data, the project comes with a `CategorySeeder`. You can run the seeder by using:

```bash
php artisan db:seed --class=CategorySeeder
```

### Testing

Run PHPUnit tests by executing:

```bash
php artisan test
```

## Usage

### Product Management

1. **Create a Product**: Navigate to the "Products" section and click "Create Product". Fill in the form and save the product.
2. **Edit a Product**: From the product listing, click the "Edit" button to modify an existing product.
3. **Delete a Product**: Click the "Delete" button next to a product to remove it.
