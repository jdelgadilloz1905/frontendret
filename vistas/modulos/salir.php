<?php

$url = Ruta::ctrRuta();
session_destroy();


echo '<script>

	localStorage.clear();
	window.location = "'.$url.'";

</script>';