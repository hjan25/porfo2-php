<?php

    $id = $_POST['id'];
    $pass = $_POST['pass'];

    $con = mysqli_connect('localhost','user1','12345','sample');
    $sql = "SELECT * FROM tourmember WHERE id = '$id'";
    $result = mysqli_query($con, $sql);

    $num_match = mysqli_num_rows($result);

    if ( !$num_match ) {
        echo ("
            <script>
                alert('등록되지 않은 아이디입니다.');
                history.go(-1);
            </script>
        ");
        exit;
    } else {
        $row = mysqli_fetch_array($result);
        $db_pass = $row['pass'];
        mysqli_close($con);

        if ( $pass !== $db_pass ) {
            echo ("
                <script>
                    alert('비밀번호가 틀립니다!');
                    history.go(-1);
                </script>
            ");
            exit;
        } else {
            session_start();
            $_SESSION['userid'] = $row['id'];
            $_SESSION['username'] = $row['name'];
            $_SESSION['userphone'] = $row['phone'];
            $_SESSION['useremail'] = $row['email'];
            echo ("
                <script>
                    location.href = 'index.php';
                </script>
            ");
        }
    }
?>