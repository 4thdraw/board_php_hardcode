<?php
            include_once("./config/db.php"); 
            $conn = new mysqli($servername, $username, $password, $dbname);
            $wno = $_GET['wno'];

            if ($conn->connect_error) {
                die("연결 실패: " . $conn->connect_error);
            } else {
            $sql = "SELECT * FROM delivery_container_inquiries where inquiry_id = ".$wno; 
            //특정 하나의 글을 검색하기
            $result = $conn->query($sql); // sql 실행  Array 1단
            $row = $result->fetch_assoc(); // 필드분쇄  숫자가 아닌 필드명을 키로 하는 Array
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

   // Display the record data
   echo "Store Name: " . $row['store_name'] . "<br>";
   echo "Store Address: " . $row['store_address'] . "<br>";
   echo "Owner Name: " . $row['owner_name'] . "<br>";
   echo "Contact Number: " . $row['contact_number'] . "<br>";
   echo "Delivery Apps: " . $row['delivery_apps'] . "<br>";
}
// 연결 종료
$conn->close();
?>  
<div>
    <a href="./list.php">목록</a>
    <a href="./write.php?wno=<?php echo  $wno; ?>">글수정</a>
</div>
</body>
</html>

