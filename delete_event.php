<?php
    include('mymethods.php');

    $eventid = $_GET['eventid'];
    $response = deleteEvent($eventid);

    echo "<script>
    alert('Deleted successfully!');
        window.location.href = 'manage_event.php';
    </script>";
exit;
?>