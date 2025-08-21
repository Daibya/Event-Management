<?php
    include('mymethods.php');

    $catid = $_GET['catid'];
    $response = deleteCategory($catid);

    echo "<script>
    alert('Deleted successfully!');
        window.location.href = 'manage_category.php';
    </script>";
exit;
?>