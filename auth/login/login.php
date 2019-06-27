<?php include '../../sql_conn.php'; ?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
	<div class="input-grp">
		<label>Email</label>
		<input type="text" name="email">
	</div>
	<div class="input-grp">
		<label>Password</label>
		<input type="password" name="password">
	</div>
	<input type="submit" value="Login">
</form>

<?php
// Set session
if (isset($_POST['email']) && isset($_POST['password'])) {
	echo "string";
	$email = $_POST['email'];
	$password = $_POST['password'];

	$query = "SELECT * FROM users WHERE email='$email' AND password='$password';";

	$result = $conn->query($query);
	print_r($result);

	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$_SESSION['user_id'] = $row['user_id'];
			$_SESSION['first_name'] = $row['first_name'];
			$_SESSION['last_name'] = $row['last_name'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['phone'] = $row['phone'];
			$_SESSION['password'] = $row['password'];
		}
		header("http://internationalamanilodge.test/");
	} else {
		echo '<div class="warn"><p>Wrong email or password</p></div>';
	}
	
} else {
	echo $_POST['email'];
	echo $_POST['password'];
}
?>