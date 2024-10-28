<?php
if (isset($_GET['number'])) {
    $number = intval($_GET['number']);

    // Factorial function
    function factorial($n) {
        if ($n < 0) return "undefined";
        return $n === 0 ? 1 : $n * factorial($n - 1);
    }

    $result = factorial($number);

    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode(['factorial' => $result]);
    exit();
}
?>
