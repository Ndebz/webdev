<!DOCTYPE html>
<html>
    <?php echo $head ?>
    <body>
        <?php echo $header ?>
        <div class="container">
            <div class="inner-container">
                <div class="errors"><?php echo validation_errors(); ?></div>
                <?php echo form_open('attribute/edit/'.$attribute[0]->attribute_id); ?>
                    <table width="100%" >
                        <tr>
                            <td><label>Attribute Name</label></td>
                            <td><input type="text" name="attribute_name" value="<?php echo $attribute[0]->attribute_name ?>"/></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input name="attribute_id" type="hidden" value="<?php echo $attribute[0]->attribute_id ?>" /><input type="submit" value="Save" /></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <?php echo $footer ?>
    </body>
</html>