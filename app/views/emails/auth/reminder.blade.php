<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Password Reset</h2>

		<div>
To reset your password, complete this form: <br/>{{ URL::to('password_resets/reset', array($token))}}.
		</div>
	</body>
</html>