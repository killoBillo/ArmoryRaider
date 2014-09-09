ArmoryRaider
==================
This application is a calendar of events suitable for the planning of WOW Guild raids. Through the use of special classes (written by [third parties](https://sourceforge.net/projects/wowarmoryapi/)) is able to retrieve characters data directly from the Battle.net Armory.


Contents of this page
---------------------

 * Requirements and notes
 * Installation
 * Change log



* * *

Requirements and Notes
==================

- A web server. Apache (version 2.0 or greater) is recommended.
- PHP 5.1.0 (or greater) (http://www.php.net/).
- One of the following databases:
    - MySQL (http://www.mysql.com/).
    - PostgreSQL (http://www.postgresql.org/).
    - SQLite (http://www.sqlite.org/).
- All of the following PHP extensions:
    - GD extension with FreeType support or ImageMagick extension with PNG support
    - SOAP extension
    - Ctype extension
    - PDO extension
    - Reflection extension
    - PCRE extension
    - SPL extension
    - DOM extension

**ArmoryRaider** is coded using **Yii Framework**, so you can refer to Yii site for
more detailed information. (<http://www.yiiframework.com/>) 



* * *

Installation
==================

### 1. Download and extract ArmoryRaider. 

You can obtain the latest ArmoryRaider release from github
<https://github.com/killoBillo/ArmoryRaider>.
   

### 2. Create the ArmoryRaider database.

Because ArmoryRaider stores all site information in a database, you must 
create this database in order to install ArmoryRaider. 
   
- Create your database, better if UTF8, or use an existing one. You may 
  need to consult your web hosting provider for instructions specific to 
  your web host.
- Browse the file "~/armoryraider/protected/data/schema.mysql.sql", 
  you should use this file to populate the database.
      
Please note that: You can also use others DBMS, refer to Yii site for
more detailed information. (<http://www.yiiframework.com/>) 


### 3. Setup the ArmoryRaider config file (intended for mySQL DB).

Now you have to setup the connection information to the database.
   
- Browse the file "~/armoryraider/protected/config/main.php".
- Find the string 'mysql:host=127.0.0.1;dbname=armoryraider', and edit 
  the host value and the dbname value.
- Find the string "'username' => 'root'" and the string 
  "'password' => 'password'", and edit those according to your mySQL
  account.

Please note that: You can also use others DBMS, refer to Yii site for
more detailed information. (<http://www.yiiframework.com/>)
   

### 4. Copy the whole armoryraider folder to your web space.

- Change the permission of the directories "**assets**", "**images**" and "**protected/runtime**" so 
  that they are writable by the Web server process.
- Point your browser to the base URL of your application and login as admin 
  using the following login details:
  - user: **admin**
  - password: **admin**
 
You will be guided through two screens to set up the application and the 
main guild (other guilds will be added automatically while adding new 
characters from other guilds).
   

### 5. Enjoy! :]  



* * *

Change log
==================
All the changes i make and commit will go to the development branch and is only available through a git pull. When I find that it's time for a new release i will make a new zip file for download and modify the changelog so the changes are in a version.

In the development branch you can always find the actual development situation.

N.B. I'm currently working behind a firewall, so no git updates temporarily.

Version 1.1.3
----------------------
- Fixed an homepage HTML bug
- Added "type" field for the raids labels (Normal, Heroic, LFR, Flex, ...)
- Added the script file to update the DB from verion 1.0.x (or earlier) to 1.1.3 1.0.x_to_1.1.3.sql in "protected/data"
- Raidleaders can now change characters roles
- Other minor fixes

Version 1.0.1
----------------------
- Fixed user registration and user attivation bug

Version 1.0
----------------------
- Added reset password
- Added "guild roster", "events I attended", "events list" functions under the new "guild" item menu
- Added reset_password database table, so you need to redump your DB (or ask me for an update script 0.x to 1.0)
- Added social networks link to the event
- Added new fancy icons
- Fixed broken characters link to the armory
- Others minor fixes


Version 0.9Beta2
----------------------
- Fixed coming events widget images for unix systems

Version 0.9Beta1
----------------------
 - Modified "select date" button behavior for calendar
 - Added raid images for coming events widget
 - Added raidleader's comments to the events in homepage
 - Fixed mysql schema, it was broke
 - Fixed some 403 error
 - Others minor fixes and changes

Version 0.8Beta3
----------------------
 - Fixed portrait bug for Unix based Systems
 - Fixed some CSS style inconsistency
 - Fixed first run assets image bug

Version 0.8Beta2
----------------------
 - Fixed mySQL tables "AuthAssignment", "AuthItem", "AuthItemChild" bug for case sensitive File Systems.



*Page still in progress*
