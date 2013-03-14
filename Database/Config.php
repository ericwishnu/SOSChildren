<?php
class Config {
    
    private $db_host = 'localhost:';
    private $db_port_num = '3306';
    private $db_user = 'root';
    private $db_password = '';
    private $db_name = 'sos';
    private $db_connection;

    function db_connect()
    {
        $this->db_connection = mysql_connect ($this->db_host.$this->db_port_num, $this->db_user, $this->db_password);
        
        if (!$this->db_connection) {
            throw new Exception('Could not connect to database server');
        } else {
            $db_select = mysql_select_db ($this->db_name);
            return $db_select;
        }
    }
    
    function db_query($query)
    {
        $result = mysql_query($query);
        if(!$result)
        {
        }
        else return $result;
        
        
    }
       function db_close()
    {
        mysql_close ($this->db_connection);
    }
    
}

?>
