<?php


function debug ($message, $level=5){
    echo ($message."\n");
}


 if($sql->userFree($_POST['user'], $_POST['email']))userRegErrorAdd(__('A felhasznaloi nev vagy emailcim mar foglalt.'));
 if($_POST['passwordA'] != $_POST['passwordB'])userRegErrorAdd(__('A ket jelszo nem egyezik meg'));
 
 if($_POST['userRegError']>0){
    include ($includeDir .'/user.reg.php');
 }else{
    $userId = $sql->userReg($_POST['user'], $_POST['email'], $_POST['passwordA']); 
    o('<div class="ticketThankYou">'. __('Regisztraciojat koszonjuk'). "</div>");
    o('<div class="ticketThankYou"><a href="/">'. __('vissza a fo oldalra'). "</a></div>");
 }
 
 
 

$includeDir = 'include';
require_once ($includeDir . '/config.php');
require_once ($includeDir . '/lang.php');
require_once ($includeDir . '/sql.php');
$sql = new SQL();


if ($super_config['langLearn'])
    require_once ($includeDir . '/lang.learn.start.php');

class commandLine {

    public $out;
    public $sql;

    public function o($addoutput) {
        $this->out .= $addoutput . "\n";
    }

    public function __construct() {
        global $argv;
        $sql=$this->sql = new SQL();
        switch ($argv[1]) {
            case "userAdd":

                if ((isset($argv[2])) && (isset($argv[3]))) {
                    if (!isset($argv[4])) $argv[4]=$this->sql->getSalt(20);
                    $this->userAdd($argv[2], $argv[3], $argv[4]);
                }
                break;

            default:
        }
    }

    public function userAdd($login, $email, $password) {
        $userId = $this->sql->userReg($login, $email, $password);    
        $this->o(__('Regisztracio kesz.'));        
        $this->o(__('Felhasználói azonosító')." : ". $userId);
        $this->o(__('Jelszó')." : ". $password);
    }
    public function userGet($login) {
        $userId = $this->sql->userReg($login, $email, $password);    
        $this->o(__('Regisztracio kesz.'));        
        $this->o(__('Felhasználói azonosító')." : ". $userId);
        $this->o(__('Jelszó')." : ". $password);
    }
    
    public function userChangePassword($login, $email, $password) {
        $userId = $this->sql->userReg($login, $email, $password);    
        $this->o(__('Regisztracio kesz.'));        
        $this->o(__('Felhasználói azonosító')." : ". $userId);
        $this->o(__('Jelszó')." : ". $password);
    }
    
    public function __destruct() {
        echo("\n" . $this->out . "\n");
    }

}

$clt=NEW commandLine ();
//echo ();



if ($super_config['langLearn'])
    require_once ($includeDir . '/lang.learn.end.php');

