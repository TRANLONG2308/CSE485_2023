<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['txtCatName'])) {
    $ten_theloai = $_POST['txtCatName'];

    try {
        // Chuẩn bị câu lệnh SQL thêm mới
        $sql_insert = "INSERT INTO theloai (ten_tloai) VALUES (:ten_tloai)";
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bindParam(':ten_tloai', $ten_theloai, PDO::PARAM_STR);
        $stmt_insert->execute();

        // Chuyển hướng về trang danh sách thể loại sau khi thêm mới
        header("Location: category.php");
        exit();
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
    }
}

// Đóng kết nối
$conn = null;
?>
