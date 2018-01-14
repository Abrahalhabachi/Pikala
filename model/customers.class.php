<?php

    class Customers extends BaseModel
    {
        const TABLENAME = '`customers`';
        private $customer_data;

        public function __construct($id, $email, $first_name, $last_name)
        {
            $this->data['user_id'] = $id;
            $this->data['email'] = $email ;
            $this->data['first_name'] = $first_name;
            $this->data['last_name'] = $last_name;
        }

        public function __get($key)
        {
            if(isset($this->data[$key]))
            {
                return($this->data[$key]);
            }
        }

        public static function find($where = '')
        {
            $db = $GLOBALS['db'];
            $result = null;
            
            try
            {
                $sql = 'select * from ' .self::TABLENAME;
                if(!empty($where))
                {
                    $sql .= ' WHERE ' . $where .';' ;
                }

                $result = $db->query($sql)->fetchAll();
            }

            catch(PDOException $e)
            {
                die('select statement failed :'. $e->getMessage());
            }

            return $result;
        }
    }

?>