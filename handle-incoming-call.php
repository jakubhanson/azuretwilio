<?php
	header('Content-type: text/xml');
	echo '<?xml version="1.0" encoding="UTF-8"?>';

	# @start snippet
	$db = new PDO('sqlite:ivr.sqlite');

	$stmt = $db->prepare('INSERT INTO calls (caller) VALUES (?)');
	$stmt->execute(array($_REQUEST['From']));
	# @end snippet
?>
<Response>
	<Gather action="handle-user-input.php" numDigits="1">
		<Say>Thank you for calling BHTP Support Desk</Say>
		<Say>To talk directly to an agent press, 1.</Say>
		<Say>To leave a voice mail, press 2.</Say>
	</Gather>
	<!-- If customer doesn't input anything, prompt and try again. -->
	<Say>Sorry, I didn't get your response.</Say>
	<Redirect>handle-incoming-call.php</Redirect>
</Response>
