<h2>Χάρτης Διαχειριστή</h2>



<div class="col-md-12">
    <select onchange='show()' id=filter1>
    <option value=0>Όλα</option>
    <option value=1>Αιτήματα σε αναμονή</option>
    <option value=2>Αιτήματα σε ανάθεση</option>
    <option value=3>Προσφορές σε αναμονή</option>
    <option value=4>Προσφορές σε ανάθεση</option>
</select>
<div id="map" style="width:100%; height:80vh"></div>

</div>





<script>

var map;
function show()
{
if(map!=null)
{
    map.off();
    map.remove();
}
$.post("index.php?page=getMapAdminData",{},(res)=>
{

    var ff=$("#filter1").val();
    res=JSON.parse(res);
    
    map = L.map('map').setView([res.admin.lat, res.admin.lot], 14);
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
    var marker1 = L.marker([res.admin.lat, res.admin.lot], {icon: adminIcon,draggable:'true'}).addTo(map);
    marker1.on('dragend', function(event){
                var marker = event.target;
                var position = marker.getLatLng();
               $.post("index.php?page=updateAdminPlace",{lat:position.lat, lot:position.lng},(res)=>{
                    window.location.href="index.php?page=arxikimap";

               });
        });
    for (i=0;i<res.supports.length;i++)
    {
    
    cnt="Support: "+res.supports[i].username+"<br>";
   

    

    var marker2 = L.marker([res.supports[i].lat, res.supports[i].lot], {icon: supportIcon}).addTo(map).bindPopup(cnt);

    }

    if(ff==0 || ff==1)
    for (i=0;i<res.aitimata_wait.length;i++)
    {
        usr=res.aitimata_wait[i].user_detail;
        itm=res.aitimata_wait[i].item_detail;


        cnt=`Fullname:${usr.fullname}, Phone:${usr.phone}, Item:${itm.name}, Qty:${res.aitimata_wait[i].qty}<br>
            <button onclick='anathesi(${res.aitimata_wait[i].id})'>Ανάθεση</button> `;

        var marker3 = L.marker([res.aitimata_wait[i].user_detail.lat, res.aitimata_wait[i].user_detail.lot], {icon: aitimaWait}).addTo(map).bindPopup(cnt);
    }

    if(ff==0 || ff==3)
    for (i=0;i<res.prosfores_wait.length;i++)
    {
        usr=res.prosfores_wait[i].user_detail;
        itm=res.prosfores_wait[i].item_detail;
        cnt=`Fullname:${usr.fullname}, Phone:${usr.phone}, Item:${itm.name}, Qty:${res.prosfores_wait[i].qty}<br>
            <button onclick='anathesi(${res.prosfores_wait[i].id})'>Ανάθεση</button> `;
        var marker4 = L.marker([res.prosfores_wait[i].user_detail.lat, res.prosfores_wait[i].user_detail.lot], {icon: prosforaWait}).addTo(map).bindPopup(cnt);
    }
    
    if(ff==0 || ff==2)
    for (i=0;i<res.aitimata_anath.length;i++)
    {
        usr=res.aitimata_anath[i].user_detail;
        sup=res.aitimata_anath[i].support_detail;
        itm=res.aitimata_anath[i].item_detail;
        cnt=`Fullname:${usr.fullname}, Phone:${usr.phone}, Item:${itm.name}, Qty:${res.aitimata_anath[i].qty}<br>`;
  

        var p1=new L.LatLng(usr.lat,usr.lot);
        var p2=new L.LatLng(sup.lat,sup.lot);
                      
        var pointList = [p1,p2];

        var polyline1 = new L.Polyline(pointList);
        polyline1.addTo(map);
        var marker3 = L.marker([res.aitimata_anath[i].user_detail.lat, res.aitimata_anath[i].user_detail.lot], {icon: aitimaAnath}).addTo(map).bindPopup(cnt);
    }

    if(ff==0 || ff==4)
    for (i=0;i<res.prosfores_anath.length;i++)
    {
        console.log(res.prosfores_anath[i]);
        usr=res.prosfores_anath[i].user_detail;
        sup=res.prosfores_anath[i].support_detail;
        itm=res.prosfores_anath[i].item_detail;
        cnt=`Fullname:${usr.fullname}, Phone:${usr.phone}, Item:${itm.name}, Qty:${res.prosfores_anath[i].qty}<br>`;

        var p1=new L.LatLng(usr.lat,usr.lot);
        var p2=new L.LatLng(sup.lat,sup.lot);
                      
        var pointList = [p1,p2];

        var polyline1 = new L.Polyline(pointList);


                                polyline1.addTo(map);
        var marker4 = L.marker([res.prosfores_anath[i].user_detail.lat, res.prosfores_anath[i].user_detail.lot], {icon: prosforaAnath}).addTo(map).bindPopup(cnt);
    }


});

}

show();


</script>



