<?php
    header('Access-Control-Allow-Origin: *');

    header('Access-Control-Allow-Methods: GET, POST');
    
    header("Access-Control-Allow-Headers: X-Requested-With");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "update task set status = 'In progress' where id=?";
        $conn = open_database();
    
        $stm = $conn->prepare($sql);
        $stm->bind_param('i',$id);
        if(!$stm->execute()){
            return array('code'=> 2, 'error' => 'Can not execute command.');
        }
        
        return array('code'=> 0,'success' => 'Task status change to In progress.');
    }else{
        return array('code'=> 1,'error' => 'Only can use GET method');
    }

?>