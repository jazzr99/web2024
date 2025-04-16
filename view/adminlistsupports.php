<h2>Λίστα Διασωστών</h2>
<div class="col-md-8">
<table class=table>
    <tr><th>id</th><th>Username</th><th></th></tr>

    <tbody id="data">


    </tbody>
</table>
</div>

<script>
    function showsupports()
    {
        $.getJSON("index.php?page=getAllSupports",(res)=>{
            html="";
            for(i=0;i<res.length;i++)
            {
                html+=`<tr> <td>${res[i].id}</td>
                            <td>${res[i].username}</td>
                            <td><button onclick='delsupport(${res[i].id})' >Διαγραφή</button></td>
                            </tr>`
            }
            $("#data").html(html);
            

        });



    }

    function delsupport(id)
    {
        $.post("index.php?page=delsupport",{"id":id},(res)=>{

            showsupports();
        })
    }


showsupports();
</script>
