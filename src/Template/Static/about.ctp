<?php $this->assign('title', 'About - '.$maintitle);?>

<div class= "bg-about1">
  <div class="container-fluid text-center">
    <div class="row content">
      <article>
        <h1 class= "article-h1-black">CONTACTS</h1>
        <p class= "content-white">Alexey Muzichenko: almuz@inbox.lv</p>
      </article>
    </div>
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
