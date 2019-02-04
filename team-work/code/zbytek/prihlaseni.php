<?php
include('../jenPHP/login.php')
?>
<!DOCTYPE html>  
<html>  
    <?php
    include('../spolecne/panel.php')
    ?>
    <section>
        <div class="container" style="width:500px;">    
            <h3 align="center">Prihlaseni</h3>  
            <br />  
            <form method="post">  
                <label>zadejte email</label>  
                <input type="text" name="email" class="form-control" />  
                <br />  
                <label>zadejte heslo</label>  
                <input type="password" name="heslo" class="form-control" />  
                <br />  
                <input type="submit" name="prihlaseni" value="Prihlaseni" class="button" />  
            </form>  
        </div>  
    </section>
    <?php
    include('../spolecne/konecStranky.php')
    ?>
</html> 

