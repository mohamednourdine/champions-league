
# Champions League Simulation Laravel Aplication


![alt text](https://github.com/mohamednourdine/champions-league/blob/main/public/screenshot.png?raw=true)


## Application Description:

* You can simulate all the games by clicking the Simulate All Weeks button on the right or click on each weeks buttons to simulate the game progressively
* Click on the Reset button to reset all the system counts and start back
* A four team champions League Application built base on the Premier Leage Rules ie: Other rules in the league (scoring, points, goal difference, etc.) will be the same as the rules of the Premier League
Check this link for more details
* Each screen on the Standing Results table of the subsequent week will represent the table and after every's week match, the table match statuses are updated. Moving forward, both the point scores and the results of the matches will be represented by this screen
* The Project needs to be completed using PHP Laravel and VueJS
* The code implementation follows all the best practices of OOP.
* The code of this application can be found Here
 
---

# Configure

Install PHP and JavaScript dependencies:

    git clone https://github.com/mohamednourdine/champions-league.git
    cd champions-league

Rename the .env.example file to .env, and fill it with your local info, then:

Install PHP and JavaScript dependencies:

    composer install
    npm install

Generate Laravel keys:

    php artisan key:generate

Migrate and seed the database:

    php artisan migrate --seed

Compile all the front-end stuff:

    npm run dev
