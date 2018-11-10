<?php
prevent_d_access();
?>

<div class="row route-error-container marginless">
	<div class="col s12 center-align route-error-content">
		<div class="flow-text red-text">Oops!</div>
		<div class="flow-text grey-text">Page Not Found</div>
		<div class="flow-text white-text">
			Sorry, an error occured, Requested page not found
		</div>
		<div class="route-error-btn-container">
			<a href="<?= base_url ?>" class="waves-effect waves-light btn red"> Go To Home </a>
		</div>
	</div>
</div>
<style type="text/css">
	.route-error-container {
		background-color: #262626;
		height: 450px;

	}

	.route-error-content {
		margin-top: 10%;
	}

	.route-error-btn-container {
		margin-top: 20px;
		margin-bottom: 20px;

	}
</style>