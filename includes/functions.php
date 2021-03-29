<?php

  //check if email exist in database
  function emailExists($conn, $email){
    $sql = "SELECT * FROM users WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt,"s",$email);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    return (mysqli_num_rows($res)>0) ? true : false;
  }

  //check if username exist in database

  function userNameExists($conn, $name){
    $sql = "SELECT * FROM users WHERE name = ?; ";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt,"s",$name);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    return (mysqli_num_rows($res)>0) ? true : false;
  }


  function validate($data){
    $data = trim($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>