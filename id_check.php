<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>아이디 중복 체크</title>
    <style>
        h3, p, #close-btn { text-align: center;}
        #close-btn button { background: #ccc; border: none; width: 70px; height: 40px;}
    </style>
</head>
<body>
<h3>아이디 중복 체크</h3>
<?php 
    $id = $_GET['id'];
    if ( !$id ) {
        echo "<p>아이디를 입력해 주세요.</p>";
    } else {
        $con = mysqli_connect('localhost', 'user1', '12345', 'sample');
        $sql = "SELECT * FROM tourmember WHERE id='$id'";
        $result = mysqli_query($con, $sql);

        $num_record = mysqli_num_rows($result);

        if ( $num_record ) {
            echo "<p>".$id."는 사용이 불가능한 아이디입니다.</p>";
            echo "<p>다른 아이디를 사용해 주세요.</p>";
        } else {
            echo "<p>".$id."는 사용이 가능한 아이디입니다.</p>";
        }
        mysqli_close($con);
    }
?>
<div id="close-btn">
    <button type="button" onclick="window.close()">닫기</button>
</div>
</body>
</html>