<?php
require ("vendor/autoload.php");
require ("conexion.php");
class GoogleAuth{
    protected $client;

    public function __construct(Google_Client $googleClient = null){
        $this->client = $googleClient;
        if($this->client){
            $this->client->setClientId('874709735423-ba91lt8n7164kbmnjjpvim2956uusucb.apps.googleusercontent.com');
            $this->client->setClientSecret('WMFmxG83txAoxqZn5BgywMnT');
            $this->client->setRedirectUri('http://localhost/CuciRenta/Inicio.php');
            $this->client->setScopes('email');
        }
    }
    public function isLoggedIn(){
        return isset($_SESSION['access_token']);
    }
    public function getAuthUrl(){
        return $this->client->createAuthUrl();
    }
   
    public function checkRedirectCode(){
        $code= isset($_GET['code']) ? $_GET['code'] : null;
        
        if(isset($code)){
            try{
            $token = $this->client->fetchAccessTokenWithAuthCode($code);
            $this->client->setAccessToken($token);
            $_SESSION['access_token']=$token;
            }catch(Exception $e){
                echo $e->getMessage();
               
            }
            try{
                $payload = $this->client->verifyIdToken();
                $this->createUser($payload);
                $_SESSION['usuario'] = $payload['email'];
            }catch(Exception $e){
                echo $e->getMessage();
                
            }
            
            }else{
                $payload = null;
            }

    }
    public function logout(){
        unset($_SESSION['access_token']);
    }
    
    public function createUser($payload){
        require ("conexion.php");
        $r=$payload['sub'];
        $t=$payload['email'];
        try{
        $sql = "insert into usuario (id_google, email) values (:id,:email)";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':id',$r,PDO::PARAM_STR); 
        $statement->bindParam(':email',$t,PDO::PARAM_STR); 
        $statement->execute();
        }catch(Exception $e){
            echo $e->getMessage();
        }finally{

        }
    }


}
/*
    class GoogleAuth{
        private $client;

        public function __construct(Google_client $googleClient = null){
            $this->client = $googleClient;
            if($this->client){
                $this->client->setClientId('874709735423-ba91lt8n7164kbmnjjpvim2956uusucb.apps.googleusercontent.com');
                $this->client->setClientSecret('WMFmxG83txAoxqZn5BgywMnT');
                $this->client->setRedirectUri('http://localhost/CuciRenta/Inicio.php');
                $this->client->setScopes('email');
            }
        }
        public function isLoggedIn(){
            return isset($_SESSION['access_token']);
        }
        public function getAuthUrl(){
            return $this->client->createAuthUrl();
        }
        public function checkRedirectCode(){
            if(isset($_GET['code'])){
                $this->client->authenticate($_GET['code']);
                $this->setToken($this->client->getAccessToken());
                //$payload=$this->getPayload();
                return true;
            }
            return false;

        }
        public function setToken($token){
            $_SESSION['access_token']=$token;
            $this->client->setAccessToken($token);
        }
        public function logout(){
            unset($_SESSION['access_token']);
        }
        public function getPayload(){
            $payload = $this->client->verifyIdToken()->getAttributes();
            return $payload;
        }
        
        public function createUser($payload){
            $query = "insert into usuario (id_google, email) values (?,?)";
            $statement = $pdo->prepare($query);
            $statement->bind_param("ss",$payload['payload']['sub'],$payload['payload']['email']);
            $statement->execute();
            $statement->close;
        }
    }
*/
?>
