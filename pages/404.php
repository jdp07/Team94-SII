<!DOCTYPE html>

<?php
	require '../inc/header.inc';
	require '../inc/setPDO.inc';
?>

<body>
	<div class = "container-fluid">
		<?php
			require '../inc/nav.inc';

		?>
		
		<div class = "text-center error-info">
			<h1>Oops!</h1>
			<h4>Looks like you've taken a wrong turn. <br/>Use our navigation bar to navigate the website!</h4>
		</div>

		<?php
			require '../inc/footer.inc';
		?>
	</div>
</body>