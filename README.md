# Portfolio project Rentaflat based on Laravel framework (PHP)

## Description
`Rentaflat` is a web application for rental advertisements.

## Technologies used:
- PHP
- Laravel
- MySQL
- Docker
- Vite
- Bootstrap
- HTML
- CSS

## User roles
- `Administrator` - the user with super privileges
- `Moderator` - a user who can change advertisement status (published/not-published)
- `Registered User` - a user with an account who can create a rental advertisement
- `Non-registered user` - a user can only browse rental advertisements

## User credentials:
- `Administrator` - login: admin@example.com, password:123456789
- `Moderator` - login: moderator@example.com, password:123456789
- `User1` - login: user1@example.com, password:123456789
- `User2` - login: moderator@example.com, password:123456789

## How to run the project via docker:

### Step 0: Pre-requisite - `Docker` must be installed

### Step 1: Clone the repository to a folder:
``` git clone https://github.com/galym-akishev/rentaflat.git ``` 

### Step-2: Give permission to the specific folders (change folder to `rentaflat` and run):
``` sudo chmod -R 777 storage && sudo chmod -R 777 bootstrap/cache ``` <br>
``` or ``` <br>
``` chmod -R 777 storage && chmod -R 777 bootstrap/cache ```

### Step-3: Run the docker container (inside of the folder `rentaflat` run):
``` docker-compose up -d ```

### Step-4: Install PHP dependencies
``` docker exec -it rentaflat_app bash ``` <br>
``` composer install ```

### Step-4: Generate Laravel key:
``` docker exec -it rentaflat_app bash ``` <br>
``` php artisan key:generate ```

### Step-5: Build the docker image
``` docker-compose up --build --no-recreate -d ```

### Step-6: Enter the vite container
``` docker exec -it rentaflat_vite sh ``` <br>
``` npm i ``` <br>
``` npm run build (npm run dev) ``` <br>

### Step-7: Make the build
``` docker-compose up --build ```

### Step-8: Migrate the database and seed database with initial data
``` docker exec -it rentaflat_app bash ``` <br>
``` php artisan migrate ``` <br>
``` php artisan migrate:fresh ``` <br>
``` php artisan migrate --seed ``` <br>

### Step-9: Make symlink: must be run inside of the docker container using relative path
``` docker exec -it rentaflat_vite sh ``` <br>
``` cd /var/www/public ``` <br>
``` ln -s ../storage/app/public storage ```

### Step-10: Open your browser at [localhost:8086](http://localhost:8086)
