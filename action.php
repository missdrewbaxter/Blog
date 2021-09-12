<?php include('database.php');
//Collect Form Data
$title = ucwords(trim($_POST['title']));
$summary = trim($_POST['summary']);
$body=  trim($_POST['body']);

//Send data to database
$stmt = $mysqli->prepare("INSERT INTO blog (title,summary,body) VALUES (?,?,?)");
$stmt->bind_param("sss",$title,$summary,$body);
$stmt->execute();

//Save post ID
$id = $mysqli->insert_id;

//Close DB connection
$stmt->close();

?>