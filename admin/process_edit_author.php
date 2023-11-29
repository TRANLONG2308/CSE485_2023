<?php
    // Kết nối đến cơ sở dữ liệu
    include 'connect.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Lấy giá trị từ form
        $ma_tgia = $_POST["txtCatId"];
        $ten_tgia = $_POST["txtCatName"];

        try {
            // Chuẩn bị câu lệnh SQL
            $sql = "UPDATE tacgia SET ten_tgia = :ten_tgia WHERE ma_tgia = :ma_tgia";

            // Chuẩn bị và thực thi câu lệnh
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':ten_tgia', $ten_tgia, PDO::PARAM_STR);
            $stmt->bindParam(':ma_tgia', $ma_tgia, PDO::PARAM_INT);
            $stmt->execute();

            // Chuyển hướng về trang danh sách thể loại sau khi cập nhật
            header("Location: author.php");
            exit();
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    // Đóng kết nối
    $conn = null;
    ?>