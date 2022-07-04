# Jela_svijeta
API with random generated Faker values


<h3> Usage: </h3>
<p>1. Enter your credentials</p>


    cd config/ && mv Config.php.example Config.php

<p>2. Install dependencies </p>

    composer install
 
<p>3. Start a server in directory root </p>

    php -S localhost:8000

<p>4. Enter or curl an url</p>
 
    curl -v "http://localhost:8000/api.php?lang=hr&tags=3&diff_time=1&category=!NULL&with=tags,ingredients&per_page=2"
    
