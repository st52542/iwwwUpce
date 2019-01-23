<?php
include('..\vykonnePHP\regis.php')
?>
<!DOCTYPE html>  
<html>  
    <?php
    include('panel.php')
    ?>
    <section>
        <div class="container" style="width:500px;text-align: center">  
            <h3 align="center">Registrace</h3>  
            <br />  
            <form method="post">  
                <label>Vlozte jmeno</label>  
                <input type="text" name="jmeno" class="form-control" />  
                <br /> 
                <label>Vlozte prijmeni</label> 
                <input type="text" name="prijmeni" class="form-control" />  
                <br /> 
                <label>Vlozte email</label> 
                <input type="text" name="email" class="form-control" />  
                <br />  
                <label>vlozte heslo</label>  
                <input type="password" name="heslo" class="form-control" />  
                <br />  
                <label>vlozte adresu</label>  
                <input type="text" name="adresa" class="form-control" />  
                <br />  
                <input type="submit" name="register" value="Register" class="btn btn-info" />  
            </form>   
        </div>   
    </section>
    <?php
    include('konecStranky.php')
    ?>
</html> 

