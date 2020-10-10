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
  <form class="mainEditProfileCointainer" enctype="multipart/form-data" method="post" action="/updateprofilebusiness">
  @csrf
    <div class="menuEditProfile">
      <ul class="editMenu">
        <li class="styleLi"><a href="/profilebusiness" class="selectedMenu">Profile</a></li>
        <li class="styleLi"><a href="/profilebusiness/security" class="notselectedMenu">Security</a></li>
      </ul>
	  <a href="/logout" class="logoutbutton">Logout</a>
    </div>
    <div class="detailEditProfile">
      <div class="changeimageInfluencer">
        <div class="insertbusinessimagegradient">
  				<div class="businessimageblack">
  						<div class="businessimagecut">
							<img src="{{App\Cast::image($business_image,1)}}" class="influencerimage">
							<div class="uploadfilecontainer">
								<div class="uploadcontainer">UPLOAD</div>
								<input type="file" class="filebutton" name="image">
							</div>
  						</div>
  				</div>
  			</div>
      </div>
      <div class="changeprofileInfluencer">
  			<div class="editline"><div class="edithint">Name </div><input type="text" class="editprofileinput" name="name" id="name" value="{{$business_name}}"></div>
			  <div class="editline"><div class="edithint">Address  </div><input type="text" class="editprofileinput" name="address" id="address" value="{{$business_address}}"></div>
			  <div class="editline"><div class="edithint">Telephone  </div><input type="text" class="editprofileinput" name="telephone" id="telephone" value="{{$business_telephone}}"></div>
			  <div class="editline"><div class="edithint">Field  </div><input type="text" class="editprofileinput" name="field" id="field" value="{{$business_field}}"></div>
  		</div>
      <div class="cancelorsave">
        <input type="submit" class="savebutton" value="SAVE">
        <input type="button" class="cancelbutton" value="CANCEL">
      </div>
	</form>
	<script>
		$(document).ready(function(){
			var name = "{{$business_name}}";
			var image = "{{App\Cast::image($business_image,1)}}";
			var address = "{{$business_address}}";
			var field = "{{$business_field}}";
			var telephone = "{{$business_telephone}}";
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
			$("input,select").addClass("canceled");
			$("input,select").click(function(){
				$("input,select").removeClass("canceled");
				$(".savebutton,.cancelbutton").fadeIn();
			});
			$(".cancelbutton").click(function(){
				$("#name").val(name);
				$("#telephone").val(telephone);
				$("#field").val(field);
				$("#address").val(address);
				$(".influencerimage").attr("src",image);
				$("input,select").addClass("canceled");
				$(".savebutton,.cancelbutton").fadeOut();
			});
		});
	</script>
</body>
</html>