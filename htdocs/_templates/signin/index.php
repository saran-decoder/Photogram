<?php

$login_page = true;

//TODO: Redirect to a requested URL instead of base path on login_page
if (isset($_POST['email_address']) and isset($_POST['password'])) {
    $email_address = $_POST['email_address'];
    $password = $_POST['password'];

    $result = UserSession::authenticate($email_address, $password);
    $login_page = false;
}

if (!$login_page) {
    if ($result) {
        $should_redirect = Session::get('_redirect');
        $redirect_to = get_config('base_path');
        if (isset($should_redirect)) {
            $redirect_to = $should_redirect;
			Session::set('_redirect', false);
		}
        ?>
<script>
	window.location.href = "<?=$redirect_to?>"
</script>

<?php
    } else {
		?>
		<script>
			window.location.href = "/login.php?error=1"
		</script>
		
		<?php
    }
} else {
    ?>

<main class="card-container slideUp-animation">
    <div class="image-container">
        <h1 class="company">𝓹𝓱𝓸𝓽𝓸𝓰𝓻𝓪𝓶</h1>
        <img src="<?=get_config('base_path')?>assets/images/logreg/signIn.svg" class="illustration" alt="">
        <p class="quote">Hey welcome to this photogram site..!</p>
    </div>

    <div class="login-container slideRight-animation">
		<?php
			if(isset($_GET['error'])){
		?>
				<div class="alert alert-danger" role="alert">
					Invalid Credentials
				</div>
		<?php
			}
		?>
        <div class="login-form">      
			<form method="post" action="/">
				<div class="login-form-inner">
                    <input name="fingerprint" type="hidden" id="fingerprint" value="">
        	        <h1><div class="logo">
                        <svg height="512" viewBox="0 0 192 192" width="512" xmlns="http://www.w3.org/2000/svg">
                            <path d="m155.109 74.028a4 4 0 0 0 -3.48-2.028h-52.4l8.785-67.123a4.023 4.023 0 0 0 -7.373-2.614l-63.724 111.642a4 4 0 0 0 3.407 6.095h51.617l-6.962 67.224a4.024 4.024 0 0 0 7.411 2.461l62.671-111.63a4 4 0 0 0 .048-4.027z"></path>
                        </svg>
                    </div>Login</h1>
                    <p class="body-text" style="margin-bottom: 30px;">See your growth and get consulting support!</p>

                    <div class="login-form-group">
                        <input name="email_address" type="text" id="floatingInput" required>
                        <div class="input-icon">
							<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
								<path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
							</svg>
						</div>
                        <span class="name-holder">Username or Email</span>
                    </div>
                    <div class="login-form-group">
                        <input name="password" type="password" id="floatingPassword" required>
                        <div class="input-icon">
							<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16">
								<path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z"/>
							</svg>
						</div>
                        <span class="name-holder">Password</span>
                    </div>
                    
                    <div class="login-form-group single-row">
                        <div class="custom-check">
                            <input autocomplete="off" type="checkbox" checked="" id="remember"><label for="remember">Remember me</label>
                        </div>
                        <a href="#" class="link forgot-link">Forgot Password ?</a>
                    </div>
                    
                    <button class="rounded-button login-cta" type="submit">Log In</button>

                    <div class="sign-in-seperator">
                        <span>Sign in with your account or</span>
                    </div>

                    <div class="other-rounded-button">
                        <a href="#" class="rounded-button google-login-button" style="margin: 0 20px 20px 0;">
                            <span class="google-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="48" height="48" viewBox="0 0 50 50">
                                    <path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"></path><path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"></path><path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"></path><path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"></path>
                                </svg>
                            </span>
                        </a>
                        
                        <a href="#" class="rounded-button google-login-button" style="margin: 0 20px 20px 0;">
                            <span class="google-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="48" height="48" viewBox="0 0 48 48">
                                    <path fill="#039be5" d="M24 5A19 19 0 1 0 24 43A19 19 0 1 0 24 5Z"></path><path fill="#fff" d="M26.572,29.036h4.917l0.772-4.995h-5.69v-2.73c0-2.075,0.678-3.915,2.619-3.915h3.119v-4.359c-0.548-0.074-1.707-0.236-3.897-0.236c-4.573,0-7.254,2.415-7.254,7.917v3.323h-4.701v4.995h4.701v13.729C22.089,42.905,23.032,43,24,43c0.875,0,1.729-0.08,2.572-0.194V29.036z"></path>
                                </svg>
                            </span>
                        </a>

                        <a href="#" class="rounded-button google-login-button" style="margin: 0 0 20px 0;">
                            <span class="google-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="48" height="48" viewBox="0 0 48 48">
                                    <path fill="#03A9F4" d="M42,12.429c-1.323,0.586-2.746,0.977-4.247,1.162c1.526-0.906,2.7-2.351,3.251-4.058c-1.428,0.837-3.01,1.452-4.693,1.776C34.967,9.884,33.05,9,30.926,9c-4.08,0-7.387,3.278-7.387,7.32c0,0.572,0.067,1.129,0.193,1.67c-6.138-0.308-11.582-3.226-15.224-7.654c-0.64,1.082-1,2.349-1,3.686c0,2.541,1.301,4.778,3.285,6.096c-1.211-0.037-2.351-0.374-3.349-0.914c0,0.022,0,0.055,0,0.086c0,3.551,2.547,6.508,5.923,7.181c-0.617,0.169-1.269,0.263-1.941,0.263c-0.477,0-0.942-0.054-1.392-0.135c0.94,2.902,3.667,5.023,6.898,5.086c-2.528,1.96-5.712,3.134-9.174,3.134c-0.598,0-1.183-0.034-1.761-0.104C9.268,36.786,13.152,38,17.321,38c13.585,0,21.017-11.156,21.017-20.834c0-0.317-0.01-0.633-0.025-0.945C39.763,15.197,41.013,13.905,42,12.429"></path>
                                </svg>
                            </span>
                        </a>
                    </div>
                    
                    <div class="register-div d-flex align-items-center justify-content-center">Don't Have Account? <a href="signup" class="link create-account">Create Account</a></div>
                </div>
            </form>
        </div>
    </div>
</main>

<?php
	}
?>