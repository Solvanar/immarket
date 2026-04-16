<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<script src="//api.bitrix24.com/api/v1/"></script>
</head>
<body>
	<div class="application">
		<div>ContextMenu placement Application</div>
		<div>место для вашей рекламы</div>
	</div>
</body>
<script>
	BX24.init(function(){
		console.log('ContextMenu placement Application', BX24.placement.info());
		BX24.placement.getInterface(data => console.log('ContextMenu placement interface',data));
	});
</script>
</html>