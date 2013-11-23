
<?php
include ("general.php");
echo "<br>";
$sk_id = $_GET['sk_id'];


$sk_del = new sk();
$sk_del->sk_del($sk_id);
?>
</body>
</html>
