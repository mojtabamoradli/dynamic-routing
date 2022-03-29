	
    
<script src="./jquery-3.6.0.js"></script>
<link rel=stylesheet href="./style.css">

<?php
    if (isset($_SERVER['HTTPS']) 
        && ($_SERVER['HTTPS'] == 'on' 
        || $_SERVER['HTTPS'] == 1) 
        || isset($_SERVER['HTTP_X_FORWARDED_PROTO']) 
        && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
            $ssl = 'https';
        } else { $ssl = 'http'; }

    $app_url = ($ssl)
          . "://".$_SERVER['HTTP_HOST']
          . (dirname($_SERVER["SCRIPT_NAME"]) == DIRECTORY_SEPARATOR ? "" : "/")
          . trim(str_replace("\\", "/", dirname($_SERVER["SCRIPT_NAME"])), "/");
?>



<header class="header">
 		<a href="" class="nav" route="home" > Home</a> 
		<a href="" class="nav" route="page1"> page1</a> 
 		<a href="" class="nav" route="page2"> page2</a> 
 		<a href="" class="nav" route="page3">  page3</a> 
</header>


<script type="text/javascript">

	$(document).ready(function($) {
		var page_url = '<?php echo $app_url?>/';

		$(document).on('click', '.nav', function(event) {
			event.preventDefault();
            
			var route = $(this).attr('route');

			$.getJSON(page_url+'routes.php', {route: route}, function(data, textStatus, xhr) {

				$(document).find('.page_content').html(data.data);

				window.history.pushState("", "", page_url+data.url);
			});
		});

	});
	</script>