<?php

    /**
     * Validation message
     */
    function validate($msg, $type = 'danger'){
        return '<p class="alert alert-'.$type.'"> '. $msg .' ! <button class="close" data-dismiss="alert">&times;                  </button></p>';
    }






    /**
     * Database Control ( Insert )
     */
    function insert($sql){
        global $connection;
        $connection -> query($sql);
    }


    /**
     * Database Control ( Insert )
     */
    function all($table, $where = null,   $order = 'DESC'){
        global $connection;

        $sql = "SELECT * FROM $table  $where ORDER BY id $order";
        return $connection -> query($sql);
    }

    /**
     * Data check
     */
    function valueCheck($table, $column, $val){
        global $connection;

        $sql = "SELECT  $column FROM $table WHERE  $column='$val'";
        $data = $connection -> query($sql);
        return  $data -> num_rows;
    }





    /**
     * Auth User Detyails
     */
    function auth(){
        global $connection;
        $id = $_SESSION['user_id'];
        $sql = "SELECT  * FROM users WHERE  id='$id'";
        $data = $connection -> query($sql);

        return $data -> fetch_assoc();
    }


//Photo uploading system
function photoUpload($photo, $location, $file_type=['jpg','png','gif','jpeg'], $file_size=1024){

    //photo information
    $photo_name = $photo['name'];
    $photo_tmp_name = $photo['tmp_name'];
    $photo_size = $photo['size']/1024;

    //file extention
    $photo_expld = explode('.',$photo_name);
    $photo_ext = strtolower (end($photo_expld));

    //unique name
    $uniqueName = md5(time(). rand()).'.'.$photo_ext;
    //$uniqueName = date('d-m-y g:i:s').'.'.$photo_ext;

    //file size fix
    if($photo_size > $file_size){
        $Photo_sz = false;
    }else{
        $Photo_sz = true;
    }


    $mess= null;
    if(in_array($photo_ext, $file_type)==false){
        $mess = "<p class=\"alert alert-warning\"> Your Photo Format is not valid!! <button class=\"close\" data-dismiss=\"alert\">&times;</button> </p>";
    }elseif( $Photo_sz == false){
        $mess = "<p class=\"alert alert-warning\"> Your Photo size is too large!! <button class=\"close\" data-dismiss=\"alert\">&times;</button> </p>";
    }else{

        //Upload image
        move_uploaded_file($photo_tmp_name,  $location . $uniqueName);

    }


    //Return value
    return[
        'file_name'     => $uniqueName,
        'mess'          => $mess,
    ];
}
