<?php
	include("includes/header.php");
?>

<?php
if (isset($_SESSION['success'])) {
    echo '<p style="color:green; text-align:center;">' . $_SESSION['success'] . '</p>';
    unset($_SESSION['success']);
}

if (!empty($_SESSION['error']['db'])) {
    echo '<p style="color:red; text-align:center;">' . $_SESSION['error']['db'] . '</p>';
    unset($_SESSION['error']['db']);
}
?>


<div id="content">
	<div class="post">
		<h2 class="title"><a href="#">Contact Us</a></h2>
			<p class="meta"></p>
			<div class="entry">
				
				<table border="0" width="100%">
					<tr valign="top">
						<td width="100%">
							<form class="contact" action="contact_process.php" method="post">
								
								Full Name :<br>
								<input type="text" name="fnm" class="txt">
								<?php
									if(isset($_SESSION['error']['fnm']))
									{
										echo '<font color="red">'.$_SESSION['error']['fnm'].'</font>';
									}
								?>
								<br><br>

								Mobile No :<br>
								<input type="text" name="mno" class="txt">
								<?php
									if(isset($_SESSION['error']['mno']))
									{
										echo '<font color="red">'.$_SESSION['error']['mno'].'</font>';
									}
								?>
								<br><br>

								E-Mail ID :<br>
								<input type="email" name="email" class="txt">
								<?php
									if(isset($_SESSION['error']['email']))
									{
										echo '<font color="red">'.$_SESSION['error']['email'].'</font>';
									}
								?>
								<br><br>

								Message :<br>
								<textarea class="txt" name="msg"></textarea>
								<?php
									if(isset($_SESSION['error']['msg']))
									{
										echo '<font color="red">'.$_SESSION['error']['msg'].'</font>';
									}
									unset($_SESSION['error']);
								?>
								<br><br>

								<input type="submit" class="btn" value="Submit">

							</form>
						</td>
					</tr>
				</table>

			</div>
	</div>
</div><!-- end #content -->

<?php
	include("includes/footer.php");
?>