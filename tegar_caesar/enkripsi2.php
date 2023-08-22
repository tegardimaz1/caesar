<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caesar Cipher Result</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('background.jpg');
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            max-width: 600px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            padding: 2rem;
        }

        a {
            color: white;
            text-decoration: none;
            background-color: black;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
            margin: 20px auto ;
            text-align: center;
        }


        h2 {
            text-align: center;
        }

        p {
            font-size: 1.2rem;
            margin-top: 1rem;
            white-space: pre-wrap;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        function encrypt($text, $shift) {
            $encryptedText = "";

            for ($i = 0; $i < strlen($text); $i++) {
                $char = $text[$i];

                if ($char >= 'A' && $char <= 'Z') {
                    $encryptedChar = chr(((ord($char) - 65 + $shift) % 26) + 65);
                } elseif ($char >= 'a' && $char <= 'z') {
                    $encryptedChar = chr(((ord($char) - 97 + $shift) % 26) + 97);
                } else {
                    $encryptedChar = $char; 
                }

                $encryptedText .= $encryptedChar;
            }

            return $encryptedText;
        }

        function decrypt($encryptedText, $shift) {
            return encrypt($encryptedText, 26 - $shift); 
        }

        if (isset($_POST['submit'])) {
            $text = $_POST['text'];
            $shift = (int)$_POST['shift'];
            $action = $_POST['action'];

            if ($action === 'encrypt') {
                $result = encrypt($text, $shift);
                $actionLabel = 'Hasil Enkripsi';
            } elseif ($action === 'decrypt') {
                $result = decrypt($text, $shift);
                $actionLabel = 'Hasil Dekripsi';
            }
        }
        ?>

        <h2><?php echo $actionLabel; ?> :</h2>
        <p><?php echo isset($result) ? $result : ''; ?></p>
        <a href='javascript:history.go(-1)'>Kembali</a>
    </div>
</body>
</html>