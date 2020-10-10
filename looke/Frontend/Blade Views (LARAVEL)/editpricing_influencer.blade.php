<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Edit Profile | Looke</title>
	@include("segments.link")
</head>
<body>
  <div class="nav">
      <div class="navbg"></div>
      <img src="/images/logo.png" class="logo">
  </div>
<div class="addpriceoverlay">
	<div class="closepriceoverlay"></div>
	<div class="addasrecommendation">
				<div class="priceconfirmbox">
					<div class="pricepinnedboxnumber" id="confirmationprice">${{$recommended->price}}</div>
					<div class="priceboxdetails">
						<div class="priceboxtime" id="confirmationduration"><img src="/images/sun.png" class="sunicon">{{$recommended->duration_days}} days</div>
						<div class="priceboxtype" id="confirmationtype">{{App\Cast::pricetype($recommended->price_type)}}</div>
					</div>
				</div>
		<div class="recommendationconfirm"><div>Set this as the recommendation package?</div>
			<input type="submit" class="confirmbutton" value="YES"><div class="cancelconfirmbutton">NO</div>
		</div>
	</div>
</div>
<div class="removepriceoverlay">
	<div class="closeremovepriceoverlay"></div>
	<div class="addasrecommendation">
				<div class="priceregulerremovebox">
					<div class="priceregulerboxnumber" id="removeprice">${{$recommended->price}}</div>
					<div class="priceboxdetails">
						<div class="priceboxtime" id="removeduration"><img src="/images/sun.png" class="sunicon">{{$recommended->duration_days}} days</div>
						<div class="priceboxtype" id="removetype">{{App\Cast::pricetype($recommended->price_type)}}</div>
					</div>
				</div>
		<div class="recommendationconfirm"><div>Do you want to remove this package?</div>
			<input type="submit" class="confirmbuttonremove" value="YES"><div class="cancelremovebutton">NO</div>
		</div>
	</div>
</div>
  <div class="mainEditProfileCointainer">
    <div class="menuEditProfile">
      <ul class="editMenu">
        <li class="styleLi"><a href="/profile" class="notselectedMenu">Profile</a></li>
        <li class="styleLi"><a href="/profile/pricing" class="selectedMenu">Pricing</a></li>
		<li class="styleLi"><a href="/profile/security" class="notselectedMenu">Security</a></li>
	  </ul>
    </div>
    <div class="detailEditProfile">
			<div class="pricecontainerGrid">
				<div class="addnewprice">
					<form class="addnewpriceform">
						@csrf
						<input type="hidden" class="pricetype" name="price_type" value="">
						<div class="dollarsign">$</div>
						<input type="text" class="priceregulerboxnumberinput" placeholder="0" name="price">
						<div class="priceboxdetailsinput">
								<div style="width: 100%;"><div class="selectposttype" id="1">instagram post</div><div class="selectposttype" id="2">instagram story</div></div>
								<div class="priceboxtime"><img src="/images/sun.png" class="sunicon"><input type="number" class="daysinput" placeholder="0" name="duration"> days</div>
						</div>
						<input type="submit" value="ADD" class="addpricebutton">
					</form>
						<div class="addprice">+</div>
				</div>
				<div class="pricepinnedbox">
					<div class="pricepinnedboxnumber">${{$recommended->price}}</div>
					<div class="priceboxdetails">
						<div class="priceboxtime"><img src="/images/sun.png" class="sunicon">{{$recommended->duration_days}} days</div>
						<div class="priceboxtype">{{App\Cast::pricetype($recommended->price_type)}}</div>
					</div>
				</div>
			</div>
			<div class="pricecontainerGrid">
				@foreach($prices as $price)
				<div class="priceregulerbox">
						<div class="priceregulerboxnumber" id="price{{$price->price_id}}">${{$price->price}}</div>
						<div class="priceboxdetails">
								<div class="priceboxtime" id="duration{{$price->price_id}}"><img src="/images/sun.png" class="sunicon">{{$price->duration_days}} days</div>
								<div class="priceboxtype" id="type{{$price->price_id}}">{{App\Cast::pricetype($price->price_type)}}</div>
						</div>
						<div class="deletebutton" id="{{$price->price_id}}">
							<img class="trashicon" src="/images/trashicon.png">
						</div>
						<div class="pinnedbutton" id="{{$price->price_id}}">
							<img class="pinnedicon" src="/images/starstroke.png">
						</div>
				</div>
				@endforeach
			</div>
      <div class="cancelorsave">
        <input type="submit" class="savebutton" value="SAVE">
        <input type="submit" class="cancelbutton" value="CANCEL">
      </div>
	</div>
</body>
<script>
	$(document).ready(function(){
		$(".addprice").click(function(){
			$(this).fadeOut(function(){
				$(".addnewpriceform").slideDown();
			});
		});
		$(".selectposttype").click(function(){
			$(".selected").removeClass("selected");
			$(this).addClass("selected");
			$(".pricetype").val($(this).attr("id"));
		});
		$(".addnewpriceform").submit(function(e){
			e.preventDefault();
			$.ajax({
				headers: {
    				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  				},
				url: "/addprice",
				type: "POST",
				data: $(this).serialize(),
				success: function(data){
					if(data == "success"){
						window.location.href = "";
					}
				}
			});
		});
		$(".closepriceoverlay,.cancelconfirmbutton").click(function(){
			$(".addpriceoverlay").fadeOut();
		});
		$(".pinnedbutton").click(function(){
			var id = $(this).attr("id");
			$("#confirmationprice").html($("#price"+id).html());
			$("#confirmationduration").html($("#duration"+id).html());
			$("#confirmationtype").html($("#type"+id).html());
			$(".confirmbutton").attr("id",id);
			$(".addpriceoverlay").fadeIn();
		});
		$(".confirmbutton").click(function(){
			var id = $(this).attr("id");
			$.ajax({
				url: "/changerecommendation",
				type: "GET",
				data: {"id":id},
				success: function(data){
					if(data == "success"){
						window.location.href = "";
					}
				}
			});
		});
		$(".deletebutton").click(function(){
			$(".removepriceoverlay").fadeIn();
			var id = $(this).attr("id");
			$("#removeprice").html($("#price"+id).html());
			$("#removeduration").html($("#duration"+id).html());
			$("#removetype").html($("#type"+id).html());
			$(".confirmbuttonremove").attr("id",id);
		});
		$(".closeremovepriceoverlay,.cancelremovebutton").click(function(){
			$(".removepriceoverlay").fadeOut();
		});
		$(".confirmbuttonremove").click(function(){
			var id = $(this).attr("id");
			$.ajax({
				url: "/removeprice",
				type: "GET",
				data: {"id":id},
				success: function(data){
					if(data == "success"){
						window.location.href = "";
					}
				}
			});
		});
	});
</script>
</html>
