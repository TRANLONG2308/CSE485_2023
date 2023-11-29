<?php
    // Kết nối đến cơ sở dữ liệu
    include 'connect.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Lấy giá trị từ form
        $ma_theloai = $_POST["txtCatId"];
        $ten_theloai = $_POST["txtCatName"];

        try {
            // Chuẩn bị câu lệnh SQL
            $sql = "UPDATE theloai SET ten_tloai = :ten_tloai WHERE ma_tloai = :ma_tloai";

            // Chuẩn bị và thực thi câu lệnh
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':ten_tloai', $ten_theloai, PDO::PARAM_STR);
            $stmt->bindParam(':ma_tloai', $ma_theloai, PDO::PARAM_INT);
            $stmt->execute();

            // Chuyển hướng về trang danh sách thể loại sau khi cập nhật
            header("Location: category.php");
            exit();
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    // Đóng kết nối
    $conn = null;
    ?>