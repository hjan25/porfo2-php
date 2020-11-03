<?php
    $id = $_POST['id'];
    $pass = $_POST['pass'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $addr = $_POST['addr'];
    $regist_day = date('Y-m-d');

    $con = mysqli_connect('localhost', 'user1', '12345', 'sample');
    $sql = "INSERT INTO tourmember (id, pass, name, email, addr, phone, regist_day)";
    $sql .= "VALUES('$id', '$pass', '$name', '$email', '$addr', '$phone', '$regist_day')";

    mysqli_query($con, $sql);
    mysqli_close($con);

    echo "
        <script>
            location.href = 'index.php';
        </script>
    ";
?>