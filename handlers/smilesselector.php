<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<script src="//api.bitrix24.com/api/v1/"></script>
</head>
<body>
	<div class="application">
		<div>SmilesSelector placement Application</div>
		<div">место для вашей рекламы</div>
	</div>
</body>
<script>
	BX24.init(function(){
		console.log('SmilesSelector placement Application', BX24.placement.info());
		BX24.placement.getInterface(data => console.log('SmilesSelector placement interface',data));
	});
</script>
</html>