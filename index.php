<?php

$conn = new mysqli("localhost", "root", "", "college_db");

if ($conn->connect_error) {
    die("Деректер қорына қосылу қатесі: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");

$result = $conn->query("SELECT * FROM products");

if (!$result) {
    die("Қате: " . $conn->error);
}

?>

<!DOCTYPE html>
<html lang="kk">
<head>
    <meta charset="UTF-8">
    <title>Тауарлар</title>

    <style>
        body {
            margin: 0;
            min-height: 100vh;

            /* Артқы фон */
            background: url("https://static.tildacdn.com/tild3964-3637-4635-a537-393830623432/unnamed.jpg") center/cover fixed;

            font-family: Arial, sans-serif;
        }

        h2 {
            text-align: center;
            color: #1e3a8a;
            margin-top: 40px;
        }

        table {
            margin: 30px auto;
            border-collapse: collapse;
            background-color: white;

            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
        }

        th {
            background-color: #2563eb;
            color: white;
            padding: 12px;
        }

        td {
            padding: 10px;
            text-align: center;
        }

       
    </style>
</head>

<body>
<background></background>
<h2>Тауарлар тізімі</h2>

<table border="1" cellpadding="8" cellspacing="0">

    <tr>
        <th>ID</th>
        <th>Атауы</th>
        <th>Бағасы</th>
        <th>Саны</th>
        <th>Сипаттамасы</th>
        <th>sureti</th>
    </tr>

    <?php while ($row = $result->fetch_assoc()): ?>

    <tr>

        <td>
            <?= (int)$row['id'] ?>
        </td>

        <td>
            <?= htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') ?>
        </td>

        <td>
            <?= htmlspecialchars($row['price'], ENT_QUOTES, 'UTF-8') ?> тг
        </td>

        <td>
            <?= (int)$row['quantity'] ?>
        </td>

        <td>
            <?= htmlspecialchars($row['description'], ENT_QUOTES, 'UTF-8') ?>
        </td>

        <td>
           
        </td>

    </tr>

    <?php endwhile; ?>

</table>

</body>
</html>

<?php
$conn->close();
?>