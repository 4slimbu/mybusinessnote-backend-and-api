# My Business Journey

API and Backend for MBJ main application. MBJ main app is based on REACT  

## Installation

### Step 1

> To run this project, you must have PHP 7 installed as a prerequisite.

Begin by cloning this repository to your machine, and installing all Composer dependencies.

```bash
git clone git@bitbucket.org:octomedia/mbj.git
cd mbj && composer install
mv .env.example  .env
php artisan key:generate
```

### Step 2

Create a new database and reference its username, password, database name and host within the project's '.env' file. See the example below for database name mbj.

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mbj
DB_USERNAME=root
DB_PASSWORD=

1. Visit: `http://mbj.test` to view the homepage
2. Visit: `http://mbj.test/admin` to login the backend


### Step 3

If you want to seed some sample data run the following bash command

```bash
php artisan migrate:refresh --seed
```