<?php 	
	require_once('include/bootstrap.php');

	if (!empty($_POST)) {

		if ( $_POST['name'] != '' && 
			$_POST['email'] != '' && 
			$_POST['phone'] != '' &&
			$_POST['content'] != '') { 
		
			$contacts = new Contacts($db_connection);
			$addContact = new DBContacts($db_connection);
			$addContact->name = $_POST['name'];
			$addContact->email = $_POST['email'];
			$addContact->phone = $_POST['phone'];
			$addContact->content = $_POST['content'];
			$contacts->add($addContact);


		}
	} 
	require_once('include/header.php');
?>
			<section id="contact">
				<address>
					<p>
						GSM: +359-32-260-994 
					</p>
					<p>
						fax: +359-32-260-994
					</p> 
					<p>
						phone: +359-988-910-820
					</p> 
					<p>
					e-mail: asdasd@abv.bg 
					</p>
					<p>
						skype: tasaasdasdaasd2to26 
					</p>
					<p>
						address: city - Plovdiv, st. "Kniaz Aleksander 1st", No. 35, fl. 2
					</p>
				</address>

				<form action="" id="contactForm" method="post">	
				<h2>Contact Form</h2>
				<div id="successResult"></div>
					<p class="name">
						<label for="name">Name</label>
						<input type="text" name="name" id="name" placeholder="Enter your name here..." />
					</p>	
					<p class="email">
						<label for="email">Email</label>
						<input type="text" name="email" id="email" placeholder="Enter your email here..." />
					</p>	
					<p class="phone">
						<label for="phone">Phone</label>
						<input type="text" name="phone" id="phone" placeholder="Enter your phone here..." />
					</p>		
					<p class="text">
						<label for="text">Contact Us</label>
						<textarea name="text" placeholder="Write something to us" id="text"/></textarea>
					</p>	
					<p>
						<button type="reset" id="myButton">Send</button>
					</p>
				</form>
				<script type="text/javascript" src="http://maps.google.com/maps/api/js?v=3&sensor=false"></script>
					<div id="gmap_canvas" style="height:470px; float: left; width:400px;"></div><style type="text/css" media="screen">#gmap_canvas img{max-width:none !important;background:none !important;}.gm-style-iw span{height:auto !important;display:block;white-space:nowrap;overflow:hidden !important;}.gm-style-iw strong{font-weight:400;}.map-data{ position:absolute;top:-1668px;}.gm-style-iw{ height:auto !important;color:#000000;display:block;white-space:nowrap;width:auto !important;line-height:18px;overflow:hidden !important;}</style><iframe id="data" src="http://www.addmap.org/maps.php" class="map-data"></iframe><a id="get-map-data" 		href="http://www.gutscheinportal.com/5-eur-ernstings-family-gutschein/"class="map-data">seite</a><script type="text/javascript">function init_map(){ var myOptions={zoom:14, center: new google.maps.LatLng (42.159318,24.745250599999963), mapTypeId: google.maps.MapTypeId.SATELLITE}; map = new google.maps.Map (document.getElementById("gmap_canvas"), myOptions); marker = new google.maps.Marker({map: map, position: new google.maps.LatLng (42.159318,24.745250599999963)}); infowindow = new google.maps.InfoWindow ({content:"<span style='height:auto !important; display:block; white-space:nowrap; overflow:hidden !important;'><strong style='font-weight:400;'>M&L T-Shirts</strong><br>bul. Bulgaria 120<br> Plovdiv</span>" }); google.maps.event.addListener (marker, "click", function(){ infowindow.open(map,marker);}); infowindow.open(map,marker);} google.maps.event.addDomListener (window, "load", init_map);
				</script>
				<script>
					$(document).ready(function(){
						$('#myButton').click(function(){
							$('#successContact').css('display', 'block');
							$('#successResult').append('<h1>Thanks For Contacting Us</h1>');
							$.ajax({
				                url: 'contact.php',
				                type: 'POST',
				                data: {
				                    'name': $('#name').val(),
				                    'email': $('#email').val(),
				                    'phone': $('#phone').val(),
				                    'content': $('#text').val()
				                },
				                success: function(data) {
				                	alert('Thanks For Contacting Us');
				                }
            				});
						});
					});
				</script>
				<style>
					#successResult h1{
						font-size: 20px;
						color: #fff;
						margin: 20px;
						text-align: center;
					}
				</style>
			</section>
<?php require_once('include/footer.php'); ?>

