<?php

include_once("./config/db.php"); //상대경로로 가져와야한다.


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("연결 실패: " . $conn->connect_error);
} else { 

   $wno = isset($_GET['wno']) ? $_GET['wno'] : null;

   if($wno){
    //글 수정
    echo  $wno."글 수정해줘 폼은 같아";

   }else{
    //글쓰기
    echo  "글쓰기";

   }
   
}

// 연결 종료
$conn->close();
?>
<a href="./list.php">목록</a>