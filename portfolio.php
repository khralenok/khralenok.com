<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
    function e($value) {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }
    
    $curPage = e($_GET['case']);
    ?>
</head>
<body>
    <?php 
    echo file_get_contents("portfolio/{$curPage}.html");
    ?>
</body>
</html>