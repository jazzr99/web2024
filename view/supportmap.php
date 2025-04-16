<h2>Χάρτης Διασώστη</h2>



<div class="col-md-6">
<div id="map" style="width:100%; height:80vh"></div>

</div>



<div class="col-md-6">
<table class="table">
    <tr><th>Id</th><th>Type</th><th>User</th><th>Item</th><th>Qty</th><th>Qty_on_support</th><th>Status</th><th>Action</th></tr>
    <tbody id=data1>


    </tbody>

</table>

</div>

<script>




$.post("index.php?page=getMapSupportData",{},(res)=>
{
    res=JSON.parse(res);
    console.log(res);
    var map = L.map('map').setView([res.admin.lat, res.admin.lot], 14);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);
    
    var adminIcon = L.icon({ iconUrl: 'https://maps.google.com/mapfiles/kml/shapes/homegardenbusiness.png',
        iconSize:     [30, 30], // size of the icon
    });

    var supportIcon = L.icon({ iconUrl: 'https://maps.google.com/mapfiles/kml/shapes/horsebackriding.png',
        iconSize:     [30, 30], // size of the icon
    });


    var aitimaWait = L.icon({ iconUrl: 'https://maps.google.com/mapfiles/kml/paddle/pause.png',
        iconSize:     [30, 30], // size of the icon
    });

    var prosforaWait = L.icon({ iconUrl: 'https://maps.google.com/mapfiles/kml/paddle/grn-circle.png',
        iconSize:     [30, 30], // size of the icon
    });

    var aitimaAnath = L.icon({ iconUrl: 'https://maps.google.com/mapfiles/kml/paddle/ylw-diamond.png',
        iconSize:     [30, 30], // size of the icon
    });

    var prosforaAnath = L.icon({ iconUrl: 'https://maps.google.com/mapfiles/kml/paddle/go.png',
        iconSize:     [30, 30], // size of the icon
    });
    var p1=new L.LatLng(res.admin.lat,res.admin.lot);
    var p2=new L.LatLng(res.support.lat,res.support.lot);
    var d=map.distance(p1,p2);

    
    cnt="Support: "+res.support.username+"<br>";
    if(d<100) cnt+="<button onclick='fortosi()'>Φόρτωση</button> <button onclick='ekfortosi()'>Εκφόρτωση</button>";

    var marker1 = L.marker([res.admin.lat, res.admin.lot], {icon: adminIcon}).addTo(map);

    var marker2 = L.marker([res.support.lat, res.support.lot], {icon: supportIcon, draggable:'true'}).addTo(map).bindPopup(cnt);

    marker2.on('dragend', function(event){
                var marker = event.target;
                var position = marker.getLatLng();
               $.post("index.php?page=updateSupportPlace",{lat:position.lat, lot:position.lng},(res)=>{
                    window.location.href="index.php?page=supportmap";

               });
        });

    
    for (i=0;i<res.aitimata_wait.length;i++)
    {
        usr=res.aitimata_wait[i].user_detail;
        itm=res.aitimata_wait[i].item_detail;


        cnt=`Fullname:${usr.fullname}, Phone:${usr.phone}, Item:${itm.name}, Qty:${res.aitimata_wait[i].qty}<br>
            <button onclick='anathesi(${res.aitimata_wait[i].id})'>Ανάθεση</button> `;

        var marker3 = L.marker([res.aitimata_wait[i].user_detail.lat, res.aitimata_wait[i].user_detail.lot], {icon: aitimaWait}).addTo(map).bindPopup(cnt);
    }

    for (i=0;i<res.prosfores_wait.length;i++)
    {
        usr=res.prosfores_wait[i].user_detail;
        itm=res.prosfores_wait[i].item_detail;
        cnt=`Fullname:${usr.fullname}, Phone:${usr.phone}, Item:${itm.name}, Qty:${res.prosfores_wait[i].qty}<br>
            <button onclick='anathesi(${res.prosfores_wait[i].id})'>Ανάθεση</button> `;
        var marker4 = L.marker([res.prosfores_wait[i].user_detail.lat, res.prosfores_wait[i].user_detail.lot], {icon: prosforaWait}).addTo(map).bindPopup(cnt);
    }
    
  
    for (i=0;i<res.aitimata_anath.length;i++)
    {
        usr=res.aitimata_anath[i].user_detail;
        itm=res.aitimata_anath[i].item_detail;
        cnt=`Fullname:${usr.fullname}, Phone:${usr.phone}, Item:${itm.name}, Qty:${res.aitimata_anath[i].qty}<br>`;
        p2=new L.LatLng(res.support.lat,res.support.lot);

        var p1=new L.LatLng(usr.lat,usr.lot);
        var p2=new L.LatLng(res.support.lat,res.support.lot);
        var d2=map.distance(p1,p2);
        cc=`<button onclick='akyrosi(${res.aitimata_anath[i].id})'>Ακύρωση</button>`;
        if(d2<50) cc=`<button onclick='oloklirosi(${res.aitimata_anath[i].id})'>Ολοκλήρωση</button>
                    <button onclick='akyrosi(${res.aitimata_anath[i].id})'>Ακύρωση</button>`;

        $("#data1").append(`<tr><td>${res.aitimata_anath[i].id}</td>
                                <td>${res.aitimata_anath[i].type}</td>
                                <td>${usr.fullname} ${usr.phone}</td>
                                <td>${itm.name}</td>
                                <td>${res.aitimata_anath[i].qty}</td>
                                <td>${res.aitimata_anath[i].qty_sup}</td>
                                <td>${res.aitimata_anath[i].status}</td>
                                <td>${cc}</td></tr>`);

                                
                                var pointList = [p1,p2];

                                var polyline1 = new L.Polyline(pointList);
                                polyline1.addTo(map);
        var marker3 = L.marker([res.aitimata_anath[i].user_detail.lat, res.aitimata_anath[i].user_detail.lot], {icon: aitimaAnath}).addTo(map).bindPopup(cnt);
    }

    for (i=0;i<res.prosfores_anath.length;i++)
    {
        console.log(res.prosfores_anath[i]);
        usr=res.prosfores_anath[i].user_detail;
        itm=res.prosfores_anath[i].item_detail;
        cnt=`Fullname:${usr.fullname}, Phone:${usr.phone}, Item:${itm.name}, Qty:${res.prosfores_anath[i].qty}<br>`;


        var p1=new L.LatLng(usr.lat,usr.lot);
        var p2=new L.LatLng(res.support.lat,res.support.lot);
        var d2=map.distance(p1,p2);
        cc=`<button onclick='akyrosi(${res.prosfores_anath[i].id})'>Ακύρωση</button>`;
        if(d2<50) cc=`<button onclick='oloklirosi(${res.prosfores_anath[i].id})'>Ολοκλήρωση</button>
                    <button onclick='akyrosi(${res.prosfores_anath[i].id})'>Ακύρωση</button>`;

        $("#data1").append(`<tr><td>${res.prosfores_anath[i].id}</td>
                                <td>${res.prosfores_anath[i].type}</td>
                                <td>${usr.fullname} ${usr.phone}</td>
                                <td>${itm.name}</td>
                                <td>${res.prosfores_anath[i].qty}</td>
                                <td>${res.prosfores_anath[i].qty_sup}</td>
                                <td>${res.prosfores_anath[i].status}</td>
                                <td>${cc}</td></tr>`);

        
                                
                                var pointList = [p1,p2];

                                var polyline1 = new L.Polyline(pointList);
                                polyline1.addTo(map);
        var marker4 = L.marker([res.prosfores_anath[i].user_detail.lat, res.prosfores_anath[i].user_detail.lot], {icon: prosforaAnath}).addTo(map).bindPopup(cnt);
    }


});


