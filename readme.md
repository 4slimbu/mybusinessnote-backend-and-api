# My Business Note - Laravel

API and Dashboard for My Business Note application.

## Installation

### Step 1: Cloning

Clone the repo

```
git clone git@bitbucket.org:octomedia/mbj.git
```

### Step 2: Set env

- create .env file
- set value for APP related constants, DB related constants and MAIL related constants

```
cp .env.example .env
```

### Step 3: Compose

- use docker-compose to create containers
- make sure to update VIRTUAL_HOST value to match the one you set in /etc/hosts
- also, make sure that you have jwilder/nginx-proxy running for the virtual hosts to work

```
docker-compose up -d
```

### Step 4: Setup

- go into app container
- install all dependencies
- set up APP_KEY
- seed data

```
docker-compose exec app bash
composer install
php artisan key:generate
php artisan migrate:refresh --seed
```

### Step 5: Extra

- go to dash.mybusinessnote.local (or your domain if you have changed) to see the app
