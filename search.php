<?php
 mysql_connect("localhost:3306","root","");
 mysql_select_db("accounts");
 
 $term=$_GET["term"];
 
 $query=mysql_query(" SELECT acno FROM student where acno like '%".$term."%' AND deleteable='1' order by acno ");
 $json=array();
 
    while($result=mysql_fetch_array($query)){
         $json[]=array(
                    'value'=> $result["acno"],
                    'label'=>$result["acno"]." - ".$result["ac"]
                        );
    }
 
 echo json_encode($json);
 
?>