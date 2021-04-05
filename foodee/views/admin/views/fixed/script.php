<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<!-- jQuery -->

<script src="assets/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="assets/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="assets/js/bootstrap.min.js"></script>
	<!-- Bootstrap DateTimePicker -->
	<script src="assets/js/moment.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
	<!-- Waypoints -->
	<script src="assets/js/jquery.waypoints.min.js"></script>
	<!-- Stellar Parallax -->
	<script src="assets/js/jquery.stellar.min.js"></script>

	<!-- Flexslider -->
	<script src="assets/js/jquery.flexslider-min.js"></script>
	<script>
		$(function () {
	       $('#date').datetimepicker();
	   });
	</script>
	<!-- Main JS -->
	<script src="assets/js/main.js"></script>
	<script src="assets/js/mojJs.js"></script>
	<?php
		if(isset($_GET['page'])):
	?>
	<script src="assets/js/inputTypeNumber.js"></script>
	<?php
		endif;
	?>
	</body>
</html>