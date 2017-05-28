<?php

class Admin extends Person {
    private $id;
    private $password;
    private $role;
            function __construct($name, $phone, $email, $image, $password, $role = NULL, $id = NULL) {
        parent::__construct($name, $phone, $email, $image);
        $this->password = password_hash(filter_var($password, FILTER_SANITIZE_STRING), PASSWORD_DEFAULT);
        $this->role = filter_var($role, FILTER_SANITIZE_STRING);
        $this->id = $id;
    }
        public function save(){ 
            $stmt = getDBConn::getConn()->prepare("INSERT INTO admins (name, phone, email, image, password, roles_id)
            VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param('ssssss', $this->name, $this->phone,  $this->email, $this->image, $this->password, $this->role);
            $stmt->execute();
        }
        public function update(){ 
            $stmt = getDBConn::getConn()->prepare("UPDATE admins SET name = ?, phone = ?,
            email = ?, image = ?, password = ? WHERE id = $this->id");
            $stmt->bind_param('sssss', $this->name, $this->phone,  $this->email, $this->image,
            $this->password);
            $stmt->execute();
            
            if (isset($this->role)) {
                $stmt = getDBConn::getConn()->prepare("UPDATE admins SET roles_id = ? WHERE id = $this->id");
                $stmt->bind_param('s', $this->role);
                $stmt->execute();
            }
        }
        public static function delete($id){
            getDBConn::getConn()->query("DELETE FROM admins WHERE id = $id");
        }
}