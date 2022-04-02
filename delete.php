<?php
$conn=mysqli_connect('localhost','root','','curd');
if(!$conn){
    echo "not connected <hr>";

}
$sql = "DELETE FROM users WHERE id='" . $_GET["id"] . "'";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
header("Location: http://localhost/curd/index.php");
?>