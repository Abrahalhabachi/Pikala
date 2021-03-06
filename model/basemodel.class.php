<?php

abstract class BaseModel
{

    const TYPE_INT = 'int';
    const TYPE_FLOAT = 'float';
    const TYPE_STRING = 'string';

    protected $schema = [];
    protected $data = [];

    public function __construct($params)
    {
        foreach($this->$schema as $key -> $value)
        {
            if(isset($params[$key]))
            {
                $this->{$key}= $params[$key];
            }
            else
            {
                $this->{$key} = null;
            }
        }
    }

    public function __get($key)
    {
        if(array_key_exists($key,$this->$data))
        {
            return $this->$data[$key];
        }

        throw new \Exception('you cannot access to "'.$key.'"" for the class "'.get_called_class());
    }

    public function __set($key, $value)
    {
        if(array_key_exists($key, $this->schema))
        {
            $this->data[$key] = $value;
        }
        else throw new \Exception('cannot write to "'.$key.'"" for the class "'.get_called_class());
    }

    public function save(&$errors = null)
    {
        if($this->id === null)
        {
            $this->insert($errors);
        }
        else
        {
            $this->update($errors);
        }
    }

    protected function insert(&$errors)
    {
        $db = $GLOBALS['db'];

        try
        {
            $sql = 'INSERT INTO '. self::tablename(). ' (';
            $valueString = ' VALUES (';

            foreach ($this->schema as $key -> $schemaOptions)
            {
                $sql .= '` '.$key.'` ';
                if ($this->data[$key] === null)
                {
                    $valueString .= ' NULL, ';
                }
                else
                {
                    $valueString .= $db->quote($this->data[$key]). ' ,';
                }
            }

            $sql = trim($sql, ',');
            $valueString = trim($valueString, ',');
            $sql .= ' )'.$valueString. ' )';
            $statement = $db->prepare($sql);
            $statement->execute();

            return true;
        }

        catch (\PDOException $e)
        {
            $errors[]= 'Error inserting '.get_called_class();
        }
        return false;
    }

    protected function update(&$errors)
    {
        $db = $GLOBALS['db'];

        try
        {
            $sql = 'UPDATE '. self::tablename(). ' SET ';
            $valueString = ' VALUES (';

            foreach ($this->schema as $key -> $schemaOptions)
            {
                if ($this->data[$key] !== null)
                {
                    $sql .= $key . ' = '. $db->quote($this->data[$key]). ' ,' ;
                }
            }

            $sql = trim($sql, ',');
            $sql .= 'WHERE id = ' .$this->data['id'];
            $statement = $db->prepare($sql);
            $statement->execute();

            return true;
        }

        catch (\PDOException $e)
        {
            $errors[]= 'Error updating '.get_called_class();
        }
        return false;
    }

    protected function validateValue($attribute, &$value, &$schemaOptions)
    {
        $type = $schemaOptions['type'];
        $errors = [];

        switch($type)
        {
            case Basemodel::TYPE_INT:
            break;
            case Basemodel::TYPE_STRING:
            break;
            case Basemodel::TYPE_FLOAT:
            break;
        }
    }


    public function delete(&$errors = null)
    {
        $db = $GLOBALS['db'];

        try
        {
            $sql = 'DELETE FROM '. self::tablename(). ' WHERE id = '. $this->id;
            $db->exec($sql);
            return true;
        }

        catch (\PDOException $e)
        {
            $errors[]= 'Error deleting '.get_called_class();
        }
        return false;
    }


    public static function tablename()
    {
        $class = get_called_class();
        if(defined($class.'::TABLENAME'))
        {
            return $class::TABLENAME;
        }
        return null;
    }

    public static function find($where = '')
        {
            $db = $GLOBALS['db'];
            $result = null;
            
            try
            {
                $sql = 'select * from ' .self::tablename();
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