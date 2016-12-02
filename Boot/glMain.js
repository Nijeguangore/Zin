var glFunctionAccess;

function start(){
	alert("here");
	var guiWin = document.getElementById("blankspace");
	glFunctionAccess = null;
	glFunctionAccess = guiWin.getContext("webgl") || guiWin.getContext("experimental-webgl");
	if(!glFunctionAccess){
		alert("No webGL access");
		return;
	}
	glFunctionAccess.clearColor(0.0,0.67,0.07,1.0);
	glFunctionAccess.enable(glFunctionAccess.DEPTH_TEST);
	glFunctionAccess.depthFunc(glFunctionAccess.LEQUAL);
	glFunctionAccess.clear(glFunctionAccess.COLOR_BUFFER_BIT | glFunctionAccess.DEPTH_BUFFER_BIT);
}
