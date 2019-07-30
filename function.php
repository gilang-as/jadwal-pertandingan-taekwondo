<?php
function Insert($table, $data){
global $connect;
//print_r($data);
$fields = array_keys( $data );  
$values = array_map( array($connect, 'real_escape_string'), array_values( $data ) );
//echo "INSERT INTO $table(".implode(",",$fields).") VALUES ('".implode("','", $values )."');";
//exit;  
mysqli_query($connect, "INSERT INTO $table(".implode(",",$fields).") VALUES ('".implode("','", $values )."');") or die( mysqli_error($connect) );
}
function Update($table_name, $form_data, $where_clause=''){   
    global $connect;
    // check for optional where clause
    $whereSQL = '';
    if(!empty($where_clause))
    {
        // check to see if the 'where' keyword exists
        if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
        {
            // not found, add key word
            $whereSQL = " WHERE ".$where_clause;
        } else
        {
            $whereSQL = " ".trim($where_clause);
        }
    }
    // start the actual SQL statement
    $sql = "UPDATE ".$table_name." SET ";

    // loop and build the column /
    $sets = array();
    foreach($form_data as $column => $value)
    {
         $sets[] = "`".$column."` = '".$value."'";
    }
    $sql .= implode(', ', $sets);

    // append the where statement
    $sql .= $whereSQL;
         
    // run and return the query result
    return mysqli_query($connect,$sql);
}
function Delete($table_name, $where_clause=''){   
    global $connect;
    // check for optional where clause
    $whereSQL = '';
    if(!empty($where_clause))
    {
        // check to see if the 'where' keyword exists
        if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
        {
            // not found, add keyword
            $whereSQL = " WHERE ".$where_clause;
        } else
        {
            $whereSQL = " ".trim($where_clause);
        }
    }
    // build the query
    $sql = "DELETE FROM ".$table_name.$whereSQL;
     
    // run and return the query result resource
    return mysqli_query($connect,$sql);
}  
function total_peserta($jenjang,$turnamen){
    global $connect;
    $quotes_qry="SELECT COUNT(id) as total FROM tbl_ikutserta WHERE id_turnamen=$turnamen AND jenjang=$jenjang";
    $data = mysqli_fetch_array(mysqli_query($connect,$quotes_qry)); 
    return $data["total"];
}
function Upload(){
    $ekstensi_diperbolehkan	= array('png','jpg');
	$nama = $_FILES['file']['name'];
	$x = explode('.', $nama);
	$ekstensi = strtolower(end($x));
	$ukuran	= $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];	
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 1044070){			
            move_uploaded_file($file_tmp, 'upload/'.$nama);
            $query = mysql_query("INSERT INTO upload VALUES(NULL, '$nama')");
            if($query){
                echo 'FILE BERHASIL DI UPLOAD';
            }else{
                echo 'GAGAL MENGUPLOAD GAMBAR';
            }
        }else{
            echo 'UKURAN FILE TERLALU BESAR';
        }
    }else{
        echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
    }
}
?>