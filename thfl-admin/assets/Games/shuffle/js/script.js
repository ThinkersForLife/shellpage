var today=new Date();
	var h=0
	var m=0
	var s=0;
	var formObject = document.forms['theForm'];
	function startTime() {
		// add a zero in front of numbers<10
		m=0;
		s=s+1;
		document.getElementById('time').innerHTML="Time:" +s;
		t=setTimeout('startTime()',1000);
		if ( s > 1000 ) {
		//
			  //alert("msg2");
			  post_to_url('thanks.php', {'q': s , 'w': count });
			  //location="thanks.php";
			//alert(msg2);
			return true;
		}

	}

	function SetValue()
	{
		document.getElementById('Hidden1').value = s;
		alert(document.getElementById('Hidden1').value);
	}
	
function post_to_url(path, params, method) {
    method = method || "post"; // Set method to post by default, if not specified.

    // The rest of this code assumes you are not using a library.
    // It can be made less wordy if you use one.
    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", path);

    for(var key in params) {
        if(params.hasOwnProperty(key)) {
            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", key);
            hiddenField.setAttribute("value", params[key]);

            form.appendChild(hiddenField);
         }
    }

    document.body.appendChild(form);
    form.submit();
}
