<?php 
    namespace App\Models;
    use App\Core\Database;
    use Firebase\JWT\JWT;
    use PDO;

    class User{
        private $id;
        private $username;
        private $email;
        private $password;
        private $con;

        public function __construct()
        {
            $this->con=Database::getInstance()->getConnection();
        }

        public function __get($property)
        {
            if(property_exists($this,$property)){
               return $this->$property;
            }
        }

        public function __set($property, $value) {
            if (property_exists($this, $property)) {
                $this->$property = $value;
            }
        }

        function emailExists($email){
            $query = "SELECT COUNT(*) FROM users WHERE email = :email";
            $stmt = $this->con->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            return $stmt->fetchColumn() > 0;
        }

        public function saveUser($username, $email, $password) {
            if($this->emailExists($email)){
                echo json_encode(['success' => false, 'message' => 'This email is already taken']);
                exit;
            }
        
            $query = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
            $stmt = $this->con->prepare($query);
            
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt->bindParam(':password', $hashedPassword);
        
            if ($stmt->execute()) {
                $issuedAt = time();
                $userId = $this->con->lastInsertId();
                
                $payload = [
                    'iat' => $issuedAt,
                    'exp' => $issuedAt + 3600,
                    'userId' => $userId,
                    'username' => $username,
                    'email' => $email
                ];
        
                $jwtSecret = $_ENV['JWT_SECRET'];
                $jwt = JWT::encode($payload, $jwtSecret, 'HS256');
        
                echo json_encode(['success' => true, 'token' => $jwt , 'username' => $username]);
                exit;
            } else {
                echo json_encode(['success' => false, 'message' => 'Something went wrong during registration']);
                exit;
            }
        }
        
        public function loginUser($username, $password) {
            $query = "SELECT * FROM users WHERE username = :username";
            $stmt = $this->con->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
         
            if ($user) {
                if (password_verify($password, $user['password'])) {
                    $issuedAt = time();
                    $userId = $this->con->lastInsertId();
                    $payload = [
                        'iat' => $issuedAt,
                        'exp' => $issuedAt + 3600,
                        'userId' => $userId,
                        'username' => $user['username'],
                        'email' => $user['email']
                    ];
                    $jwtSecret = $_ENV['JWT_SECRET'];
                    $jwt = JWT::encode($payload, $jwtSecret, 'HS256');

                    echo json_encode(['success' => true, 'token' => $jwt , 'username' => $user['username']]);

                } else {
                    echo json_encode(['success' => false, 'message' => 'Incorrect password']);
                }
            } else {
                echo json_encode(['success' => false, 'message' => 'Username does not exist']);
            }
        }
        
        
    }
?>