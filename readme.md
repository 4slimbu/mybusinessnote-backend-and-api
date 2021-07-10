# My Business Note - Laravel

API and Backend for MBJ main application(https://bitbucket.org/octomedia/mbj_app). MBJ main application is one page app built on REACT/REDUX. To clone MBJ main app go to 
https://bitbucket.org/octomedia/mbj_app and follow the readme instruction.

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
DB_HOST=127.0.0.1  //for docker use: mysql container name like 'db'
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

### Step 4
Some api calls from the app (e.g. to bronto, campaign monitor) are queued.
So, need to run: 
php artisan queue:listen

if you don't always want to run queue while developing, then update queue driver on .env file  
from QUEUE_DRIVER=database to  
QUEUE_DRIVER=sync
- note: bronto and campain are disabled in eventlistener
    so no need to follow this step unless you want to enable it.

### Step 5
- you won't be able to use seeded data to login from frontend because business is created only when user is created properly. 
TODO: fix this
- you need to login as admin and create normal user from there or register new user

### Step 5
- link google and facebook app for social login
- link google recaptcha as well
- link google smtp for email.

## Other Details

Hosting: AWS


### Staging API

http://api.mybusinessnote.com
http://api.mybusinessnote.com/admin
