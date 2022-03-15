function showHide() {
	const targetDiv = document.getElementById("citation");
	//var citationHtml = document.getElementById("citation");
	console.log(citationHtml.innerHTML);
	if (targetDiv.style.display !== "none") {
		targetDiv.style.display = "none";
	  } else {
		targetDiv.style.display = "block";
	  }
}
