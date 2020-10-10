<!DOCTYPE html>
<html>
<head>
	<title>Welcome | Looke</title>
	@include("segments.link")
</head>
<body>
	<div class="welcomebody">
		<div class="welcomewidth">
			<div class="welcomecontainer">
				<div class="logocontainer"></div>
			    <div id="floor"></div>
				<div class="signinchoosecontainer">
					<span class="signinchoose" id="influencer">INFLUENCER</span>
					<span class="signinchoose" id="seller">SELLER</span>
				</div>
			</div>
			<div class="logincontainer" id="">
				<img src="images/logo.png" class="loginlogo">
				<form method="post" class="loginbox" autocomplete="off">
					@csrf
					<input type="email" class="logininput" placeholder="Email" name="email">
					<input type="password" class="logininput" placeholder="Password" name="password">
					<div class="signinerror"></div>
					<div class="signupask">Don't have an account? Signup <a class="yellowcolor">here</a></div>
					<input type="submit" class="loginbutton" value="LOGIN">
				</form>
			</div>
		</div>
	</div>
</body>
<script src="tilt.jquery.js"></script>
<script>
	$(document).ready(function(){
		console.log($(window).height());
		$(".loginbutton").hide();
		$(".logocontainer").fadeIn(1000);
		$("#floor").css({"border-bottom": $(window).height()*1.5+"px solid rgba(214, 32, 152, 0.7)"});
		$("#floor").animate({"left":"65%","opacity":"1"},700);

		$(".signinchoose").hide(function(){
			$(this).fadeIn(1000);
		});
		$(".signinchoose").click(function(){
			$(".loginbox").attr("id",$(this).attr("id"));
			$(".yellowcolor").attr("href","/signup/"+$(this).attr("id"));
			$(".welcomewidth").animate({"margin-left":"-100%"},function(){
				var delay = 0;
				$(".logininput").each(function(){
					$(this).delay(delay).animate({"opacity":"1","margin-top":"10px"});
					delay += 100;
				});
				$(".loginbutton").delay(200).fadeIn();
			});
		});
		$(".loginbox").submit(function(e){
			e.preventDefault();
			$.ajax({
				headers: {
    				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  				},
				url: "/signin"+$(this).attr("id"),
				type: "POST",
				data: $(this).serialize(),
				success: function(data){
					if(data == "success"){
						window.location.href = "/home";
					}
					else{
						$(".signinerror").html(data);
					}
				}
			});
		});
	});
</script>
</html>