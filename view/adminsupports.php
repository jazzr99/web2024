<h2>Δημιουργία Διασώστη</h2>
<form id=form1>
<div class='col-md-6'>

    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" id="username" name="username" required>
    </div>
    <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="pwd" name="password" required>
    </div>

    
        <input type="hidden" class="form-control" id="fullname" name="fullname" value="">
    
        <input type="hidden" class="form-control" id="phone" name="phone" value="">
       
        <input type="hidden" class="form-control" id="email" name="email" value="" >
   

    <div class="form-group">
        <label for="lat">Latitude:</label>
        <input type="text" class="form-control" id="lat" name="lat" required>
    </div>
    <div class="form-group">
        <label for="lot">Longitude:</label>
        <input type="text" class="form-control" id="lot" name="lot" required>
    </div>

    <input type="hidden" name="type" value="support">

    <button type="submit" class="btn btn-default">Submit</button>
    
</div>
<div class=col-md-6>
<div id="map" class="map1"></div>



</div>
</form>


<a href='index.php?page=adminlistsupports'>
<button class="btn btn-primary">Λίστα διασωστών</button>
</a>

<script>
var map = L.map('map').setView([38.24041473200545, 21.764962076507125], 13);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);


var marker = L.marker([38.24041473200545, 21.764962076507125]).addTo(map);

map.on('click', onMapClick);

function onMapClick(e) {
   map.removeLayer(marker);
   marker=L.marker(e.latlng).addTo(map);

   $("#lat").val(e.latlng.lat);
   $("#lot").val(e.latlng.lng);
   
}

$("#form1").submit(()=>{
    event.preventDefault();

    $.post("index.php?page=addsupport",$("#form1").serialize(),(result)=>{
        if(result=="true"){
            $("#msg").html("<div  class='alert alert-success'>O χρήστης δημιουργήθηκε</b>");
        }
        else
        {
            $("#msg").html("<div  class='alert alert-danger'>O χρήστης δεν δημιουργήθηκε. Πιθανά υπάρχει ήδη στην βάση με αυτό το Username</b>");
        }
    });




})
</script>