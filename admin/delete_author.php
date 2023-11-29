<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $ma_tgia = $_GET['id'];

    try {
        // Chuẩn bị câu lệnh SQL xóa
        $sql_delete = "DELETE FROM tacgia WHERE ma_tgia = :ma_tgia";
        $stmt_delete = $conn->prepare($sql_delete);
        $stmt_delete->bindParam(':ma_tgia', $ma_tgia, PDO::PARAM_INT);
        $stmt_delete->execute();

        // Chuyển hướng về trang danh sách thể loại sau khi xóa
        header("Location: author.php");
        exit();
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
    }
}

// Đóng kết nối
$conn = null;
?>