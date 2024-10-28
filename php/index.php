<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factorial Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }

        .container {
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input {
            padding: 10px;
            font-size: 16px;
            margin-top: 10px;
            margin-bottom: 10px;
            width: 80%;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }

        p {
            font-size: 18px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Factorial Calculator</h1>
        <input type="number" id="numberInput" placeholder="Enter a number" />
        <button onclick="calculateFactorial()">Calculate Factorial</button>
        <p id="result"></p>
    </div>

    <script>
        function calculateFactorial() {
            const number = document.getElementById("numberInput").value;

            fetch(`?number=${number}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById("result").innerText = `Factorial: ${data.factorial}`;
                })
                .catch(error => {
                    document.getElementById("result").innerText = `Error: ${error.message}`;
                });
        }
    </script>

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
</body>
</html>
