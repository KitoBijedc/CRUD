<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php

include_once("config.php");

if(isset($_POST['Submit'])) {
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
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else {

		$result = mysqli_query($mysqli, "INSERT INTO newsfeed(title,paraText,image) VALUES('$title','$paraText','$image')");

		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
