<?php $this->assign('title', 'About us - '.$maintitle);?>

<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li>
				<?= $this->Html->link('Home','/');?>
			</li>
			<li class="active">
        <?= 'About us' ?>
			</li>
		</ol>
	</div>
</div>

<div class="container-fluid ">
  <div class="col-md-4">
    <article>
      <h1>Adress and contacts</h1>
      <address>
        <strong>MuzInterior</strong><br>
        Online interior store <br>
        We are heading in <b>Latvia</b>, Riga<br>
        Iluksties iela<br>
        <abbr title="Phone">P:</abbr> +371 20361226 <br>
        <abbr title="Email"><span class="glyphicon glyphicon-envelope"></span></abbr> contact@muzinterior.lv
      </address>
    </article>
  </div>
  <div class="col-md-8">
    <article>
      <h1>About us</h1>
			<h4>We are selling our production not only to the Latvia! We are doing it for all baltic states: Estonia, Lithuania too!</h4>
      <h4>MuzInterior is a homemade interior online store which offers furniture, interior decors and gifts.</h4>
      <h5>In production process we try to use natural ingredients and materials</h5>
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
