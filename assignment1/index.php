<?php 

$server = "localhost";
$username = "root";
$password = "";
$database = "comments";

$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn) { 
    die("<script>alert('Connection Failed.')</script>");
}

?>
<?php 

if (isset($_POST['submit'])) { 
	$name = $_POST['name']; 
	$email = $_POST['email']; 
	$comment = $_POST['comment']; 

	$sql = "INSERT INTO comments (name, email, comment)
			VALUES ('$name', '$email', '$comment')";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		echo "<script>alert('Comment added.')</script>";
	} else {
		echo "<script>alert('There was an error. Please try again.')</script>";
	}
}

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Comment Section</title>  
</head>
<body>
    <div class="content">
        <h2>Page Heading</h2>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam, ducimus obcaecati earum, placeat accusantium, commodi dignissimos deleniti fugiat inventore illum nihil. Ea, illo commodi ipsa deserunt magnam reprehenderit possimus ad obcaecati, quidem maiores aliquam impedit voluptates animi dolore nostrum praesentium iusto. Adipisci doloribus hic alias, eius officiis voluptatum beatae distinctio!</p>
    </div>
	
    <div class="box">
		<div class="prev-comments">
			<?php 
			
			$sql = "SELECT * FROM comments";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {

			?>
			<div class="single-item">
				<h4><?php echo $row['name']; ?></h4>
				<p><?php echo $row['comment']; ?></p>
			</div>
			<?php

				}
			}
			
			?>
		</div>

        <h3>Add Comment</h3>
        <form action="" method="POST" class="form">
            <div class="form-element">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" placeholder="Enter Your Name" required>
            </div>
            <div class="form-element">
                <label for="email">E-mail id:</label>
                <input type="email" name="email" id="email" placeholder="Enter email id" required> 
            </div>
            <div class="form-element textarea">
                <label for="comment">Comment</label>
                <input type="textarea" name="comment" id="comment" placeholder="Enter Comment" required>
            </div>
			<div class="form-element">
				<button type="submit" name="submit" class="btn">Post Comment</button>
			</div>

        </form>


    </div>
    
</body>
</html>











