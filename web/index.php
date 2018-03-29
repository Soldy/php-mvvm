<?php



if(!isset($_POST))
    $_POST=[];

$includeDir = '../engine/';
$modelDir = '../models/';
$langDir = '../lang/';
$configDir = '../config/';
require_once ($configDir . 'config.php');
require_once ($includeDir . 'session.php');
require_once ($includeDir . 'table.php');
require_once ($includeDir . 'details.php');
require_once ($includeDir . 'lang.php');
require_once ($includeDir . 'utils.php');
require_once ($includeDir . 'sql.php');
$sql = new SQL();
require_once ($includeDir . 'debug.php');
if ($super_config['langLearn'])
    require_once ($includeDir . 'lang.learn.start.php');
require_once ($includeDir . 'head.php');

hC("css/base.css");

function usercheck() {
    
}

if ((isset($_POST)) && (isset($_POST['c']))) {
    if ($_POST['c'] == "logout") {
        require_once ($includeDir . 'logout.php');        
    } elseif ($_POST['c'] == "login") {
        require_once ($includeDir . 'login.php');
    } elseif((isset($_SESSION)) && (isset($_SESSION['userid']))){
        require_once ($includeDir . 'inside.php');
    }else{
        require_once ($includeDir . 'outside.php');        
    }
    
    
} elseif ((isset($_SESSION)) && (isset($_SESSION['userid']))) {
    require_once ($includeDir . 'inside.php');
} else {
    require_once($includeDir . 'outside.php');
}

require_once($includeDir . 'footer.php');

if ($super_config['langLearn'])
    require_once ($includeDir . 'lang.learn.end.php');
endOut();
