<?php

include_once("./config/db.php"); // Include the config file using a relative path

$conn = new mysqli($servername, $username, $password, $dbname); // Connect to the database

if ($conn->connect_error) {
    die("연결 실패: " . $conn->connect_error);
} else {
    $sql = "SELECT * FROM delivery_container_inquiries"; // SQL query
    $result = $conn->query($sql); // Execute the query 2단Array
 
    $adm = isset($_GET['adm']) ? $_GET['adm'] : '아무나';

    if ($result->num_rows > 0) {
        ?>
        <section>
        <?php
        echo "<h2>전체 글 : ".$result->num_rows."개</h2>";  // Display the total number of entries
        ?>
        <ul>
        <?php
        // Loop through the result and display each row in an <li> element
        while($row = $result->fetch_assoc()) {
            echo "<li>";

            if( $adm == '방보영'){
                echo "<input type='checkbox' name='ids[]' value=".$row["inquiry_id"].">";
            }

            echo "<a href='./view.php?wno=".$row["inquiry_id"]."'>";
            echo "가게 이름: " . $row["store_name"] . "</a>";
            echo "주소: " . $row["store_address"];
            echo "소유자 이름: " . $row["owner_name"];
            echo "연락처: " . $row["contact_number"];
            echo "배달 앱: " . $row["delivery_apps"];
            echo "</li>";
        }
        ?>
        </ul>
        <div>
            <?php
            if( $adm == '방보영'){
             ?>
            <button id="deletbtn" class='btn'>글삭제</button>
            <?php  } ?>
            <a href="./write.php">글쓰기</a>
        </div>
        </section>
        <?php
    } else {
        echo "데이터가 없습니다.";  // No data found message
    }
}

// Close the connection
$conn->close();
?>
