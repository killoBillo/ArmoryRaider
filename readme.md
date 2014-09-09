ArmoryRaider

This application is a calendar of events suitable for the planning of WOW Guild raids. Through the use of special classes (written by third parties) is able to retrieve characters data directly from the Battle.net Armory.

N.b.: This is my first sourceforge project, let me know if something is wrong so I can fix it.

Change log
CONTENTS OF THIS PAGE

    Requirements and notes
    Installation

REQUIREMENTS AND NOTES

    A web server. Apache (version 2.0 or greater) is recommended.
    PHP 5.1.0 (or greater) (http://www.php.net/).
    One of the following databases:
        MySQL (http://www.mysql.com/).
        PostgreSQL (http://www.postgresql.org/).
        SQLite (http://www.sqlite.org/).
    All of the following PHP extensions:
        GD extension with FreeType support or ImageMagick extension with PNG support
        SOAP extension
        Ctype extension
        PDO extension
        Reflection extension
        PCRE extension
        SPL extension
        DOM extension

ArmoryRaider is coded using Yii Framework, so you can refer to Yii site for
more detailed information. (http://www.yiiframework.com/)
INSTALLATION
1. Download and extract ArmoryRaider.

You can obtain the latest ArmoryRaider release from
https://sourceforge.net/projects/armoryraider/ the files are available
in .zip formats and can be extracted using most compression tools.
2. Create the ArmoryRaider database.

Because ArmoryRaider stores all site information in a database, you must
create this database in order to install ArmoryRaider.

    Create your database, better if UTF8, or use an existing one. You may
    need to consult your web hosting provider for instructions specific to
    your web host.
    Browse the file "~/armoryraider/protected/data/schema.mysql.sql",
    you should use this file to populate the database.

Please note that: You can also use others DBMS, refer to Yii site for
more detailed information. (http://www.yiiframework.com/)
3. Setup the ArmoryRaider config file (intended for mySQL DB).

Now you have to setup the connection information to the database.

    Browse the file "~/armoryraider/protected/config/main.php".
    Find the string 'mysql:host=127.0.0.1;dbname=armoryraider', and edit
    the host value and the dbname value.
    Find the string "'username' => 'root'" and the string
    "'password' => 'password'", and edit those according to your mySQL
    account.

Please note that: You can also use others DBMS, refer to Yii site for
more detailed information. (http://www.yiiframework.com/)
4. Copy the whole armoryraider folder to your web space.

    Change the permission of the directories "assets", "images" and "protected/runtime" so
    that they are writable by the Web server process.
    Point your browser to the base URL of your application and login as admin
    using the following login details:
        user: admin
        password: admin

You will be guided through two screens to set up the application and the
main guild (other guilds will be added automatically while adding new
characters from other guilds).
5. Enjoy! :]

Page still in progress
