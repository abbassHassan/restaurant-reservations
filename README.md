# Restaurant Reservation Laravel Application

This Laravel application enables users to manage restaurant reservations and view restaurants using an external API integration. It includes features for user authentication, reservation management, role-based access control, search and pagination, and unit and feature testing.

## Features

-   User authentication (login, registration).
-   Role-based access control (Admin and Regular User).
-   CRUD operations for reservations.
-   Search and pagination for reservations.
-   API integration for restaurant listings.
-   Unit and feature testing.

## Requirements

-   PHP >= 8.1
-   Composer (for managing PHP dependencies)
-   Laravel 9.x or 10.x
-   Node.js >= 14 and npm (for managing frontend dependencies)
-   PostgreSQL (or compatible SQL database)
-   Redis or another queue driver (optional, for any future background jobs)
-   Git (for version control)

## Installation

```bash
# Clone the Repository
git clone https://github.com/your-username/your-repository-name.git
cd your-repository-name

# Install PHP Dependencies
composer install

# Install Node.js Dependencies
npm install

# Compile Assets
npm run dev # for development
npm run build # for production
```

## Configuration

```bash
# Create Environment File
cp .env.example .env

# Generate Application Key
php artisan key:generate
```

### Environment Variables

Open the `.env` file and configure the following:

```env
APP_NAME=RestaurantReservation
APP_ENV=local
APP_KEY=base64:your_generated_key
APP_DEBUG=true
APP_TIMEZONE=UTC
APP_URL=http://localhost

APP_LOCALE=en
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=en_US

LOG_CHANNEL=stack
LOG_STACK=single
LOG_LEVEL=debug

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=restaurant_reservation
DB_USERNAME=Abbas
DB_PASSWORD=Abbas123$

SESSION_DRIVER=database
SESSION_LIFETIME=120

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database

CACHE_STORE=database
CACHE_PREFIX=

MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=785746730f8998
MAIL_PASSWORD=your_mailtrap_password # Replace with actual password
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

VITE_APP_NAME="${APP_NAME}"

YELP_API_KEY=h-OIiyDyMwIQnf6rHXID4HKK7LYu8T-txUiqI88s_cClJVaCigR5i-IEh3m7r94NXSG8BOf6-nR1PvtYcWCLCNjVu06tZmZAomz3Qtygo-mTMOSDLQhs3prseHAmZ3Yx
```

Replace the placeholder values above with your actual configuration details.

## Database Setup

### Step 1: Create the Database

Create a PostgreSQL database for the application.

### Step 2: Run Migrations

Run the following command to create tables in the database:

```bash
php artisan migrate
```

### Step 3: Seed the Database (Optional)

If you have seeders, you can populate the database with sample data:

```bash
php artisan db:seed
```

---

## Running the Application

To start the Laravel development server, run:

```bash
php artisan serve
```

The application will be available at `http://localhost:8000`.

---

## Testing

To run unit and feature tests, use:

```bash
php artisan test
```

This will execute all defined tests and display the results.

---

## API Integration

This project integrates with the Yelp API to fetch restaurant data. Ensure you have configured your `YELP_API_KEY` in the `.env` file.

---

## Folder Structure

The following are key folders in this Laravel project:

-   `app/Models` - Contains Eloquent models.
-   `app/Http/Controllers` - Contains controllers handling requests.
-   `resources/views` - Contains Blade templates for front-end.
-   `database/migrations` - Contains database migration files.
-   `tests` - Contains unit and feature tests.

---

## Troubleshooting

If you encounter issues during setup, check that:

1. Environment variables are set correctly.
2. Database credentials match your local setup.
3. Required PHP extensions are enabled.
