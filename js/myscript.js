// JavaScript Document
function validateForm(){
	var video_name = document.myform.v_name.value;
	var video_desc =  document.myform.v_desc.value;
	var upload_by =  document.myform.upload_by.value;
	var file_name = document.myform.file.value;
	var file_path = document.getElementById('file');
	if(video_name=="" || video_name==null){
		document.getElementById('error').innerHTML= "Enter the Video name";
        return false;
	}else if(video_desc==""|| video_desc==null){
		document.getElementById('error').innerHTML="Enter the video description";
        return false;
	}else if(upload_by==""|| upload_by==null){
		document.getElementById('error').innerHTML="Enter the upload by details";
        return false;
	}else if(file_name==""|| file_name==null){
		document.getElementById('error').innerHTML ="Select the file to upload";
        return false;
	}else if(!isVideo(file_name)){
		document.getElementById('error').innerHTML ="Invalid video format";
        return false;
	}else if(file_path.files[0].size>20971520){
		document.getElementById('error').innerHTML = "Video must be 20 MB only";
		return false;
	}
}
function getExtension(filename) {
    var parts = filename.split('.');
    return parts[parts.length - 1];
}

function isVideo(filename) {
    var ext = getExtension(filename);
    switch (ext.toLowerCase()) {
    case 'm4v':
    case 'avi':
    case 'ogg':
    case 'mp4':
	case 'webm':
        // etc
        return true;
    }
    return false;
}

//