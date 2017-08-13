# rentacar-solution
# Setup
# The project was developed locally:
# Used Environment: 
  1. Xampp v3.2.2
  2. Laravel Framework v5.4
  3. PhpMyAdmin
# To setup the project for testing, please follow these steps: 
    1. Clone the repository
    2. Run Xampp and create new data base named *rent_a_car*
    2. Open up *.env* file and configure
       - DB_DATABASE=rent_a_car
       - DB_USERNAME=root
       - DB_PASSWORD=password
    3. Open up cmd or any Command Line Interface (CLI) of choice and run these commands: (Note: Composer is required)
       composer install
       composer dump-autoload
       php artisan migrate --seed
    4. Open in browser of choice : http://localhost/../rentacar-solution/public/


