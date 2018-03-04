# RaceApp

By Laravel 5.6


Installation:

git clone https://github.com/charjia77/RaceApp.git 

cd RaceApp

cp .env.example .env

composer install

php artisan key:generate


More Assumptions

1. Add race names and display with meeting name at index page.

2. each race has a unique id which is used as the argument to get race details(e.g. Competitors).

3. refresh positions every 5s.

4. assumption for successfully getting data from API server every time.

5. Back to Race List button should get new race list data from API, since the same part of JSON data is used to emulate the API server, so all races just recount down again.

6. When a race disappears from the list, it should get a new list for 5 recent races to make the index page has 5 races anytime. According to UI Requirements, now I just let it disappears. 
