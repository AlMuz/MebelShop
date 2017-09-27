<?php $this->assign('title', 'About us - '.$maintitle);?>

<!-- <form>
<legend><span class="glyphicon glyphicon-globe"></span> Our office</legend>
<address>
    <strong>Twitter, Inc.</strong><br>
    795 Folsom Ave, Suite 600<br>
    San Francisco, CA 94107<br>
    <abbr title="Phone">
        P:</abbr>
    (123) 456-7890
</address>
<address>
    <strong>Full Name</strong><br>
    <a href="mailto:#">first.last@example.com</a>
</address>
</form> -->


<div class="container-fluid text-center">
  <div class="row content">
    <article>
      <h1>About us</h1>
      <p>Alexey Muzichenko: almuz@inbox.lv</p>
    </article>
  </div>
</div>

<div id="googleMap" style="height:400px;" class="grey-map"></div>
  <script>
    function myMap() {
      myCenter=new google.maps.LatLng(56.955563, 24.210260); // Here position
      var mapOptions= {
        center:myCenter,
        zoom:12, scrollwheel: true, draggable: true,
        mapTypeId:google.maps.MapTypeId.ROADMAP
      };
      var map=new google.maps.Map(document.getElementById("googleMap"),mapOptions);
      var marker = new google.maps.Marker({
        position: myCenter,
      });
      marker.setMap(map);
    }
  </script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEDcbjRSc3QfcaKrL8NQfXxsLtxHKRnQg&callback=myMap"></script>
