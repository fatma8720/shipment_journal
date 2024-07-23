# Shipment Journal

**Shipment Journal** is a Laravel-based application designed to manage and track shipments effectively. This project includes features for listing, creating, editing, and managing shipments, along with workflows and journal entries related to shipments.

## Features

- **Shipment Management**: Add, update, and delete shipment records.
- **Workflow Tracking**: Monitor and manage shipment workflows.
- **Journal Entries**: Record and track journal entries related to shipments.
- **Database Support**: Works with MySQL for production and SQLite for testing.

## Installation

### Prerequisites

- PHP 8.x
- Composer
- MySQL or SQLite
- Laravel 9.x

### Clone the Repository
git clone https://github.com/fatma8720/shipment_journal.git
cd shipment_journal

### Install Dependencies
composer install

### Environment Configuration

Copy the example environment file and configure your settings:
cp .env.example .env

Open the .env file and configure your database settings:

#### Configuration .env
APP_URL: URL of your application.
DB_CONNECTION: Database connection type (mysql or sqlite) as:
#### MySQL configuration for production
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3307
DB_DATABASE=your_production_database
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
#### SQLite configuration for testing 
DB_CONNECTION=sqlite
DB_DATABASE=/path/to/your/database.sqlite
 

### Generate Application Key
php artisan key:generate

### Migrate Database
Run migrations to set up your database schema:
php artisan migrate


### Run the Application
Start the Laravel development server:
php artisan serve
The application will be available at http://localhost:8000.








