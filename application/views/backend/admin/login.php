<!DOCTYPE html>
<html>
    <?php echo $head ?>
    <body>
        <?php echo $header ?>
        <div class="container">
            <div class="inner-container">
                <div class="admin-form-container">
                <?php if($wrong != ''): ?>
                <p>Wrong username and password combination</p>
                <?php endif ?>
                <form method="post" action="<?php echo base_url()?>index.php/admin/check">
                    <p>Enter Username: <br>
                        <input type="text" name="username" />
                    </p>
                    <p>Enter Username: <br>
                        <input type="password" name="password" />
                    </p>
                    <p><input type="submit" value="login" /></p>
                </form>
                </div>
            </div>
        </div>
    </body>
</html>
