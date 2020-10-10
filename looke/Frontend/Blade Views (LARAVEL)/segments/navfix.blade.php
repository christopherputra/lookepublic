<div class="nav">
@include("segments.nav")
</div>
@if(session("type"))
    <div class="overlaynav">
    </div>
    <script>
        $(document).ready(function(){
             $(".navprofile").click(function(){
                $(".navmenus").fadeToggle(200);
                $(".overlaynav").fadeToggle(200);
            });
            $(".overlaynav").click(function(){
                $(".navmenus").fadeOut(100);
                $(".overlaynav").fadeOut(100);
            });
        });
    </script>
@endif