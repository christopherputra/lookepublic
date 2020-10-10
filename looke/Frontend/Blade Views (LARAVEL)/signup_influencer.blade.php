<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Signup Influencer | Looke</title>
	@include("segments.link")
</head>
<body>
  <div class="nav">
      <div class="navbg"></div>
      <img src="/images/logo.png" class="logo">
  </div>
  <form class="phoneContainer" method="post" action="/signupinfluencer" enctype="multipart/form-data">
  @csrf
		<div class="influencerSignupTitle">Influencer</div>
		<div class="profileImageForm">
			<div class="insertinfluencerimagegradient">
					<div class="influencerimageblack">
							<div class="influencerimagecut">
									<img src="/images/defaultpict_influencer.png" class="influencerimage">
									<div class="uploadfilecontainer">
										<div class="uploadcontainer">UPLOAD</div>
										<input type="file" class="filebutton" name="image">
									</div>
							</div>
					</div>
			</div>
		</div>
		<div class="otherRegistForm">
			<input type="text" class="registinput" placeholder="name" name="influencer_name">
			<input type="email" class="registinput" placeholder="email@domain.com" name="influencer_email">
			<input type="password" class="registinput" placeholder="password"  name="influencer_password">
			<input type="text" class="registinput" placeholder="full address"  name="influencer_address">
			<div class="radiocontainer">
				<input type="radio" class="radiobutton"  name="influencer_gender" value="1">Male
				<input type="radio" class="radiobutton"  name="influencer_gender" value="0">Female
			</div>
		</div>
		
		<div class="signupusernameIgGradient">
			<div class="myIg_signup">My Instagram</div>
  			<div class="signupusernameIgBlack">
			  	<input type="username" class="registInsta" placeholder="username" name="influencer_instagram">
  			</div>
  		</div>

		<div class="registInstaDetailContainer">
			<div class="pnf">
				<div class="pnfDetails">Followers</div>
				<input type="number" class="followersNumber" placeholder="-" name="influencer_follower">
				<select class="units" name="influencer_unit">
					<option value="2">million</option>
					<option value="1">thousand</option>
					<option value="0">hundred</option>
				</select>
				<pre class="fakeFollowersWarning">Use your real followers number.
Faking your followers can cause a permanent ban.
				</pre>
				<div class="pnfDetails">Price</div>
				<div class="dollar">$</div>
				<input type="number" class="priceEndorsment" placeholder="-"  name="influencer_price">
				<div class="post">/post</div>
			</div>
		</div>
		<div class="createContainerInfluencer">
			<div class="termcondition">By creating this account, you are agree to our <span class="termcolor">Term & Conditions</span></div>
			<input type="submit" class="createbutton" value="CREATE">
		</div>
	</form>
</body>
<script>
	$(document).ready(function(){
		function readURL(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();
					
					reader.onload = function(e) {
					$(".influencerimage").attr('src', e.target.result);
					}
					
					reader.readAsDataURL(input.files[0]);
				}
			}

			$(".filebutton").change(function() {
				readURL(this);
			});
	});
</script>
</html>
