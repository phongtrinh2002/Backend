<?php
function ketNoiDB(){
    return new mysqli('localhost','root','','a2');
}
function addSP($ma,$ten,$dg,$sl){
    $con=ketNoiDB();
    $i=$con->query('INSERT INTO SP VALUES ("'.$ma.'","'.$ten.'","'.$dg.'","'.$sl.'")');
    return $i;
}
function displaySP(){
    $con=ketNoiDB();
    $result=$con->query('SELECT * FROM SP');
    return $result;
}
function updateSP($ma,$ten,$dg,$sl){
    $con=ketNoiDB();
    $i=$con->query('UPDATE SP SET TenSP="'.$ten.'", DonGia="'.$dg.'", SoLuong="'.$sl.'" WHERE MaSP="'.$ma.'"');
    return $i;
}
function deleteSP($ma){
    $con=ketNoiDB();
    $i=$con->query('DELETE FROM SP WHERE MaSP="'.$ma.'"');
    return $i;
}