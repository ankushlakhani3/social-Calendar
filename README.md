It is a social calendar of 2022 made in laravel 8 and using api to retrive the data of dates and months, it shows all the months of 2022 and have buttons to change the months.

To run this web application in your machine you have to follow the bealow steps.

1. Clone the app using following command.

       git clone https://github.com/ankushlakhani3/social-Calendar.git

2. Move to the social-calendar directory.

        cd social-calender
  
3. Install all dependency.

       composer install or php composer.phar install
  
4. Generate the key.

       php artisan key:generate
   
5. Now add the port you want run this site on (default=8000).

       php artisan serve --port=3050
