<html>

<head>
	<script type="text/javascript" src="js/qrcode.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>

<body>
	<div id="form">
		<h1>ZGZG QR Generator</h1>
		<lable>url</lable>
		<input id="url" width="100%" value="Love, Smile" />
		<lable>Size</lable>
		<input id="size" value="70%" />
		<lable>Color</lable>
		<input id="color" value="black" />
		<button id="button">generate code</button>
	</div>
	<div></div>
	<div id="qrcode" style="
    display: table;
    background: white;
	margin:auto;
	margin-top:20vh;
">
	</div>
	<div id="label" style="text-align:center;font-size:5vh;height:5em;overflow-wrap:break-word"></div>
	<script type="text/javascript">
		$("#url").focus(() => {
			$("#url").val("");
		});
		$("#size").focus(() => {
			$("#size").val("");
		});
		$("#color").focus(() => {
			$("#url").val("");
		});
		$("#button").click(function() {
			$("#qrcode").empty();
			var size = $("#size").val()
			if (size.endsWith("%")) {
				percent = size.substring(0, size.length - 1);
				size = percent * Math.min(window.innerHeight, window.innerWidth) / 100;
				console.log(size);
			}
			var qrcode = new QRCode(document.getElementById("qrcode"), {
				text: $("#url").val(),
				width: size,
				height: size,
				colorDark: $("#color").val(),
				colorLight: "#ffffff",
				correctLevel: QRCode.CorrectLevel.H
			});
			$("#form").hide();
			$('#label').text($("#url").val());
		});
	</script>
</body>

</html>