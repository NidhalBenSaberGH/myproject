# Generate report based on CSV file From DATABASE  

<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

## Getting Started

<h3>To get started, download or Clone the project,</h3>
<p>
    install the dependencies:
    composer install<br>
    php artisan migarte<br>
    php artisan migarte --seed<br>
</p>
<p>
Open the project from the url:
    http://localhost/myproject/public/
        You will see the login interface:
        use as login "admin@admin.com" and password "password"
</p>        

<p>You will see the dashboard to manage reports (Graphes & Analysis)</p>
<p> 
 You can see from the home Page of dashboard a datatable that display all details from the "videos" table
 and in the sidebar you have many others options for :</p>
        - Users managements: Users & Rules Crud<br>
        - Generate reports, And you can find many nested options for reports from "Videos" and "Comments" tables.<br>
        - Upload CSV file: from here you can upload the csv file for videos and comments You should run in the console the command:<br>
            "php artisan queue:work --tries=3"<br>
            and when you click upload there is a jobs started In background that execute the processus of uploading data in the                       Database from the csv file.<br>
            Or you can uploaded directly from the console by running the commands:<br>
                - php artisan kpeiz:import-videos "Path_to_the_csv_videos_file"<br>
                - php artisan kpeiz:import-comments "Path_to_the_csv_comments_file"<br>

           Note: You should upload videos before comments to prevent Error related to Foreign key constraint between Videos and comments tables.
           
           ENJOY ... 
