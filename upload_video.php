<?php
include 'Connections/DatabaseConnection.php';
$link = mysqli_connect("localhost", "root", "", "video_uploader");
$conn = new mysqli("localhost", "root", "", "video_uploader");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$allowedExts = array("mp4", "m4v", "mpg", "avi","webm");
$extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

if ((($_FILES["file"]["type"] == "video/mp4")
|| ($_FILES["file"]["type"] == "video/m4v")
|| ($_FILES["file"]["type"] == "video/ogg")
|| ($_FILES["file"]["type"] == "video/avi")
|| ($_FILES["file"]["type"] == "video/webm"))
&& in_array($extension, $allowedExts))

  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
	$name= $_FILES['file']['name'];
	$file_size = $_FILES['file']['size'];
	$tmp_name= $_FILES['file']['tmp_name'];
	$submitbutton= $_POST['submit'];
	$position= strpos($name, "."); 
	$fileextension= substr($name, $position + 1);
	$fileextension= strtolower($fileextension);
	$video_name = $_POST['v_name'];
	$video_description = $_POST['v_desc'];
	$upload_by = $_POST['upload_by'];
	$target = "videos/";
	$target.$video_name.$fileextension;
    if (file_exists($_FILES["file"]["tmp_name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. "."<br><a href='index.html'>Go Back</a>";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "videos/" . $video_name.".".$fileextension);
	  $query = "INSERT INTO table_videos(file_name, video_name, video_desc, uploaded_by, file_size, file_type) VALUES('$name','$video_name','$video_description','$upload_by','$file_size','$fileextension')";
	  $result = mysqli_query($conn, $query);
		if ( !$result ) {
		trigger_error('query failed', E_USER_ERROR);
		}
      echo "Stored in: " . "videos/" . $_FILES["file"]["name"]."<br><a href='index.html'>Go Back</a>";
      }
    }
  }
else
  {
  echo "Invalid file";
  }
?>