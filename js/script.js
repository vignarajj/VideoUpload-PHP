function validateForm(){
	var video_name = form["v_name"].value;
	if(video_name=="" || video_name==null){
		alert("Enter the video name");
        return false;
	}
}

var form = document.getElementById("validate");
form.onsubmit = validateForm;
//