<?php include('database.php'); ?>

<h1>Blog Posts</h1>
<hr style="border: 1px dotted #7d5178;" width="75%">
<?php 
//Calculate pagination
if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$no_per_page = 4; //This can be changed to display more or less posts per page
$offset = ($pageno-1)*$no_per_page;
$total_pages = "SELECT COUNT(*) from blog";
$result = mysqli_query($mysqli,$total_pages);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_per_page);
//Pulling rows from the database, sorting them into descending order, and applying pagination
$sql=mysqli_query($mysqli, "Select * FROM blog ORDER BY id desc LIMIT $offset, $no_per_page");
//If there are posts to display, display them
if (mysqli_num_rows($sql) > 0) {
    $i=0;
    while($row = mysqli_fetch_array($sql)) {
        ?>
        <h2><?= $row["title"]; ?></h2>
        <p style="font-size:10px">ID number <?= $row["id"]; ?> on <?= $row["current_date"]; ?></p>
        <h3>Summary:</h3>
        <?= $row["summary"]; ?><br>
        <h3>Body:</h3>
        <?= $row["body"]; ?>
        <hr style="border: 1px dotted #7d5178;" width="75%">
        <?php
        $i++;
        }
        ?>
    <?php
    }
//If no posts to display, inform viewer
else{
    echo "No blog posts found";
    }
    ?>
<p>
You're on Page <?= $pageno; ?> out of <?php if ($total_pages>=1){echo $total_pages;} else { echo "1"; } ?>.  <a href="?pageno=1">First</a> ~
<a href="<?php if($pageno <= 1){ echo "#"; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a> ~
<a href="<?php if($pageno >= $total_pages){ echo "#"; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a> ~
<a href="<?php if ($pageno >= 1){ echo "?pageno=".$total_pages;} else { echo "#";}?>">Last</a>
</p>

<p><a href="submit.php">Submit a New Post</a></p>
