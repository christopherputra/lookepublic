<!DOCTYPE html>
<html>
<head>
    <title>My Offers | Looke</title>
    @include("segments.link")
</head>
<body class="homebody">
        @include("segments.navfix")
    <div class="confirmationoverlay">
        <div class="confirmationclose"></div>
        <div class="instaembedcontainer">
            <iframe class="instagram-media instagram-media-rendered" id="instagram-embed-0" src="https://www.instagram.com/p//embed/captioned/?cr=1&amp;v=12&amp;wp=1316&amp;rd=https%3A%2F%2Fwww.instagram.com&amp;rp=%2Fdeveloper%2Fembedding%2F#%7B%22ci%22%3A0%2C%22os%22%3A1919.8550000000978%2C%22ls%22%3A1910.2700000003097%2C%22le%22%3A1911.8349999989732%7D" allowtransparency="true" allowfullscreen="true" frameborder="0" height="1078" data-instgrm-payload-id="instagram-media-payload-0" scrolling="yes" style="background: white; max-width: 658px; width: calc(100% - 2px); border-radius: 3px; border: 1px solid rgb(219, 219, 219); box-shadow: none; display: block; margin: 0px 0px 12px; min-width: 326px; padding: 0px;"></iframe>
        </div>
        <div class="confirmationcontainer">
            <div class="confirmationtitle">Confirm this order?</div>
            <form method="post" class="confirmform">
                @csrf
                <input type="hidden" name="id" class="confirmid" value="">
                <input type="submit" value="CONFIRM" class="confirmfinalbutton">
            </form>
            <div class="complaincontainer">
                <form class="complainform">
                    <div class="complainhint">What's wrong?</div>
                    <textarea class="complaininput" placeholder="Write down your complaints"></textarea>
                </form>
                <div class="complainbutton">COMPLAIN</div>
            </div>
        </div>
    </div>
    <div class="offeredbodycontainer">
        <div class="offeredtitle">Your Offering</div>
        <div class="offeredcontainer">
            @if(count($offerings)>3)
            <div class="offeredmore"><div class="offeredshowbutton">Show more</div></div>
            @elseif(count($offerings)==0)
            <div class="emptytag">There are no offers</div>
            @endif
                @foreach($offerings as $offering)
                <div class="offered">
                    <div class="offersproductpictureblack">
                        <div class="productpicturecut">
                            <img src="{{App\Cast::image($offering->offer_image,3)}}" class="productpicture">
                        </div>
                        <div class="productinfluencerimagegradient">
                            <div class="influencerimageblack">
                                <div class="influencerimagecut">
                                    <img src="{{App\Cast::image($offering->influencer_image,1)}}" class="influencerimage">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="offersstatus">OFFERING</div>
                    <div class="offereddetailcontainer">
                        <div class="offeredhead">
                            <div class="offeredname">{{strtoupper($offering->influencer_name)}}</div>
                        </div>
                        <div class="takendetail">{{$offering->description}}</div>
                        <div class="takenbottom">
                            <div class="takenprice">${{$offering->price}}</div>
                            <div class="takenexpire whitefont">{{date("d M Y",strtotime($offering->post_date))}}</div>
                            <div class="takenexpire">expiring in {{App\Cast::expire($offering->expiration_date)}}</div>
                        </div>
                    </div>
                </div>
                @endforeach
        </div>
        <div class="offeredtitle">In Progress</div>
        <div class="offeredcontainer">
            @if(count($inprogresses) + count($confirmations)>3)
            <div class="offeredmore"><div class="offeredshowbutton">Show more</div></div>
            @elseif(count($inprogresses) + count($confirmations)==0)
            <div class="emptytag">There are no offers</div>
            @endif
            @foreach($confirmations as $confirmation)
            <div class="offered">
                    <div class="offersproductpictureblack">
                        <div class="productpicturecut">
                            <img src="{{App\Cast::image($confirmation->offer_image,3)}}" class="productpicture">
                        </div>
                        <div class="productinfluencerimagegradient">
                            <div class="influencerimageblack">
                                <div class="influencerimagecut">
                                    <img src="{{App\Cast::image($confirmation->influencer_image,1)}}" class="influencerimage">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="offersstatus">CONFIRMATION</div>
                <div class="offereddetailcontainer">
                    <div class="offeredhead">
                        <div class="offeredname">{{strtoupper($confirmation->influencer_name)}}</div>
                    </div>
                    <div class="takendetail">{{$confirmation->description}}</div>
                    <div class="takenbottom">
                        <div class="takenprice">${{$confirmation->price}}</div>
                        <div class="confirmationbutton" id="{{$confirmation->offer_id}}">CONFIRM</div>
                        <div class="confirmexpire">confirmed in {{App\Cast::expire($confirmation->confirmation_date)}}</div>
                    </div>
                </div>
            </div>
            @endforeach
            @foreach($inprogresses as $inprogress)
            <div class="offered">
                <div class="offersproductpictureblack">
                    <div class="productpicturecut">
                        <img src="{{App\Cast::image($inprogress->offer_image,3)}}" class="productpicture">
                    </div>
                    <div class="productinfluencerimagegradient">
                        <div class="influencerimageblack">
                            <div class="influencerimagecut">
                                <img src="{{App\Cast::image($inprogress->influencer_image,1)}}" class="influencerimage">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="offersstatus">POSTING</div>
                <div class="offereddetailcontainer">
                    <div class="offeredhead">
                        <div class="offeredname">{{strtoupper($inprogress->influencer_name)}}</div>
                    </div>
                    <div class="takendetail">{{$inprogress->description}}</div>
                    <div class="takenbottom">
                        <div class="takenprice">${{$inprogress->price}}</div>
                        <div class="takenexpire whitefont">{{date("d M Y",strtotime($inprogress->post_date))}}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="offeredtitle">Finished Offers</div>
        <div class="finishedcontainer">
            <div class="finishedright"><img src="images/right.png" class="rightfinished"></div>
            <div class="finisheds">
                @foreach($finisheds as $finished)
                <div class="finished">
                    <div class="finishedoffersproductpictureblack">
                        @if($finished->status == 3 || $finished->status == 2)
                        <div class="productpicturecut">
                        @else
                        <div class="productpicturecut canceled">
                        @endif
                            <img src="{{App\Cast::image($finished->offer_image,3)}}" class="productpicture">
                        </div>
                        <div class="productinfluencerimagegradient">
                            <div class="influencerimageblack">
                                <div class="influencerimagecut">
                                    <img src="{{App\Cast::image($finished->influencer_image,1)}}" class="influencerimage">
                                </div>
                            </div>
                        </div>
                    </div>
                        @if($finished->status == 3 || $finished->status == 2)
                        <div class="finishedoffersdate">Confirmed</div>
                        @else
                        <div class="finishedoffersdate canceled">Canceled</div>
                        @endif
                </div>
                @endforeach
            </div>
        </div>
    </div>
        <div class="footer">
            <img src="images/logo.png" class="logofooter">
            <div class="footermenus">
                <div class="footermenu">About</div>
                <div class="footermenu">Help & Support</div>
                <div class="footermenu">Terms & Conditions</div>
                <div class="footermenu">Privacy & Policy</div>
            </div>
            <div class="socialmedias">
                <img src="images/facebook.png" class="socialmedia">
                <img src="images/twitter.png" class="socialmedia">
                <img src="images/instagram.png" class="socialmedia">
            </div>
            <div class="copyrights">&copy; Looke all rights reserved</div>
        </div>
    </body>
    <script src="https://unpkg.com/scrollreveal@4"></script>
    <script>
        $(document).ready(function(){
        ScrollReveal().reveal('.offered',{delay:250,origin:'right',distance:"50px"});
        ScrollReveal().reveal('.finished',{delay:250,rotate: {y: 20}});
            $(".finisheds").width($(".finished").length*280);
            left = 0;
            $(".rightfinished").click(function(){
                if($(".finisheds").width() - left > $(".finishedcontainer").width()-280){
                    left += 280;
                    $(".finisheds").animate({"margin-left":"-"+left+"px"});
                }
                else{
                    console.log("max");
                }
            });
            $(".confirmationclose").click(function(){
                $(".confirmationoverlay").fadeOut(function(){
                    $(".complainform").hide();
                    $(".complainbutton").removeClass("complainbuttonactive");
                });
                    $(".instaembedcontainer").animate({"opacity":"0","margin-top":"250px"});
            });
            $(".confirmationbutton").click(function(){
                $(".confirmationoverlay").fadeIn(function(){
                    $(".instaembedcontainer").animate({"opacity":"1","margin-top":"200px"});
                });
            });
            $(".complainbutton").click(function(){
                $(".complainform").slideDown(function(){
                    $(".complainbutton").addClass("complainbuttonactive");
                });
            });
            $(".confirmationbutton").click(function(){
                var id = $(this).attr("id");
                $.ajax({
                    url: "/getproof",
                    type: "GET",
                    data: {"id":id},
                    success: function(data){
                        if(data != "error"){
                            $(".confirmid").val(id);
                            $(".instagram-media").attr("src","https://www.instagram.com/p/"+data+"/embed/captioned/?cr=1&amp;v=12&amp;wp=1316&amp;rd=https%3A%2F%2Fwww.instagram.com&amp;rp=%2Fdeveloper%2Fembedding%2F#%7B%22ci%22%3A0%2C%22os%22%3A1919.8550000000978%2C%22ls%22%3A1910.2700000003097%2C%22le%22%3A1911.8349999989732%7D");
                        }
                        else{
                            window.location.href = "";
                        }
                    }
                });
            });
            $(".confirmform").submit(function(e){
                e.preventDefault();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "/confirmoffer",
                    type: "POST",
                    data: $(this).serialize(),
                    success: function(data){
                        if(data == "success"){
                            $(".confirmfinalbutton").addClass("confirmedfinalbutton");
                            $(".complainbutton").fadeOut();
                            $(".confirmationoverlay").delay(500).fadeOut(function(){
                                window.location.href = "";
                            });
                        }
                    }
                });
            });
        });
    </script>
</html>