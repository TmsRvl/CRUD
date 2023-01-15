<!DOCTYPE html>
<html>
<head>
    <title>CRUD</title>
    <link rel="stylesheet" href="style.css">
    <?php 
    include 'controller.php'; 
    ?>
</head>
<body>
    <form method="post" action="detail_page.php">
        <input type="submit" id="add" value="Aggiungi" name='name'>
    </form>
    <table>
        <?php printTable(); ?>
    </table>
</body>
</html>

