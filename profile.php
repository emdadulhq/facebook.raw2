<?php

include_once "app/autoload.php";

$login_user = auth();

/**
 * POST like process
 */

if( isset($_GET['like_post_id']) ) {
    $post_id = $_GET['like_post_id'];
    $user_id = $login_user['id'];

    $sql = "INSERT INTO likes ( post_id, user_id ) VALUES ('$post_id','$user_id')";
    insert($sql);
    header('location:home.php');

}


/**
 * Logout function
 */

if ( isset( $_GET['logout'] ) AND $_GET['logout'] == 'done' ) {
    session_destroy();
    header('location:index.php');
}


if( empty($_SESSION['user_id']) ) {
    header('location:index.php');
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $login_user['name']; ?></title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/fonts/font-awesome/css/all.css">
	<link rel="stylesheet" href="assets/fonts/themufy/themify-icons.css">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="icon" href="assets/media/img/logo.png" type="image/gif" sizes="16x16">
</head>
<body>

	<div id="post_modal" class="modal fade post-blr">
		<div class="modal-dialog modal-dialog-centered shadow-sm">
			<div class="modal-content ">
				<div class="modal-body">
					<h3>Create Post</h3>
					<hr>
					<div class="post-user-details clearfix">
						<img src="media/users/<?php echo $login_user['photo']; ?>" alt="">
						<div class="post-user-info-details">
							<h4><?php echo $login_user['name']; ?></h4>
							<p><i class="fas fa-globe-africa"></i> Public <i class="fas fa-caret-down"></i></p>
						</div>
					</div>
					<form action="">
						<textarea placeholder="What's on your mind ?"></textarea>
						<div class="upload clearfix shadow-sm">
							<h4>Add to your post</h4>
							<ul>
								<li><a href="#"><img src="assets/media/img/icons/p1 (2).png" alt=""></a></li>
								<li><a href="#"><img src="assets/media/img/icons/p1 (1).png" alt=""></a></li>
								<li><a href="#"><img src="assets/media/img/icons/3.png" alt=""></a></li>
								<li><a href="#"><img src="assets/media/img/icons/5.png" alt=""></a></li>
								<li><a href="#"><i class="fas fa-ellipsis-h"></i></a></li>
							</ul>
						</div>
						<div class="submit-button">
							<input type="submit" value="Post">
							<i class="far fa-calendar-alt"></i>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


	
	<header class="top-page-header shadow-sm fixed-top">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					
				</div>
				<div class="col-md-5">
					<div class="main-menu">
						<ul>
							<li><a href="home.php"> <svg viewBox="0 0 28 28" class="a8c37x1j ms05siws hwsy1cff b7h9ocf4
							em6zcovv" height="28" width="28"><path d="M17.5 23.979 21.25 23.979C21.386 23.979 21.5 23.864 21.5 23.729L21.5 13.979C21.5 13.427 21.949 12.979 22.5 12.979L24.33 12.979 14.017 4.046 3.672 12.979 5.5 12.979C6.052 12.979 6.5 13.427 6.5 13.979L6.5 23.729C6.5 23.864 6.615 23.979 6.75 23.979L10.5 23.979 10.5 17.729C10.5 17.04 11.061 16.479 11.75 16.479L16.25 16.479C16.939 16.479 17.5 17.04 17.5 17.729L17.5 23.979ZM21.25 25.479 17 25.479C16.448 25.479 16 25.031 16 24.479L16 18.327C16 18.135 15.844 17.979 15.652 17.979L12.348 17.979C12.156 17.979 12 18.135 12 18.327L12 24.479C12 25.031 11.552 25.479 11 25.479L6.75 25.479C5.784 25.479 5 24.695 5 23.729L5 14.479 3.069 14.479C2.567 14.479 2.079 14.215 1.868 13.759 1.63 13.245 1.757 12.658 2.175 12.29L13.001 2.912C13.248 2.675 13.608 2.527 13.989 2.521 14.392 2.527 14.753 2.675 15.027 2.937L25.821 12.286C25.823 12.288 25.824 12.289 25.825 12.29 26.244 12.658 26.371 13.245 26.133 13.759 25.921 14.215 25.434 14.479 24.931 14.479L23 14.479 23 23.729C23 24.695 22.217 25.479 21.25 25.479Z"></path></svg> </a></li>
							<li><a href="#"><svg viewBox="0 0 28 28" class="a8c37x1j ms05siws hwsy1cff b7h9ocf4 em6zcovv" height="28" width="28"><path d="M5.75 4A.75.75 0 015 3.25v-1a.75.75 0 011.5 0v1a.75.75 0 01-.75.75zm.75 11.251a.75.75 0 01-1.5 0V8.749a.75.75 0 011.5 0v6.502zM5.75 28a.75.75 0 01-.75-.75v-6.5a.75.75 0 011.5 0v6.5a.75.75 0 01-.75.75zm15.737-16.234L23.214 6.5H9.5v11h13.715l-1.728-5.266a.749.749 0 010-.468zM4.75 5h19.5a.75.75 0 01.713.986l-1.974 6.006 1.974 6.023a.75.75 0 01-.713.985H4.75a.75.75 0 010-1.502L8 17.5v-11H4.75a.749.749 0 110-1.5z"></path></svg></a></li>
							<li><a href="#"><svg viewBox="0 0 28 28" class="a8c37x1j ms05siws hwsy1cff b7h9ocf4 em6zcovv" height="28" width="28"><path d="M8.75 25.25C8.336 25.25 8 24.914 8 24.5 8 24.086 8.336 23.75 8.75 23.75L19.25 23.75C19.664 23.75 20 24.086 20 24.5 20 24.914 19.664 25.25 19.25 25.25L8.75 25.25ZM17.163 12.846 12.055 15.923C11.591 16.202 11 15.869 11 15.327L11 9.172C11 8.631 11.591 8.297 12.055 8.576L17.163 11.654C17.612 11.924 17.612 12.575 17.163 12.846ZM21.75 20.25C22.992 20.25 24 19.242 24 18L24 6.5C24 5.258 22.992 4.25 21.75 4.25L6.25 4.25C5.008 4.25 4 5.258 4 6.5L4 18C4 19.242 5.008 20.25 6.25 20.25L21.75 20.25ZM21.75 21.75 6.25 21.75C4.179 21.75 2.5 20.071 2.5 18L2.5 6.5C2.5 4.429 4.179 2.75 6.25 2.75L21.75 2.75C23.821 2.75 25.5 4.429 25.5 6.5L25.5 18C25.5 20.071 23.821 21.75 21.75 21.75Z"></path></svg></a></li>
							<li><a href="#"><svg viewBox="0 0 28 28" class="a8c37x1j ms05siws hwsy1cff b7h9ocf4 em6zcovv" height="28" width="28"><path d="M25.5 14C25.5 7.649 20.351 2.5 14 2.5 7.649 2.5 2.5 7.649 2.5 14 2.5 20.351 7.649 25.5 14 25.5 20.351 25.5 25.5 20.351 25.5 14ZM27 14C27 21.18 21.18 27 14 27 6.82 27 1 21.18 1 14 1 6.82 6.82 1 14 1 21.18 1 27 6.82 27 14ZM7.479 14 7.631 14C7.933 14 8.102 14.338 7.934 14.591 7.334 15.491 6.983 16.568 6.983 17.724L6.983 18.221C6.983 18.342 6.99 18.461 7.004 18.578 7.03 18.802 6.862 19 6.637 19L6.123 19C5.228 19 4.5 18.25 4.5 17.327 4.5 15.492 5.727 14 7.479 14ZM20.521 14C22.274 14 23.5 15.492 23.5 17.327 23.5 18.25 22.772 19 21.878 19L21.364 19C21.139 19 20.97 18.802 20.997 18.578 21.01 18.461 21.017 18.342 21.017 18.221L21.017 17.724C21.017 16.568 20.667 15.491 20.067 14.591 19.899 14.338 20.067 14 20.369 14L20.521 14ZM8.25 13C7.147 13 6.25 11.991 6.25 10.75 6.25 9.384 7.035 8.5 8.25 8.5 9.465 8.5 10.25 9.384 10.25 10.75 10.25 11.991 9.353 13 8.25 13ZM19.75 13C18.647 13 17.75 11.991 17.75 10.75 17.75 9.384 18.535 8.5 19.75 8.5 20.965 8.5 21.75 9.384 21.75 10.75 21.75 11.991 20.853 13 19.75 13ZM15.172 13.5C17.558 13.5 19.5 15.395 19.5 17.724L19.5 18.221C19.5 19.202 18.683 20 17.677 20L10.323 20C9.317 20 8.5 19.202 8.5 18.221L8.5 17.724C8.5 15.395 10.441 13.5 12.828 13.5L15.172 13.5ZM16.75 9C16.75 10.655 15.517 12 14 12 12.484 12 11.25 10.655 11.25 9 11.25 7.15 12.304 6 14 6 15.697 6 16.75 7.15 16.75 9Z"></path></svg></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-4 clearfix">
					<div class="user-info-top float-left clearfix">
						<img src="media/users/<?php echo $login_user['photo']; ?>" alt="">
						<h4><?php echo $login_user['name']; ?></h4>
					</div>
					<div class="notification-bar float-right">
						<ul>
							<li><a href="#"><svg viewBox="0 0 28 28" alt="" class="a8c37x1j ms05siws hwsy1cff b7h9ocf4 fzdkajry" height="20" width="20"><path d="M14 2.042c6.76 0 12 4.952 12 11.64S20.76 25.322 14 25.322a13.091 13.091 0 0 1-3.474-.461.956 .956 0 0 0-.641.047L7.5 25.959a.961.961 0 0 1-1.348-.849l-.065-2.134a.957.957 0 0 0-.322-.684A11.389 11.389 0 0 1 2 13.682C2 6.994 7.24 2.042 14 2.042ZM6.794 17.086a.57.57 0 0 0 .827.758l3.786-2.874a.722.722 0 0 1 .868 0l2.8 2.1a1.8 1.8 0 0 0 2.6-.481l3.525-5.592a.57.57 0 0 0-.827-.758l-3.786 2.874a.722.722 0 0 1-.868 0l-2.8-2.1a1.8 1.8 0 0 0-2.6.481Z"></path></svg></a></li>
							<li><a href="#"><svg viewBox="0 0 28 28" alt="" class="a8c37x1j ms05siws hwsy1cff b7h9ocf4 fzdkajry" height="20" width="20"><path d="M7.847 23.488C9.207 23.488 11.443 23.363 14.467 22.806 13.944 24.228 12.581 25.247 10.98 25.247 9.649 25.247 8.483 24.542 7.825 23.488L7.847 23.488ZM24.923 15.73C25.17 17.002 24.278 18.127 22.27 19.076 21.17 19.595 18.724 20.583 14.684 21.369 11.568 21.974 9.285 22.113 7.848 22.113 7.421 22.113 7.068 22.101 6.79 22.085 4.574 21.958 3.324 21.248 3.077 19.976 2.702 18.049 3.295 17.305 4.278 16.073L4.537 15.748C5.2 14.907 5.459 14.081 5.035 11.902 4.086 7.022 6.284 3.687 11.064 2.753 15.846 1.83 19.134 4.096 20.083 8.977 20.506 11.156 21.056 11.824 21.986 12.355L21.986 12.356 22.348 12.561C23.72 13.335 24.548 13.802 24.923 15.73Z"></path></svg></a></li>
                            <li class="dropdown logout-menu"><a data-toggle="dropdown" href="#"><i class="fas fa-caret-down"></i></a>
                                <!--                                <ul class="dropdown-menu">-->
                                <!--                                    <li class="dropdown-item"><a href="#">Settings</a></li>-->
                                <!--                                    <li class="dropdown-item"><a href="#">Change Passowrd</a></li>-->
                                <!--                                    <li class="dropdown-item"><a href="?logout=done">Logout</a></li>-->
                                <!--                                </ul>-->
                                <ul class="dropdown-menu " style="width: 400px;">
                                    <li class="dropdown-item d-flex ">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <a href=""><img style="height: 70px; width: 70px; border-radius: 50%; display: block;" src="media/users/<?php echo $login_user['photo']; ?>" alt="Card image cap"></a>
                                            </div>
                                            <div class="col-lg-9 text-right" >
                                                <a href="profile.php" >
                                                    <h4><?php echo $login_user['name'];?></h4> </a> <br>

                                                <a href="profile.php"><p>See your profile</p> </a>

                                            </div>
                                        </div>


                                        <!--                                        <a href="profile.php" style="text-align: left;">-->
                                        <!--                                            <h2>--><?php //echo $login_user['name'];?><!--</h2> </a>-->
                                        <!--                                        <a href="profile.php"><p>See your profile</p> </a>-->
                                    </li>
                                    <hr>
                                    <li class="dropdown-item d-flex "><i class="fas fa-cog" ><a href="#">Settings &
                                                privacy</a></i>  </li>
                                    <li class="dropdown-item d-flex"><i class="fas fa-question-circle"><a
                                                    href="#">Help & Support</a></i></li>
                                    <li class="dropdown-item d-flex"><i class="fas fa-moon"><a href="#">Dark Mode <i class="fas fa-toggle-on "></i></a></i>
                                    </li>
                                    <li class="dropdown-item d-flex"><i class="fas fa-exchange-alt"><a href="#">Switch to Basic
                                                Mode</a></i> </li>
                                    <li class="dropdown-item d-flex"><i class="fas fa-sign-out-alt"><a
                                                    href="?logout=done">Log Out</a></i>  </li>

                                </ul>
                            </li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</header>
	<br>
	<br>

	<header class="user-profile-header shadow-sm">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="cover-profile-photo">
						<div class="profile-photo">
							<img class="shadow-sm" src="media/users/<?php echo $login_user['photo']; ?>" alt="">
						</div>
					</div>
					<div class="user-info">
						<h2><?php echo $login_user['name']; ?></h2>
						<p>- Traveler of the time of infinity -</p>
						<a href="#">Edit</a>
					</div>
					<hr>
					<div class="profile-menu clearfix">
						<div class="menu-item float-left">
							<ul>
								<li><a href="#">Timeline</a></li>
								<li><a href="#">About</a></li>
								<li><a href="#">Friends</a></li>
								<li><a href="#">Photos</a></li>
								<li><a href="#">Archives</a></li>
							</ul>
						</div>

						<div class="right-menu float-right">
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-marker"></i> Edit Profile</a>
							<a href="#"><i class="fas fa-eye"></i></a>
							<a href="#"><i class="fas fa-search"></i></a>
							<a href="#"><i class="fas fa-ellipsis-h"></i></a>
						</div>

<!--Profile Update-->


                        <?php
                        $updtid = $login_user['id'];
                        //get value
                        if (isset($_POST['send'])){
                            $name = $_POST['name'];
                            $email = $_POST['email'];
                            $phone = $_POST['phone'];
                            $dob = $_POST['dob'];
                            if (isset($_POST['gender'])){
                                $gender = $_POST['gender'];
                            }



                            if (empty($name) || empty($email) || empty($phone)){
                                $mess = validate('All fields are required');
                            }else{
                                if (!empty($_FILES['new_photo']['name'])){
                                    $photo_data = photoUpload($_FILES['new_photo'], 'media/users/', ['jpg','png',
                                        'gif','jpeg'], '500');
                                    $mess = $photo_data ['mess'];
                                    $photo_name = $photo_data ['file_name'];
                                }else{
                                    $photo_name = $_POST['old_photo'];
                                }
                                echo $upqry= "UPDATE users SET name='$name', email='$email', mobile='$phone', dob='$dob', gender='$gender', photo='$photo_name' WHERE id='$updtid'";
                                $connection->query($upqry);
                                $mess = validate('Profile updated successfull', 'success');

                                $login_user['photo'] = $photo_name;

                            }
                        }
                        if (isset($login_user['id'])){
                            $updtid= $login_user['id'];
                            $dqry = "SELECT * FROM users WHERE id = '$updtid'";
                            $ddata = $connection->query($dqry);
                            $disdata = $ddata ->fetch_assoc();


//    $_SESSION['fname'] = $disdata['fname'];
//    $_SESSION['lname'] = $disdata['lname'];
//    $_SESSION['email'] = $disdata['email'];
//    $_SESSION['phone'] = $disdata['phone'];
//    $_SESSION['dob'] = $disdata['dob'];
//    $_SESSION['gender'] = $disdata['gender'];
                        }


                        ?>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>

                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                            <span aria-hidden="true">&times;</span>
                                        </button>

                                    </div>


                                    <div class="modal-body">
                                        <?php
                                        if (isset($mess)){
                                            echo $mess;
                                        }
                                        ?>
                                        <img class="shadow-sm " name="old_photo" style="height: 300px; width:
                                            300px;
                                            border-radius: 50%; left: 0; top: 0; margin: auto; display: block;"
                                             src="media/users/<?php echo $disdata['photo'];?>" alt="">
                                        <form action="" method="POST" enctype="multipart/form-data">

                                            <div class="form-group">
                                                <label for="">Full Name</label>
                                                <input name="name" value="<?php echo $disdata['name']; ?>" class="form-control" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input name="email" value="<?php echo $disdata['email']; ?>" class="form-control" type="email">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Phone</label>
                                                <input name="phone" value="<?php echo $disdata['mobile']; ?>"
                                                       class="form-control" type="text">
                                            </div>
                                            <div class="form-group">


                                                <div class="form-group">
                                                    <label for="">Date of Birth</label>
                                                    <input name="dob" value="<?php echo $disdata['dob']; ?>" class="form-control" type="date">
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <label for="">Gender</label>
                                                <br>
                                                <input name="gender" type="radio" value="Male" id="mmm"> <label for="mmm">Male</label>
                                                <input name="gender" type="radio" value="Female" id="fff"> <label for="fff">Female</label>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Photo</label>
                                                <p class="text-info">Please select your passport size photograph</p>
                                                <input name="new_photo" id="file" class="form-control" type="file"
                                                       accept="image/*" onchange="loadFile(event)" style="cursor: pointer;">
                                                <p><img id="output" class="" width="200" height="220"></p>


                                            </div>
                                            <div class="form-group">
                                                <input name="send" class="btn btn-primary" type="submit" value="Update">

                                            </div>
                                        </form>

                                    </div>
                                    <a href="change_password.php" class="btn btn-danger">Change Password</a> <br> <br>

                                    <a href="?delete_id=<?php echo $login_user['id'];?> " id="del_btn" class="btn
                                    btn-danger">Deactive my account</a>


                                    <div class="modal-footer">

                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<section class="profile-mein-content">
		<div class="container">
			<div class="row">
				<div class="col-md-5">


					<div class="intro">
						<div class="card shadow-sm">
							<div class="card-body">
								<h3>Intro</h3>
								<hr>
								<div class="intro-list">
									<ul>
										<li> <i class="fas fa-briefcase"></i> Developer at <strong>Freelancer</strong></li>

										<li> <i class="fas fa-briefcase"></i> Professional Educator & Founder at  <strong>School of Paradise</strong></li>

										<li> <i class="fas fa-briefcase"></i> Developer at   <strong>Upwork</strong></li>


										<li> <i class="fas fa-graduation-cap"></i> BSC in    <strong>EEE</strong></li>

										<li> <i class="fas fa-graduation-cap"></i> From Narsingdi,   <strong> Dhaka, Bangladesh</strong></li>
										
									</ul>

									<a href="#">Edit Details</a>
								</div>

								<div class="featured-gallery">
									<div class="gallery-img clear-fix">
										<img src="assets/media/img/pp_photo/images.jpg" alt="">
										<img src="assets/media/img/pp_photo/american-passport-photo.jpg" alt="">
										<img src="assets/media/img/pp_photo/IMG_9911_copy.307195445_std.jpg" alt="">
										<img src="assets/media/img/pp_photo/official-portrait-woman-red-hair-260nw-161401790.webp" alt="">
										<img src="assets/media/img/pp_photo/passport-photo-service-250x250.jpeg" alt="">
										<img src="assets/media/img/pp_photo/passport2015-201507251917.jpg" alt="">
									</div>
									<a href="#">Edit Featured</a>
								</div>

							</div>
						</div>
					</div>


					<div class="frields-section">
						<div class="card shadow-sm">
							<div class="card-body">
								<div class="sec-head clearfix">
									<h3 class="float-left">Friends</h3>
									<a class="float-right" href="#">See All</a>
								</div>
								<hr>

								<div class="all-frield clearfix">


									<div class="frield-item">
										<a href="#">
											<div class="card">
												<div class="card-body">
													<img class="w-100" src="assets/media/img/pp_photo/rrr.jpeg" alt="">
												</div>
												<div class="card-footer">
													<h4><?php echo $login_user['name']; ?></h4>
												</div>
											</div>
										</a>
									</div>

									<div class="frield-item">
										<a href="#">
											<div class="card">
												<div class="card-body">
													<img class="w-100" src="assets/media/img/pp_photo/rrr.jpeg" alt="">
												</div>
												<div class="card-footer">
													<h4><?php echo $login_user['name']; ?></h4>
												</div>
											</div>
										</a>
									</div>

									<div class="frield-item">
										<a href="#">
											<div class="card">
												<div class="card-body">
													<img class="w-100" src="assets/media/img/pp_photo/rrr.jpeg" alt="">
												</div>
												<div class="card-footer">
													<h4><?php echo $login_user['name']; ?></h4>
												</div>
											</div>
										</a>
									</div>

									<div class="frield-item">
										<a href="#">
											<div class="card">
												<div class="card-body">
													<img class="w-100" src="assets/media/img/pp_photo/rrr.jpeg" alt="">
												</div>
												<div class="card-footer">
													<h4><?php echo $login_user['name']; ?></h4>
												</div>
											</div>
										</a>
									</div>

									<div class="frield-item">
										<a href="#">
											<div class="card">
												<div class="card-body">
													<img class="w-100" src="media/users/<?php echo $login_user['photo']; ?>" alt="">
												</div>
												<div class="card-footer">
													<h4><?php echo $login_user['name']; ?></h4>
												</div>
											</div>
										</a>
									</div>

									<div class="frield-item">
										<a href="#">
											<div class="card">
												<div class="card-body">
													<img class="w-100" src="media/users/<?php echo $login_user['photo']; ?>" alt="">
												</div>
												<div class="card-footer">
													<h4><?php echo $login_user['name']; ?></h4>
												</div>
											</div>
										</a>
									</div>



								</div>

							</div>
						</div>
					</div>



				</div>
				<div class="col-md-7">

					<div class="create-post-section">
						<div class="card shadow-sm">
							<div class="card-body">
								<div class="post-area clearfix">
									<img src="media/users/<?php echo $login_user['photo']; ?>" alt="">
									<div id="post_div" class="make-post float-right">What's on your mind?</div>
								</div>
								<hr>
								<div class="post-options">
									<ul>
										<li><a href="#"> <img src="assets/media/img/post/1.png" alt=""> Like Video</a></li>
										<li><a href="#"><img src="assets/media/img/post/2.png" alt=""> Photo/Video </a></li>
										<li><a href="#"> <img src="assets/media/img/post/3.png" alt=""> Life Event</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>



					<br>



                    <div class="all-post-area">


                        <?php

                        if( isset($_POST['comment']) ){
                            $comments = $_POST['comment'];
                            $post_id = $_POST['post_id'];
                            $name = $login_user['name'];
                            $photo = $login_user['photo'];

                            $sql = "INSERT INTO comments (content, name, photo, post_id) VALUES ('$comments','$name','$photo','$post_id')";
                            insert($sql);


                        }
                        $user_name= $login_user['name'];
                        $sql = "SELECT * FROM posts WHERE name='$user_name'";
                        $data = $connection -> query($sql);
                        while( $post =  $data -> fetch_assoc() ) :


                            ?>
                            <div class="user-post-panel">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <div class="post-header clearfix">
                                            <img src="media/users/<?php echo $post['photo']; ?>" alt="">
                                            <div class="post-user-info">
                                                <h4><a href="#"><?php echo $post['name']; ?></a></h4>
                                                <p>12 mins <i class="fas fa-globe-americas"></i></p>
                                            </div>
                                            <a class="float-right" href="#"><i class="fas fa-ellipsis-h"></i></a>
                                        </div>
                                        <div class="post-content mt-2">
                                            <p><?php echo $post['content']; ?></p>
                                            <img src="media/posts/<?php echo $post['featured_photo']; ?>" alt="">
                                        </div>
                                        <hr>
                                        <div class="post-likes clearfix">
                                            <div class="like float-left">
                                                <?php
                                                $post_id = $post['id'];
                                                $like_count =  valueCheck('likes', 'post_id', $post_id);

                                                if( $like_count > 0 ){
                                                    echo '<img src="assets/media/img/post/like.svg" alt="">' . $like_count ;
                                                }else{
                                                    echo "No likes";
                                                }
                                                ?>

                                            </div>
                                            <div class="comment float-right">
                                                <?php

                                                $post_id = $post['id'];
                                                $comments_num = valueCheck('comments', 'post_id', $post_id );

                                                if( $comments_num > 0 ){
                                                    echo $comments_num . " comments";
                                                }else{
                                                    echo "No comments";
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="post-like-comment-share">
                                            <ul>


                                                <?php

                                                $post_id = $post['id'];
                                                $user_id = $login_user['id'];
                                                $sql = "SELECT * FROM likes WHERE post_id='$post_id' AND user_id='$user_id'";
                                                $data = $connection -> query($sql);

                                                $like_status =  $data -> num_rows;
                                                if( $like_status > 0 ) :
                                                    ?>

                                                    <li><a href="" style="color:blue;"><i class="far fa-thumbs-up"></i> Like</a></li>
                                                <?php else : ?>
                                                    <li><a href="?like_post_id=<?php echo $post['id']; ?>"><i class="far fa-thumbs-up"></i> Like</a></li>
                                                <?php endif; ?>



                                                <li><a href="#"><i class="far fa-comment-alt"></i> Comment</a></li>
                                                <li><a href="#"><i class="fas fa-share"></i> Share</a></li>
                                            </ul>
                                        </div>
                                        <hr>

                                        <div class="comment-area">

                                            <?php
                                            $post_id = $post['id'];
                                            $comments = all('comments', "WHERE post_id='$post_id'", 'ASC');
                                            while( $comment = $comments -> fetch_object() ) :
                                                ?>
                                                <div class="post-user-comment clearfix">
                                                    <img src="media/users/<?php echo $comment -> photo; ?>" alt="">
                                                    <div class="comment-content">
                                                        <h4><?php echo $comment -> name; ?></h4>
                                                        <p><?php echo $comment -> content; ?></p>
                                                    </div>
                                                </div>

                                            <?php endwhile; ?>




                                            <div class="post-comment clearfix">
                                                <img class="float-left" src="media/users/<?php echo $login_user['photo']; ?>" alt="">
                                                <div class="post-comment-field float-right">
                                                    <form action="" method="POST">
                                                        <input name="comment" type="text">
                                                        <input name="post_id" type="hidden" value="<?php echo $post['id']; ?>">
                                                    </form>

                                                </div>
                                            </div>



                                        </div>



                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>

                    </div>


				</div>
			</div>
		</div>
	</section>



	
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>

	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
    <script>
        $(document).on('click','#del_btn',function () {
            let del = confirm('Are you sure want delete your profile?');
            if (del == true){
                return true;
            }else {
                return false;
            }

        });


        var loadFile = function(event) {
            var image = document.getElementById('output');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
</body>
</html>