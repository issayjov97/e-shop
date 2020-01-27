    <?php


    class User
    {

        const DEFAULT_ROLE = 1;
        public static function register($name,$surname, $email,$phoneNumber, $password) {
            
            $db = Db::getConnection();

            $sql = 'INSERT INTO zakaznici (jmeno, prijmeni, heslo, cislo, email) '
                    . 'VALUES (:jmeno, :prijmeni, :heslo, :cislo, :email)';
            
            $result = $db->prepare($sql);
            $result->bindParam(':jmeno', $name, PDO::PARAM_STR);
            $result->bindParam(':prijmeni', $surname, PDO::PARAM_STR);
            $result->bindParam(':heslo', $password, PDO::PARAM_STR);
            $result->bindParam(':cislo', $phoneNumber, PDO::PARAM_STR);
            $result->bindParam(':email', $email, PDO::PARAM_STR);
            if($result->execute())
            {
               return $db->lastInsertId();

            }
        }
        
   public static function addRole($id) {
            
            $db = Db::getConnection();

            $sql = 'INSERT INTO `zakaznici_role`(`id_role`, `id_zakaznika`) VALUES (:id_role,:id_zakaznika)';
            
            $result = $db->prepare($sql);
            $result->bindValue(':id_role', self::DEFAULT_ROLE);
            $result->bindParam(':id_zakaznika', $id, PDO::PARAM_STR);
 
            return $result->execute();
        }


     
        public static function checkJmeno($jmeno) {
            if (strlen($jmeno) >= 2) {
                return true;
            }
            return false;
        }

           public static function checkPrijmeni($prijmeni) {
            if (strlen($prijmeni) >= 2) {
                return true;
            }
            return false;
        }
        
    
        public static function checkPassword($heslo) {
            if (strlen($heslo) >= 6) {
                return true;
            }
            return false;
        }

         public static function checkTelefon($cislo) {
            if (strlen($cislo) >= 6) {
                return true;
            }
            return false;
        }
        
      
        public static function checkEmail($email) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return true;
            }
            return false;
        }
        
        public static function checkEmailExists($email) {
            
            $db = Db::getConnection();
            
            $sql = 'SELECT COUNT(*) FROM zakaznici WHERE email = :email';
            
            $result = $db->prepare($sql);
            $result->bindParam(':email', $email, PDO::PARAM_STR);
            $result->execute();

            if($result->fetchColumn())
                return true;
            return false;
        }

            public static function checkUserData($email,$heslo) {
            $db = Db::getConnection();
            
            $sql = "SELECT * FROM zakaznici WHERE email = :email AND heslo = :heslo";
            
            $result = $db->prepare($sql);
            $result->bindParam(':email', $email);
            $result->bindParam(':heslo', $heslo);
            $result->execute();
            $zakaznik = $result->fetch();

            if(isset($zakaznik)){
                return $zakaznik['id_zakaznika'];        	
            }
            return false;
        }


        public static function auth($id_zakaznika){

        $_SESSION['id_zakaznika'] = $id_zakaznika;

        }



       public static function checkLogged(){
     
     if(isset($_SESSION['id_zakaznika'] ))
     return $_SESSION['id_zakaznika'];

    return false;
     }


       public static function isGuest(){
     
     if(isset($_SESSION['id_zakaznika'] )){
     return false;
     }
     return true;
     }


         public static function getUserById($id)
        {
            $id = intval($id);
            if ($id) {                        
                $db = Db::getConnection();
                
                $result = $db->prepare('SELECT * FROM zakaznici WHERE id_zakaznika = :id');
                $result->bindParam(':id', $id, PDO::PARAM_INT);
                $result->execute();
                $zakaznik = $result->fetch();
                return $zakaznik;
            }
        }



             public static function getUserRoles($id)
        {
            $id = intval($id);
            $roles = array();
            if ($id) {                        
                $db = Db::getConnection();
                
                $result = $db->prepare("SELECT role.* FROM role
    INNER JOIN zakaznici_role USING(id_role)
    INNER JOIN zakaznici USING(id_zakaznika)
    WHERE zakaznici.id_zakaznika = :id");
                $result->bindParam(':id', $id, PDO::PARAM_INT);
                $result->execute();
                $i=0;
                while ($row = $result->fetch()) {
                $roles[$i]['id'] = $row['id_role'];
                $roles[$i]['nazev'] = $row['nazev'];
                $i++;
                }
                return $roles;
            }
        }



        public static function updateUser($id,$jmeno,$prijmeni,$cislo,$email){
            $db = Db::getConnection();
            $sql = "UPDATE `zakaznici` SET `jmeno`='$jmeno',`prijmeni`='$prijmeni',`cislo`='$cislo',`email`='$email'". " WHERE id_zakaznika = :id";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id',$id);

            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

             return $stmt->execute();
        }


             public static function getUserOrders($id)
        {
            $id = intval($id);
            if ($id) {                        
                $db = Db::getConnection();
                $result = $db->prepare("SELECT * FROM objednavky"
                ." WHERE id_zakaznika = :id");
                $result->bindParam(':id', $id, PDO::PARAM_INT);
                $result->execute();
                return  $result->fetchAll(PDO::FETCH_ASSOC);
            }
        }

        
        

        
    }