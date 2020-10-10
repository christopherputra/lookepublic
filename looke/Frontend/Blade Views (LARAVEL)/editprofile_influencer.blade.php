<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Edit Pricing | Looke</title>
	@include("segments.link")
</head>
<body>
  <div class="nav">
      <div class="navbg"></div>
      <img src="images/logo.png" class="logo">
  </div>
  <form class="mainEditProfileCointainer" enctype="multipart/form-data" method="post" action="/updateprofile">
  @csrf
    <div class="menuEditProfile">
      <ul class="editMenu">
        <li class="styleLi"><a href="/profile" class="selectedMenu">Profile</a></li>
        <li class="styleLi"><a href="/profile/pricing" class="notselectedMenu">Pricing</a></li>
        <li class="styleLi"><a href="/profile/security" class="notselectedMenu">Security</a></li>
      </ul>
	  <a href="/logout" class="logoutbutton">Logout</a>
    </div>
    <div class="detailEditProfile">
      <div class="changeimageInfluencer">
        <div class="insertinfluencerimagegradient">
  				<div class="influencerimageblack">
  						<div class="influencerimagecut">
							<img src="{{App\Cast::image($influencer_image,1)}}" class="influencerimage">
							<div class="uploadfilecontainer">
								<div class="uploadcontainer">UPLOAD</div>
								<input type="file" class="filebutton" name="image">
							</div>
  						</div>
  				</div>
  			</div>
      </div>
      <div class="changeprofileInfluencer">
  			<div class="editline"><div class="edithint">Name </div><input type="text" class="editprofileinput" name="name" id="name" value="{{$influencer_name}}"></div>
			  <div class="editline"><div class="edithint">Address  </div><input type="text" class="editprofileinput" name="address" id="address" value="{{$influencer_address}}"></div>
			  <div class="editlineradio">
				<input type="radio" class="radiobutton" id="gender1"  name="gender" value="1" checked>Male
				<input type="radio" class="radiobutton" id="gender0"  name="gender" value="0">Female
			</div>
  		</div>
  		<div class="changeusernameIgGradient">
			<div class="myIg_change">My Instagram</div>
  			<div class="changeusernameIgBlack">
  				<input type="username" class="changeInsta" name="instagram" id="instagram" placeholder="username" value="{{$influencer_instagram}}">
  			</div>
  		</div>
      <div class="changeInstaDetailContainer">
  			<div class="pnf">
  				<div class="pnfDetails">Followers</div>
  				<input type="number" class="followersNumber" name="follower" id="follower" value="{{$influencer_follower}}">
  				<select class="units" name="unit">
  					<option value="0">hundred</option>
  					<option value="1">thousand</option>
  					<option value="2">million</option>
  				</select>
  				<pre class="fakeFollowersWarning">
Use your real followers number.
Faking your followers can cause a permanent ban.
  				</pre>
  			</div>
  		</div>
      <div class="cancelorsave">
        <input type="submit" class="savebutton" value="SAVE">
        <input type="button" class="cancelbutton" value="CANCEL">
      </div>
	</form>
	<script>
		$(document).ready(function(){
			var name = "{{$influencer_name}}";
			var image = "{{App\Cast::image($influencer_image,1)}}"
			var follower = "{{$influencer_follower}}";
			var instagram = "{{$influencer_instagram}}";
			var gender = "{{$influencer_gender}}";
			var address = "{{$influencer_address}}";
			var unit = "{{$influencer_unit}}";
			function selectgender(){
				$("#gender"+gender).prop("checked",true);
			}
			selectgender();
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
			$("option:eq({{$influencer_unit}})").prop("selected",true);
			$("input,select").addClass("canceled");
			$("input,select").click(function(){
				$("input,select").removeClass("canceled");
				$(".savebutton,.cancelbutton").fadeIn();
			});
			$(".cancelbutton").click(function(){
				$("#name").val(name);
				$("#follower").val(follower);
				$("#instagram").val(instagram);
				$("#address").val(address);
				selectgender();
				$("option:eq("+unit+")").prop("selected",true);
				$(".influencerimage").attr("src",image);
				$("input,select").addClass("canceled");
				$(".savebutton,.cancelbutton").fadeOut();
			});
		});
	</script>
</body>
</html>
