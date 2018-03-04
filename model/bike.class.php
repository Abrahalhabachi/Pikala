<?php

    class Bike
    {
        const TABLENAME = '`bikes`';
        const OTHERTABLE = '`bike_types`';

        private $id;
        private $owner_id;
        private $type;
        private $price;
        private $manufacturer;
        private $year;

        public function __construct($owner_id, $type, $price, $manufacturer, $year, $id=null)
        {
        $this->owner_id = $owner_id;
        $this->id = $id;
        $this->type = $type;
        $this->price = $price;
        $this->manufacturer = $manufacturer;
        $this->year = $year;
        }

        public function __get($key)
        {
            if(isset($this->$key))
            {
                return($this->$key);
            }
        }

        public function __set($key, $value)
    {
        $this->$key = $value; 
    }

        public function save(&$error)
    {
        if($this->id == null)
        {
            $this->insert($error);
        }
        else
        {
            $this->update($error);
        }
    }

    public function insert(&$error)
    {
        $pdo = $GLOBALS['pdo'];

        try
        {
            $sql1 = 'INSERT INTO `bikes` (owner_id, price) VALUES (:owner_id, :price)';
            $stmt1 = $pdo->prepare($sql1);
            $stmt1->execute(['owner_id'      => $this->owner_id,
                            'price'         => $this->price]);
            

            $sql2 = 'SELECT * FROM `bikes` WHERE owner_id = :owner_id
                    order by bike_id DESC LIMIT 1';
            $stmt2 = $pdo->prepare($sql2);
            $stmt2->execute(['owner_id'      => $this->owner_id]);

            $result = $stmt2->fetch();
            $this->id= $result['bike_id'];

            $sql3 = 'INSERT INTO '. self::OTHERTABLE .' (bike_id, manufacturer, type, year_)
                    VALUES (:bike_id, :manufacturer, :type, :year)';
            $stmt3 = $pdo->prepare($sql3);
            $stmt3->execute(['bike_id'       => $this->id,
                            'manufacturer'  => $this->manufacturer,
                            'type'          => $this->type,
                            'year'          => $this->year]);
            $error = null;                
            return true;
        }

        catch (\PDOException $e)
        {
            $errors[] = 'Error inserting '.get_called_class();
        }
        return false;
    }

    // private function update(&$errors)
    // {
    //     $pdo = $GLOBALS['pdo'];

    //     try
    //     {
    //         $sql = 'UPDATE '. self::TABLENAME.' SET 
    //         (first_name = :first_name, last_name = :last_name, email = :email, password = :password, 
    //         street = :street, house_number = :house_number, city = :city, zip_code = :zip_code)
    //          WHERE user_id = :id';
           
    //         $statement = $pdo->prepare($sql);
    //         $stmt->execute(['first_name'    => $this->first_name,
    //                         'last_name'     => $this->last_name,
    //                         'email'         => $this->email,
    //                         'password'      => $this->pwd,
    //                         'street'        => $this->street,
    //                         'house_number'  => $this->house_number,
    //                         'city'          => $this->city,
    //                         'zip_code'      => $this->zip_code,
    //                         'id'            => $this->id]);

    //         return true;
    //     }

    //     catch (\PDOException $e)
    //     {
    //         $errors[]= 'Error updating '.get_called_class();
    //     }
    //     return false;
    // }

        // public function find()
        // {
        //     $pdo = $GLOBALS['pdo'];
        //     $result = null;
            
        //     try
        //     {
        //         $sql = 'select * from ' . self::TABLENAME . 'where email = :email';
        //         $stmt = $pdo->prepare($sql);
        //         $stmt->execute(['email' => $this->email]);
        //         $result = $stmt->fetch();
        //     }

        //     catch(PDOException $e)
        //     {
        //         die('select statement failed :'. $e->getMessage());
        //     }

        //     return $result;
        // }
    }

?>