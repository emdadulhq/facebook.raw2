<?php include_once "app/autoload.php"; ?>

<?php

    if (isset($_SESSION['user_id'])){
        header('location:home.php');
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Facebook - login or signup</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="icon" href="assets/media/img/logo.png" type="image/gif" sizes="16x16">
</head>
<body>



<?php

    /**
     * Login Form Submit
     */
    if ( isset($_POST['login']) ){
        //get values
        $me = $_POST['me'];
        $pass = $_POST['pass'];

        if ( empty($me) || empty($pass) ){
            $mess = validate('Field must not be Empty !');
        }else {
            $sql = "SELECT * FROM users WHERE email='$me' || mobile='$me'";
            $data = $connection -> query($sql);
            $login_user_data = $data -> fetch_assoc();
            $user_num =  $data -> num_rows;

            if ( $user_num > 0 ){
                if ( password_verify($pass, $login_user_data['password']) ){

                    $_SESSION['user_id']    =  $login_user_data['id'];

                    header('location:home.php');
                }else {
                    $mess = validate('Wrong password');
                }
            }else{
                $mess = validate('Wrong email or mobile number');
            }

        }
    }



    /**
     * Facebook registration
     */
    if ( isset($_POST['signup']) ) {
        // get all values
        $name = $_POST['fname'] .' '. $_POST['lname'];
        $me = $_POST['me'];
        $pass = $_POST['pass'];
        $dob = $_POST['dob-day'].'-'.$_POST['dob-month'].'-'.$_POST['dob-year'];

        $gender = '';
        if( isset($_POST['gender']) ){
            $gender = $_POST['gender'];
        }

        // Password hash
        $hash_pass = password_hash($pass, PASSWORD_DEFAULT);

        // File Info
        $file_name = $_FILES['photo']['name'];
        $file_name_tmp = $_FILES['photo']['tmp_name'];
        $file_unique_name = md5(time().rand()) . $file_name;

        // Mobile and email manage
        $mobile = '';
        $email = '';
        if ( filter_var($me, FILTER_VALIDATE_EMAIL) ) {
            $email = $me;
        }else {
            $mobile = $me;
        }

        if ( empty($name) || empty($me) || empty($pass) || empty($dob) || empty($gender)  ) {
            $mess = validate('All fields are required');
        }else {
            insert("INSERT INTO users (name, email, mobile, password, dob, gender, photo) VALUES ('$name','$email','$mobile','$hash_pass','$dob','$gender','$file_unique_name')");
            move_uploaded_file($file_name_tmp, 'media/users/' . $file_unique_name );
            $mess = validate('User registration successful !' , 'success');
        }




    }

?>

    <div style="position:absolute;top:50px;left: 0px;right: 0px;" class="mess w-50 mx-auto">
        <?php
            if (isset($mess)){
                echo $mess;
            }
        ?>
    </div>
	
	<div class="fb-login">
		<div class="container">
			<div class="row">
				<div class="col-md-7">
					<img src="assets/media/img/dF5SId3UHWd.svg" alt="">
					<h2>Facebook helps you connect and share with the people in your life.</h2>
				</div>
				<div class="col-md-5">
					<div class="card shadow">
						<div class="card-body">
							<div class="log">
								<form action="" method="POST">
									<div class="form-group">
										<input name="me" class="form-control" type="text" placeholder="Mobile or Email">
									</div>
									<div class="form-group">
										<input name="pass" class="form-control" type="text" placeholder="Password">
									</div>
									<div class="form-group">
										<input name="login" class="btn btn-block btn-primary" value="Log In" type="submit">
									</div>
								</form>
								<a class="d-block text-center" href="#">Forgotten password?</a>
								<hr>
								<div class="text-center">
									<a data-toggle="modal"  class="btn btn-lg btn-success" href="#reg">Create an account</a>
								</div>
							</div>
						</div>
					</div>
					<p  class="text-center mt-5"><a href="#">Create a Page</a> for a celebrity, band or business.</p>
				</div>
			</div>
		</div>
	</div>



    <div id="reg" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Sign Up <span style="font-size:14px;font-weight: normal;" class="d-block">It's quick and easy </span></h4>

                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <input name="fname" class="form-control" type="text" placeholder="First Name">
                            </div>
                            <div class="form-group col-sm-6">
                                <input name="lname" class="form-control" type="text" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <input name="me" class="form-control" type="text" placeholder="Mobile number or Email Address">
                        </div>
                        <div class="form-group">
                            <input name="pass" class="form-control" type="password" placeholder="New password">
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <select class="form-control" name="dob-day" id="dob-day">
                                    <option value="">Day</option>
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-4">
                                <select class="form-control" name="dob-month" id="dob-month">
                                    <option value="">Month</option>
                                    <option value="01">January</option>
                                    <option value="02">February</option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-4">
                                <select class="form-control" name="dob-year" id="dob-year">
                                    <option value="">Year</option>
                                    <option value="2020">2020</option>
                                    <option value="2019">2019</option>
                                    <option value="2018">2018</option>
                                    <option value="2017">2017</option>
                                    <option value="2016">2016</option>
                                    <option value="2015">2015</option>
                                    <option value="2014">2014</option>
                                    <option value="2013">2013</option>
                                    <option value="2012">2012</option>
                                    <option value="2011">2011</option>
                                    <option value="2010">2010</option>
                                    <option value="2009">2009</option>
                                    <option value="2008">2008</option>
                                    <option value="2007">2007</option>
                                    <option value="2006">2006</option>
                                    <option value="2005">2005</option>
                                    <option value="2004">2004</option>
                                    <option value="2003">2003</option>
                                    <option value="2002">2002</option>
                                    <option value="2001">2001</option>
                                    <option value="2000">2000</option>
                                    <option value="1999">1999</option>
                                    <option value="1998">1998</option>
                                    <option value="1997">1997</option>
                                    <option value="1996">1996</option>
                                    <option value="1995">1995</option>
                                    <option value="1994">1994</option>
                                    <option value="1993">1993</option>
                                    <option value="1992">1992</option>
                                    <option value="1991">1991</option>
                                    <option value="1990">1990</option>
                                    <option value="1989">1989</option>
                                    <option value="1988">1988</option>
                                    <option value="1987">1987</option>
                                    <option value="1986">1986</option>
                                    <option value="1985">1985</option>
                                    <option value="1984">1984</option>
                                    <option value="1983">1983</option>
                                    <option value="1982">1982</option>
                                    <option value="1981">1981</option>
                                    <option value="1980">1980</option>
                                    <option value="1979">1979</option>
                                    <option value="1978">1978</option>
                                    <option value="1977">1977</option>
                                    <option value="1976">1976</option>
                                    <option value="1975">1975</option>
                                    <option value="1974">1974</option>
                                    <option value="1973">1973</option>
                                    <option value="1972">1972</option>
                                    <option value="1971">1971</option>
                                    <option value="1970">1970</option>
                                    <option value="1969">1969</option>
                                    <option value="1968">1968</option>
                                    <option value="1967">1967</option>
                                    <option value="1966">1966</option>
                                    <option value="1965">1965</option>
                                    <option value="1964">1964</option>
                                    <option value="1963">1963</option>
                                    <option value="1962">1962</option>
                                    <option value="1961">1961</option>
                                    <option value="1960">1960</option>
                                    <option value="1959">1959</option>
                                    <option value="1958">1958</option>
                                    <option value="1957">1957</option>
                                    <option value="1956">1956</option>
                                    <option value="1955">1955</option>
                                    <option value="1954">1954</option>
                                    <option value="1953">1953</option>
                                    <option value="1952">1952</option>
                                    <option value="1951">1951</option>
                                    <option value="1950">1950</option>
                                    <option value="1949">1949</option>
                                    <option value="1948">1948</option>
                                    <option value="1947">1947</option>
                                    <option value="1946">1946</option>
                                    <option value="1945">1945</option>
                                    <option value="1944">1944</option>
                                    <option value="1943">1943</option>
                                    <option value="1942">1942</option>
                                    <option value="1941">1941</option>
                                    <option value="1940">1940</option>
                                    <option value="1939">1939</option>
                                    <option value="1938">1938</option>
                                    <option value="1937">1937</option>
                                    <option value="1936">1936</option>
                                    <option value="1935">1935</option>
                                    <option value="1934">1934</option>
                                    <option value="1933">1933</option>
                                    <option value="1932">1932</option>
                                    <option value="1931">1931</option>
                                    <option value="1930">1930</option>
                                    <option value="1929">1929</option>
                                    <option value="1928">1928</option>
                                    <option value="1927">1927</option>
                                    <option value="1926">1926</option>
                                    <option value="1925">1925</option>
                                    <option value="1924">1924</option>
                                    <option value="1923">1923</option>
                                    <option value="1922">1922</option>
                                    <option value="1921">1921</option>
                                    <option value="1920">1920</option>
                                    <option value="1919">1919</option>
                                    <option value="1918">1918</option>
                                    <option value="1917">1917</option>
                                    <option value="1916">1916</option>
                                    <option value="1915">1915</option>
                                    <option value="1914">1914</option>
                                    <option value="1913">1913</option>
                                    <option value="1912">1912</option>
                                    <option value="1911">1911</option>
                                    <option value="1910">1910</option>
                                    <option value="1909">1909</option>
                                    <option value="1908">1908</option>
                                    <option value="1907">1907</option>
                                    <option value="1906">1906</option>
                                    <option value="1905">1905</option>
                                    <option value="1904">1904</option>
                                    <option value="1903">1903</option>
                                    <option value="1901">1901</option>
                                    <option value="1900">1900</option>
                                </select>
                            </div>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input value="Female" type="radio" id="customRadioInline1" name="gender" class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline1">Female</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input value="Male" type="radio" id="customRadioInline2" name="gender" class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline2">Male</label>
                        </div>
                        <hr>
                        <div class="form-group">
                            <img style="width: 200px;" id="profile_image_load" src="" alt=""> <br> <br>
                            <input style="display: none;" name="photo" class="form-control-file" type="file" id="profile_photo">
                            <label for="profile_photo"><img style="width: 70px; cursor: pointer;" src="assets/media/img/camera.png" alt=""></label>
                        </div>
                        <hr>
                        <div class="sub text-center">
                            <input name="signup" class="btn btn-primary" type="submit" value="Sign Up">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>




	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>