<?php  //ไฟล์นี้เป็นไฟล์เชื่อมต่อกับฐานข้อมูล MySQL 

    $servername = "10.1.3.40";  //เป็นชื่อเครื่อง Server ของมหาลัย 
    $username = "63102010262"; //username db in SWU
    $password = "63102010262";     //password db in SWU
    $dbname = "63102010262_project";   //dbname in SWU

    // เป็นการสร้างการเชื่อมต่อ
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // เป็นการเช็คว่ามีการเชื่อมต่อแล้ว
    if (!$conn) {  //เครื่องหมาย ! แปลว่าถ้าเกิดไม่มีการเชื่อมต่อจะให้เรียกใช้คำสั่ง die แล้วขึ้นข้อความว่า Connection failed
        die("Connection failed" . mysqli_connect_error());
    } 
?>