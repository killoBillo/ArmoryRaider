<?php
    $GLOBALS['wowarmory']['db']['driver'] = 'mysql'; // Dont change. Only mysql supported so far.
    $GLOBALS['wowarmory']['db']['hostname'] = '127.0.0.1'; // Hostname of server. 
    $GLOBALS['wowarmory']['db']['dbname'] = 'wowraider'; //Name of your database
    $GLOBALS['wowarmory']['db']['username'] = 'root'; //Insert your database username
    $GLOBALS['wowarmory']['db']['password'] = 'password'; //Insert your database password
    include('BattlenetArmory.class.php'); //include the main class
    
    
    // Load the class and define the realm and region 
    $armory = new BattlenetArmory('EU','Runetotem'); 
    
    // Initialize the guild object
    $guild = $armory->getGuild('I Grifoni di Stormwind');
    
    $members = $guild->getMembers('name','asc');
    //var_dump($guild);
    
    //$guild->showEmblem(TRUE,'500');


    // Get the character object. Will return FALSE if the
    // character could not be found or character is frozen.
    $character = $armory->getCharacter('frontline');
    
    var_dump($character);
    $character->getProfileInsetURL();          

    $profileurl = $character->getProfilePicURL();
    $thumbnailurl = $character->getThumbnailURL();
    $profileinseturl = $character->getProfileInsetURL();
    
    //var_dump($thumbnailurl);
    //var_dump($profileinseturl);
    
    echo "<div><img src='$profileurl' /></div>";
    echo "<div><img src='$profileinseturl' /></div>";
    echo "<div><img src='$thumbnailurl' /></div>";

?>