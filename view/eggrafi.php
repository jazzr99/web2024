<form id=form1 >
<div class='col-md-6'>

    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" id="username" name="username" required>
    </div>
    <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="pwd" name="password" required>
    </div>

    <div class="form-group">
        <label for="fullname">Fullname:</label>
        <input type="text" class="form-control" id="fullname" name="fullname" required>
    </div>


    <div class="form-group">
        <label for="phone">Phone:</label>
        <input type="text" class="form-control" id="phone" name="phone" required>
    </div>

    
    <div class="form-group">
        <label for="email">email:</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>

    <div class="form-group">
        <label for="lat">Latitude:</label>
        <input type="text" class="form-control" id="lat" name="lat" required>
    </div>
    <div class="form-group">
        <label for="lot">Longitude:</label>
        <input type="text" class="form-control" id="lot" name="lot" required>
    </div>

    <input type="hidden" name="type" value="user">

    <button type="submit" class="btn btn-default">Submit</button>
    
</div>
<div class=col-md-6>
<div id="map" class="map1"></div>



</div>
</form>


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

    $.post("index.php?page=adduser",$("#form1").serialize(),(result)=>{
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