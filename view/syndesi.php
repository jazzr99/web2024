<div class="row">
    <div class="col-md-4 offset-md-4">
    <form id="form1">
        
        <h2> Σύνδεση στο σύστημα </h2>
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" name="password">
        </div>
        <div class="form-group">
            <label for="type">Σύνδεση ώς:</label>
            <select  class="form-control" id="type" name="type">
                <option value="user">Χρήστης</option>
                <option value="support">Διασώστης</option>
                <option value="admin">Διαχειριστής</option>
                
            </select>
        </div>
        <button type="submit" class="btn btn-default">Σύνδεση</button>


    </form>
    </div>

</div>


<script>

$("#form1").submit(()=>{
    event.preventDefault();

    $.post("index.php?page=syndesixristi",$("#form1").serialize(),(result)=>{
        if(result=="true")
        {
            utype=$("#type").val();
            switch (utype)
            {
            case "user":
                window.location.href="index.php?page=arxikiuser";
                break;

            case "support":
                window.location.href="index.php?page=arxikisupport";
                break;
            
            case "admin":
                window.location.href="index.php?page=arxikiadmin";
                break;
            }
        }
        else{
            $("#msg").html("<div  class='alert alert-danger'>O χρήστης δεν βρέθηκε</b>")
        }

        
    });




})


</script>