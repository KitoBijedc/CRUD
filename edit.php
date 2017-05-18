<?php
include_once("config.php");

if(isset($_POST['update']))
{

    $id = mysqli_real_escape_string($mysqli, $_POST['id']);

    $title = mysqli_real_escape_string($mysqli, $_POST['title']);
    $paraText = mysqli_real_escape_string($mysqli, $_POST['Paragraph']);
    $image = mysqli_real_escape_string($mysqli, $_POST['image']);

    if(empty($title) || empty($paraText) || empty($image)) {

        if(empty($title)) {
            echo "<font color='red'>Title field is empty.</font><br/>";
        }

        if(empty($paraText)) {
            echo "<font color='red'>Paragraph field is empty.</font><br/>";
        }

        if(empty($image)) {
            echo "<font color='red'>Image field is empty.</font><br/>";
        }
    } else {
      $query = "UPDATE newsfeed SET title='$title',paraText='$paraText',image='$image' WHERE id=$id";
        $result = mysqli_query($mysqli, $query);
       header("Location: index.php");
//  echo "$query";
    }
}
?>
<?php
$id = $_GET['id'];


$result = mysqli_query($mysqli, "SELECT * FROM newsfeed WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
    $title = $res['title'];
    $paraText = $res['paraText'];
    $image = $res['image'];
}
?>
<html>
<head>
    <title>Edit Data</title>
</head>

<body>
<a href="index.php">Home</a>
<br/><br/>

<form name="form1" method="post" action="edit.php">
    <table border="0">
        <tr>
            <td>Name</td>
            <td><input type="text" name="title" value="<?php echo $title;?>"></td>
        </tr>
        <tr>
            <td>Age</td>
            <td><input type="text" name="Paragraph" value="<?php echo $paraText;?>"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="image" value="<?php echo $image;?>"></td>
        </tr>
        <tr>
            <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
            <td><input type="submit" name="update" value="Update"></td>
        </tr>
    </table>
</form>
</body>
</html>
