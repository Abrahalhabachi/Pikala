<?php

    class User
    {
        const TABLENAME = '`users`';

        private $id;
        private $first_name;
        private $last_name;
        private $email;
        private $pwd;
        private $street;
        private $house_number;
        private $city;
        private $zip_code;
        private $date_joined;
        private $address;

        public function __construct($first_name, $last_name, $email, $pwd, $street, 
                                     $house_number, $city, $zip_code, $id=null, $date_joined=null)
        {
        $this->id = $id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->pwd = $pwd;
        $this->street = $street;
        $this->house_number = $house_number;
        $this->city = $city;
        $this->zip_code = $zip_code;
        $this->date_joined = $date_joined;
        $this->address = $this->street . ' ' . $this->house_number . ' ,' . $this->city . ' ' . $this->zip_code ; 
        }

        public function __get($key)
        {
            if(isset($this->$key))
            {
                return($this->$key);
            }
        }

        public function save(&$errors = null)
    {
        if($this->id == null)
        {
            $this->insert($errors);
        }
        else
        {
            $this->update($errors);
        }
    }

    private function insert(&$errors)
    {
        $pdo = $GLOBALS['pdo'];

        try
        {
            $sql = 'INSERT INTO '. self::TABLENAME . 
            ' (first_name, last_name, email, password, street, house_number, city, zip_code)
            VALUES 
            (:first_name, :last_name, :email, :password, :street, :house_number, :city, :zip_code)';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['first_name'    => $this->first_name,
                            'last_name'     => $this->last_name,
                            'email'         => $this->email,
                            'password'      => $this->pwd,
                            'street'        => $this->street,
                            'house_number'  => $this->house_number,
                            'city'          => $this->city,
                            'zip_code'      => $this->zip_code]);
            return true;
        }

        catch (\PDOException $e)
        {
            $errors[] = 'Error inserting '.get_called_class();
        }
        return false;
    }

    private function update(&$errors)
    {
        $pdo = $GLOBALS['pdo'];

        try
        {
            $sql = 'UPDATE '. self::TABLENAME.' SET 
            (first_name = :first_name, last_name = :last_name, email = :email, password = :password, 
            street = :street, house_number = :house_number, city = :city, zip_code = :zip_code)
             WHERE user_id = :id';
           
            $statement = $pdo->prepare($sql);
            $stmt->execute(['first_name'    => $this->first_name,
                            'last_name'     => $this->last_name,
                            'email'         => $this->email,
                            'password'      => $this->pwd,
                            'street'        => $this->street,
                            'house_number'  => $this->house_number,
                            'city'          => $this->city,
                            'zip_code'      => $this->zip_code,
                            'id'            => $this->id]);

            return true;
        }

        catch (\PDOException $e)
        {
            $errors[]= 'Error updating '.get_called_class();
        }
        return false;
    }

        public function find()
        {
            $pdo = $GLOBALS['pdo'];
            $result = null;
            
            try
            {
                $sql = 'select * from ' . self::TABLENAME . 'where email = :email';
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['email' => $this->email]);
                $result = $stmt->fetch();
            }

            catch(PDOException $e)
            {
                die('select statement failed :'. $e->getMessage());
            }

            return $result;
        }
    }

?>