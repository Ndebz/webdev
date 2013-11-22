<!DOCTYPE html>
<html>
    <?php echo $head ?>
    <body>
        <?php echo $header ?>
        <div class="container">
            <div class="inner-container">
                <div class="errors"><?php echo validation_errors(); ?></div>
                <?php echo form_open('person/add'); ?>
                    <table>
                        <tr>
                            <td><label>First Name</label></td>
                            <td><input type="text" name="firstname"/></td>
                        </tr>
                        <tr>
                            <td><label>Surname</label></td>
                            <td><input type="text" name="surname"/></td>
                        </tr>
                        <tr>
                            <td><label>DOB</label></td>
                            <td><input type="text" name="dob"/></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" value="Save" /></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <?php echo $footer ?>
    </body>
</html>
