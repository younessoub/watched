<?php

//check if email exist in database
function emailExists($email,$conn){
    $sql = "SELECT * FROM users WHERE email = '$email' ";

    $res = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($res)>0){
      return true;
    }
    return false;
  }

  //check if username exist in database

  function userNameExists($conn, $name){
    $sql = "SELECT * FROM users WHERE name = '$name' ";
    $res = mysqli_query($conn, $sql);
    /*if(mysqli_num_rows($res) > 0){
      return true;
    }
    return false;*/
    

    return (mysqli_num_rows($res)>0) ? true : false;
  }


  function validate($data){
    $data = trim($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  ?>