<?php
class User {
/*	private $dbHost     = "us-cdbr-iron-east-03.cleardb.net";
    private $dbUsername = "b4d75f547986fc";
    private $dbPassword = "78e273f8";
    private $dbName     = "heroku_aa918aba70a4844";
    private $userTbl    = 'n_users';*/
    private $dbHost     = "localhost";
    private $dbUsername = "root";
    private $dbPassword = "";
    private $dbName     = "myblog";
    private $userTbl    = 'n_users';


    function __construct(){
        if(!isset($this->db)){
            // Connect to the database
            $conn = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
            if($conn->connect_error){
                die("Failed to connect with MySQL: " . $conn->connect_error);
            }else{
                $this->db = $conn;
            }
        }
    }
    
    function checkUser($userData = array()){
        if(!empty($userData)){
            //Check whether user data already exists in database
            $sorgu = "SELECT * FROM " .$this->userTbl." WHERE email = '".$userData['email']."'";
            $prevQuery = "SELECT * FROM ".$this->userTbl." WHERE oauth_provider = '".$userData['oauth_provider']."' AND oauth_uid = '".$userData['oauth_uid']."'";
            $prevResult = $this->db->query($prevQuery);
            $sorguSonuc = $this->db->query($sorgu);
          //  print_r($sorguSonuc);
                //print_r($prevResult); 
            if($prevResult->num_rows > 0  ){
                //Update user data if already exists
                $query = "UPDATE ".$this->userTbl." SET first_name = '".$userData['first_name']."', last_name = '".$userData['last_name']."', email = '".$userData['email']."', gender = '".$userData['gender']."', locale = '".$userData['locale']."', picture = '".$userData['picture']."', link = '".$userData['link']."', modified = '".date("Y-m-d H:i:s")."' WHERE oauth_provider = '".$userData['oauth_provider']."' AND oauth_uid = '".$userData['oauth_uid']."'";
                $update = $this->db->query($query);
            }
            elseif($sorguSonuc->num_rows > 0) {
                $query = "UPDATE ".$this->userTbl." SET onay = '".'1'."',oauth_provider = '".$userData['oauth_provider']."', oauth_uid = '".$userData['oauth_uid']."',first_name = '".$userData['first_name']."', last_name = '".$userData['last_name']."', email = '".$userData['email']."', gender = '".$userData['gender']."', locale = '".$userData['locale']."', picture = '".$userData['picture']."', link = '".$userData['link']."', modified = '".date("Y-m-d H:i:s")."' WHERE email = '".$userData['email']."'";
                $update = $this->db->query($query);

            }

            else{

                //Insert user data
                $query = "INSERT INTO ".$this->userTbl." SET oauth_provider = '".$userData['oauth_provider']."', oauth_uid = '".$userData['oauth_uid']."', first_name = '".$userData['first_name']."', last_name = '".$userData['last_name']."', email = '".$userData['email']."', gender = '".$userData['gender']."', locale = '".$userData['locale']."', picture = '".$userData['picture']."', link = '".$userData['link']."', created = '".date("Y-m-d H:i:s")."', modified = '".date("Y-m-d H:i:s")."'";
                $insert = $this->db->query($query);
            }
            
            //Get user data from the database
            $result = $this->db->query($prevQuery);
            $userData = $result->fetch_assoc();
        }
        
        //Return user data
        return $userData;
    }
}
?>
