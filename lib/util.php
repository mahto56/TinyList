<?php
  function get_json($obj_list){
    if($obj_list === 0)
    {
         echo "[]";
    }
    else{
        $json_list = array();
          while($row = $obj_list->fetch_assoc()){
          $json_list[] = $row;
        }
        echo json_encode($json_list);
    }
  }
?>