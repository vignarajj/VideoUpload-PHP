<?php
include 'Connections/DatabaseConnection.php';
$mysqli = mysqli_connect("localhost", "root", "", "video_uploader");
if(!$mysqli){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<head>
<title>Web Application - View Video</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
  <link href="http://vjs.zencdn.net/5.8.8/video-js.css" rel="stylesheet">
  <script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
<link rel="stylesheet" href="css/style.css?version=2" type="text/css"/>
</head>
<body>
<h1 class="showText">Uploaded Videos</h1>
<ul background="#303030">
<?php
	$sql="SELECT * FROM table_videos";
	$result_set=mysqli_query($mysqli, $sql);
	while($row=mysqli_fetch_array($result_set))
	{
	$pat ="videos/"; 
	 $pat1 ="http://localhost/uploader/videos/";
	 $path = $row['video_name'].".".$row['file_type'];
	 $file_type = $row['file_type'];
	   $vid = $pat1.$path
		?>
<li>
<?php echo"<video width='320' height='240' class='video-js' controls>
<source src='".$vid."'>
</video> ";
?>
<?php
$file_size = $row['file_size'];
$base = log($file_size, 1024);
$suffixes = array('', 'KB', 'MB', 'GB', 'TB');
$final_size = round(pow(1024, $base - floor($base)), 2) .' '. $suffixes[floor($base)];
?>
<div class="innerContainer">
<a class="heading"><b>File Name : </b> <?php echo $row['video_name'].'.'.$row['file_type'] ?></a><br>
<a class="heading"><b>File Size : </b><?php echo $final_size?></a><br>
<a class="heading"><b>Uploaded By : </b><?php echo $row['uploaded_by'] ?></a>
</div>
</li>
        <?php
	}
	?>
</ul>
</body>
</html>