function anathesi(id)
{
   $.post("index.php?page=anathesi",{ida:id},(res)=>{
    if(res==1){
            alert("Η ανάθεση έγινε");
            window.location.href='index.php?page=supportmap';
        }
        else
        {
            alert("Η ανάθεση δεν έγινε. Πιθανόν έχετε πάνω από 4 αναθέσεις ");
            window.location.href='index.php?page=supportmap';
        }
   })
}



function fortosi()
{
   
   $.post("index.php?page=fortosi",{},(res)=>{
    if(res==1){
            alert("Η Φόρτωση έγινε");
            window.location.href='index.php?page=supportmap';
        }
        else
        {
            alert("Λάθος στην φόρτωση ");
            window.location.href='index.php?page=supportmap';
        }
   })
}


function ekfortosi()
{
   $.post("index.php?page=ekfortosi",{},(res)=>{
    if(res==1){
            alert("Η εκφόρτωση έγινε");
            window.location.href='index.php?page=supportmap';
        }
        else
        {
            alert("Η εκφόρτωση δεν έγινε");
            window.location.href='index.php?page=supportmap';
        }
   })
}

function akyrosi(id)
{
   $.post("index.php?page=akyrosi",{ida:id},(res)=>{
   
    if(res==1){
            alert("Η ακύρωση έγινε");
            window.location.href='index.php?page=supportmap';
        }
        else
        {
            alert("Λάθος στην ακύρωση ");
            window.location.href='index.php?page=supportmap';
        }
   })
}


function oloklirosi(id)
{
   $.post("index.php?page=oloklirosi",{ida:id},(res)=>{
   
    if(res==1){
            alert("Η διαδικασία Ολοκληρώθηκε έγινε");
            window.location.href='index.php?page=supportmap';
        }
        else
        {
            alert("Λάθος στην ολοκλήρωση ");
            window.location.href='index.php?page=supportmap';
        }
   })
}
</script>



