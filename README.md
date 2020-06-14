# Laravel version:7.15
# XAMPP version:7.3.18
# To run all migrations, execute the migrate Artisan command "php artisan migrate".
# Run the following command in the project terminal "php artisan db:seed" to run database seeding process.
# Run the following command in the project terminal "php artisan storage:link" to use assets logo in views.
# Run the server by printing the following command in the project terminal "php artisan serve".
# If you will run the server locally use the following link to access the system "http://localhost:8000/".
# login credentials :
    - username: admin@admin.com
    - password: 123456
# Task:
    - Basic Laravel Auth: ability to log in as administrator DONE
    - Use database seeds to create first user with email admin@admin.com and password “123456” DONE
    - CRUD functionality (Create / Read / Update / Delete) for two menu items: Companies and Employees. DONE
    - Companies DB table consists of these fields: Name (required), email (unique), logo (minimum 100×100), website. DONE
    - Employees DB table consists of these fields: First name (required), last name (required), Company (foreign key to Companies), email (unique) , phone. DONE
    - Use database migrations to create those schemas above. DONE
    - Store companies logos in storage/app/public folder and make them accessible from public. DONE
    - Use basic Laravel resource controllers with default methods – index, create, store etc. DONE
    - Use Laravel’s models to make the relationship from them. DONE
    - Use Laravel’s validation function, using Request classes. DONE
    - Use Laravel’s pagination for showing Companies/Employees list, 10 entries per page. DONE
    - Use Laravel make:auth as default Bootstrap-based design theme, but remove ability to register. DONE
    - Email notification: send email whenever new company is entered. DONE (you will need to access companies controller file line 70 and change the recieving email to a working email to recieve notification)  
    - Use Laravel commands and Task Scheduling to send weekly mail to Companies which in your system with new Employees entered in this week. Done 
       (for the last task you will need to add the following line Cron entry to your server to run the Scheduler properly
        "* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1" )
    
                        ### If you need to clear any part of the code don't hesitate to contact me at any time ###
    
                    #### Finally I hope that you like my work and to be a part of your success story ... Thank you ####
