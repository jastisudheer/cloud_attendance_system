<!DOCTYPE html>
<html>

<head>
    <title>EATTENDO | Home </title>

    <!-- Web Fonts -->
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin">

    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- CSS Header and Footer -->
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/footer.css">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="assets/plugins/line-icons-pro/styles.css">
    <link rel="stylesheet" href="assets/plugins/line-icons/line-icons.css">
    <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.min.css">

    <!-- CSS Customization -->
    <link rel="stylesheet" href="assets/css/custom.css">

</head>
    <body>
	<div class="collapse navbar-collapse navbar-responsive-collapse">
                        <div class="res-container">
                            <ul class="nav navbar-nav">

                                <!-- Collect the nav links, forms, and other content for toggling -->


                                <!-- Home  -->
                                <li class="mega-menu-fullwidth">
                                    <a href="faculty.html">
				BACK
				</a>

                                </li>
                                <!-- End Home-->



                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
		<?php

	session_start();

	if(isset($_SESSION['secret_code'])) {
		$current_time = time();
		$expiry_time = $_SESSION['expiry_time'];
		if($current_time > $expiry_time) {
			unset($_SESSION['secret_code']);
			unset($_SESSION['expiry_time']);
		}
		else {
			$secret_code = $_SESSION['secret_code'];
			echo $secret_code;
			exit;
		}
	}

	$secret_code = generateCode();
	$_SESSION['secret_code'] = $secret_code;
	$_SESSION['expiry_time'] = time() + 30;

	echo $secret_code;

	function generateCode() {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$random_string = '';
		for ($i = 0; $i < 6; $i++) {
			$index = rand(0, strlen($characters) - 1);
			$random_string .= $characters[$index];
		}
		$text = "Your Code Is Genrated:";
		$text1 = $random_string;;
        echo '<p style="font-family: Times New Roman; font-size: 18px; font-weight: bold;">' . $text . '</p>';
		echo '<p style="font-family: Times New Roman; font-size: 16px; ">' . $text1 . '</p>';
		//echo "Your Code Is Genrated: ";
		//echo $random_string;
	}
?>
	</body>
</html>
