# Portfolio project Rentaflat based on Laravel framework (PHP)

## Description

## User roles
- Non-registered User - can only browse
- Admin - user with super privileges
- Moderator - can approve or block ad posts, can approve or block RegisteredUser accounts
- Registered User - either a landlord and/or a renter, can independently create an account, can create an ad post

----------------------------------------------------
## How to run the project via docker:

### Step 0: Pre-requisite - Docker must be installed

### Step 1: Clone the repository to a folder:
``` git clone https://github.com/galym-akishev/rentaflat.git ``` 

### Step-2: Give permission to the specific folders (change folder to `rentaflat` and run):
``` sudo chmod -R 777 storage && sudo chmod -R 777 bootstrap/cache ```

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
``` docker-composer up --build ```

### Step-8: Migrate the database and seed database with initial data
``` docker exec -it rentaflat_app bash ``` <br>
``` php artisan migrate ``` <br>
``` php artisan migrate:fresh ``` <br>
``` php artisan migrate --seed ``` <br>

### Step-9: Make symlink: must be run inside of the docker container using relative path
``` docker exec -it rentaflat_vite sh ``` <br>
``` cd /var/www/public ``` <br>
``` ln -s ../storage/app/public storage ```
