<!DOCTYPE>
<html>
    <?php echo $head?>
    <body>
        <?php echo $header ?>
        <div class="container">
            <fieldset>
                <legend>Add new Category</legend>
                <div class="errors"><?php echo validation_errors(); ?></div>
                <?php echo form_open('category/add'); ?>
                <table>
                    <tr>
                        <td><label>Category Name</label></td>
                        <td><input type="text" name="category_name" /></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" value="Save Category" /></td>
                    </tr>
                </table>
            </form>
            </fieldset>
        </div>
        <?php echo $footer ?>
    </body>
        
