<h1>DemensWallet</h1>

<p>This website allows to keep a log of our financial activities, and have a resumed balance of all the accounts registered</p>

<h3>Features</h3>
<ul>
    <li>Multiples resources per account</li>
    <li>Multilingual support (english/spanish included) </li>
    <li>Balance report per resource with graphics</li>
    <li>Overall balance</li>
    <li>Up to 3 user accounts can interact within 1 resource, and the owner can setup permissions for each one</li>
    <li></li>
    <li></li>
    <li></li>
</ul>

If you want to see the demo, you can check it out <a href="https://githubpages.com/blabla">here</a>.

<h3>Installation Requirements</h3>

<ul>
    <li>A computer with an HTTP Server (Apache, NGINX, IIS)</li>
    <li>Support for PHP 7.2 + </li>
    <li>Composer (getcomposer.org)</li>
    <li>Support for Laravel 7+ (npm)</li>
    <li>a MySQL database</li>
    <li>Git installed</li>
</ul>
NOTE: In the future versions, I'll put everything on a container in order to ease the installation

<h3>How to install it</h3>
<div class="">
    NOTE: The instructions are based from <a href="https://devmarketer.io/learn/setup-laravel-project-cloned-github-com/">this site</a> to make it work on a fresh cloned repository, and everything is made with a console. If you are running on windows, you can use the git console.
</div>
<h4>1: Go to the DocumentRoot folder where you are going to start</h4>
<pre>cd  [your_document_root] </pre>

<h4>2: Clone the repository</h4>
<pre>git clone git@github.com:demenskan/demensWallet</pre>

<h4>3: CD into your project</h4>
<pre>cd [project_name]</pre>

<h4>4: Install composer dependencies</h4>
It brings all the dependencies needed to work. You have to install it first from <a href="https://getcomposer.org">here</a>
<pre>composer install</pre>

<h4>5: Install NPM dependencies</h4>
<pre>npm install</pre>

<h4>6: Create a copy of the .env file</h4>
The .env file has the main configuration of the site.
You have to copy it from .env.example file included in the
repository and customize it according to your local settings.
<pre>cp .env.example .env</pre>

<h4>7: Generate an app encryption key</h4>
For security reasons, Laravel needs to have an encryption key
to store passwords hashes, cookies and more. It will be stored
at the .env file automatically.
<pre>php artisan key:generate</pre>

<h4>8: Create an empty database</h4>
This application was designed to use a MySQL database. You can
use any MySQL client you want to do it. Remember the database name,
username & password you put to use them on the next step.
<p>Example from console:</p>
<pre>mysql -u [username] -p </pre>

<h4>9: Configure .env to connect</h4>
Let's let laravel know where our database is and how to connect
with it. You have to edit the .env file in the site's root folder
and specify the next variables according to your settings.
<pre>
    <i>Inside .env file</i>
    [something we don't care right now]
    .
    .
    .
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=[your_database_name]
    DB_USERNAME=[your_database_username]
    DB_PASSWORD=[your_database_password]
    .
    .
    .
    [something we don't care right now]

</pre>

<h4>10: Migrate the database</h4>
From the application's folder:
<pre>php artisan migrate</pre>

<h4>11: Setup your HTTP server</h4>
At this moment, you should have access to the website by entering the
URL <i>[server]/[project_name]/public</i>. If you want to customize the URL, 
<pre></pre>

<h4></h4>
<pre></pre>


<h1>Techologies used</h1>
<ul>
    <li>PHP 7.2</li>
    <li>Laravel 7</li>
    <li>Bootstrap</li>
    <li>SB Admin Template</li>
    <li>MySQL 5.7.31</li>
    <li>Apache</li>
    <li>Linux</li>
    <li></li>

</ul>
