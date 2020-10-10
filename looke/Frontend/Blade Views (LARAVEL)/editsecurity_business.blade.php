<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Edit Security | Looke</title>
  @include("segments.link")
</head>
<body>
  <div class="emailoverlay">
    <div class="emailsentcontainer">
      <div class="emailsent">Sent</div>
      <div class="emailsentdetail">Change password link has been sent to your email</div>
    </div>
  </div>
  <div class="profilesecuritycontainer">
  <div class="nav">
      <div class="navbg"></div>
      <img src="/images/logo.png" class="logo">
  </div>
  <div class="mainEditProfileCointainer">
    <div class="menuEditProfile">
      <ul class="editMenu">
        <li class="styleLi"><a href="/profilebusiness" class="notselectedMenu">Profile</a></li>
		    <li class="styleLi"><a href="/profilebusiness/security" class="selectedMenu">Security</a></li>
	    </ul>
    </div>
    <div class="detailEditProfile">
    <img class="lockicon" src="/images/lock.png">
      <div class="emailtitle">Email</div>
      <div class="editemail">{{$business_email}}</div>
      <div class="passwordchangecontainer">
        <div class="passwordtitle">Change Password ?</div>
        <div style="color: grey;">if you want to change your password, you must access your email</div>
        <div class="changepasswordbutton">CHANGE PASSWORD</div>
      </div>
    </div>
    </div>
</body>
    <script>
    $(document).ready(function(){
      $(".changepasswordbutton").click(function(){
        $(".emailoverlay").fadeIn();
      });
      $(".emailoverlay").click(function(){
        $(".emailoverlay").fadeOut();
      });
    });
    </script>
    </html>