<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Signup Seller | Looke</title>
  @include("segments.link")
</head>
<body>
  <div class="nav">
      <div class="navbg"></div>
      <img src="/images/logo.png" class="logo">
  </div>
	<div class="businessSignupTitle">Business Account</div>
  <form method="post" action="/signupbusiness" class="mainSellerRegistCointainer" enctype="multipart/form-data">
      @csrf 
      @if(!$errors->isEmpty())
      <div class="errors">
        ERROR: <br>
        @foreach ($errors->all() as $error)
               {{ $error }}
            @endforeach
      </div>
      @endif
      <div class="sellerImageForm">
        <div class="productpicturegradient">
            <div class="productpictureblack">
                <div class="productpicturecut">
                    <img src="/images/defaultpict_business.png" class="productpicture">
                    <div class="uploadfilecontainer">
										  <div class="uploadproductcontainer">UPLOAD</div>
										  <input type="file" class="filebutton" name="image">
									  </div>
                </div>
            </div>
        </div>
      </div>
      <div class="formFillContainer">
        <div class="formfiller">Brand Identity</div>
        <ul class="questionContainer">
          <li class="formfield"><input type="text" class="formfieldInput" placeholder="brand name" name="business_name" value="{{old('business_name')}}"></li>
          <li class="formfield"><input type="email" class="formfieldInput" placeholder="email@domain.com" name="business_email" value="{{old('business_email')}}"></li>
          <li class="formfield"><input type="password" class="formfieldInput" placeholder="password"  name="business_password" value="{{old('business_password')}}"></li>
        </ul>
        <div class="formfiller">Supporting Data</div>
        <ul class="questionContainer">
          <li class="formfield"><input type="phone" class="formfieldInput" placeholder="+62" name="business_telephone" value="{{old('business_telephone')}}"></li>
          <li class="formfield"><input type="text" class="formfieldInput" value="Indonesia" placeholder="Indonesia" disabled></li>
          <li class="formfield"><input type="text" class="formfieldInput" value="Jakarta" placeholder="Jakarta" disabled></li>
          <li class="formfield"><input type="text" class="formfieldInput" placeholder="full address, number" name="business_address" value="{{old('business_address')}}"></li>
          <li class="formfield"><input type="text" class="formfieldInput" placeholder="apparell, foods & beverage" name="business_field" value="{{old('business_field')}}"></li>
      </div>
      <div class="formDetailContainer">
        <div class="formtitle">Brand Identity</div>
        <ul class="questionContainer">
          <li class="formquest">Brand</li>
          <li class="formquest">Email</li>
          <li class="formquest">Password</li>
        </ul>
        <div class="formtitle">Supporting Data</div>
        <ul class="questionContainer">
          <li class="formquest">Telephone</li>
          <li class="formquest">Country</li>
          <li class="formquest">Province</li>
          <li class="formquest">Address</li>
          <li class="formquest">Field</li>
        </ul>
      </div>
      <div class="createContainerSeller">
        <input type="submit" class="createbutton" value="CREATE">
        <div class="termcondition2">By creating this account, you are agree to our <span class="termcolor">Term & Conditions</span></div>
      </div>
</form>
</body>
<script>
	$(document).ready(function(){
		function readURL(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();
					
					reader.onload = function(e) {
					$(".productpicture").attr('src', e.target.result);
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
