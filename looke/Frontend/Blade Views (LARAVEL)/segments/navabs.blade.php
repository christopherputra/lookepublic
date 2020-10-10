<div class="navabs">
@include("segments.nav")
</div>

@if(session("type"))
    <script>
        $(document).ready(function(){
             $(".navprofile").click(function(){
                $(".navmenus").fadeToggle();
            });
        });
    </script>
@endif