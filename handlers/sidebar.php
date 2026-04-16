<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<script src="//api.bitrix24.com/api/v1/"></script>
</head>
<body>
	<div class="application">
		<div>Sidebar placement Application</div>
		<div>Ваше приложение в сайдбаре</div>
		<span>Здравствуйте Сергей</span>
	</div>
</body>
<script>
	BX24.init(function(){
		console.log('Sidebar placement Application', BX24.placement.info());
		BX24.placement.getInterface(data => console.log('Sidebar placement interface',data));
	});
</script>
</html>