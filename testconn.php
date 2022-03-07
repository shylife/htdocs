<?php
    $conn = oci_connect('c##helloworld', '1234');
    if (!$conn) {
        exit;
    }
    else {
        echo "<h1>Oracle DB Connecting Complete!</h1><br><br>";
    }
    $stid = oci_parse($conn, 'SELECT * FROM TEST_TB');
    oci_execute($stid);
    $rowCount = 0;
    while (($row = oci_fetch_array($stid)) != false){
        echo $row['NAME'], " ", $row['JOB'], " ", $row['MANY'], " ", $row['END'], "<br>";
        $rowCount++;
    }
    echo "<br>", $rowCount, "건이 조회되었습니다.";
    oci_free_statement($stid);
    oci_close($conn);
?>