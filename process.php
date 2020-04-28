<?php
    require_once('connection.php');
?>

<?php

    if(isset($_POST)){

        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = sha1($_POST['password']);
        $email = $_POST['email'];

        $sql = "INSERT INTO login_table (Name, Username, Password, Email) VALUES(?,?,?,?)";
        $stmtinsert = $db->prepare($sql);
        $result = $stmtinsert->execute([$name, $username, $password, $email]);
        if($result){
            echo 'Successfully saved.';
        }else{
            echo 'There were errors while saving the data.';
        }
    }else{
        echo 'No data';
    }

?>