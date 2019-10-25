<style type="text/css">

.stuff-wrp {
	display: flex;
}
	
.stuff-item {
	width: 33.3333%;
	display: flex;
	padding: 5px;
}

.stuff-img {
	border: 1px solid #DDD;
}

.stuff-info {
	margin-left: 10px;
}

.stuff-name {
	color:#383838;
	font-size: 16px;
	font-weight: bold
}

.stuff-post {
	font-size: 12px;
	color: #888;
}

.stuff-phone, .stuff-email {
	color:#383838;
	font-size: 12px;
	margin-top: 10px;
}

.stuff-phone span, .stuff-email span {
	font-size: 13px;
	color: #888;
}

</style>
<!-- breadcrumbs -->
<div class="container">
    <ol class="breadcrumb">
		<li><a href="/">Главная</a></li>	
		<li class="active">Сотрудники</li>
	</ol>
</div>

<h1 class="text-center">Сотрудники</h1>

<!-- stuff -->
<div class="container">
	<div class="row">
		
		<? include 'stuff.php'; ?>

	</div>
</div>


	


