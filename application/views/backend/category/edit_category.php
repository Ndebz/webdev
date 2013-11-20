<!DOCTYPE html>
<html>
    <?php echo $head ?>
    <body>
        <?php echo $header ?>
        <div class="container">
                <div class="errors"><?php echo validation_errors(); ?></div>
                <?php echo form_open('category/edit'); ?>
                <div class="admin-form-container">
                    <table class="">
                    <tr>
                        <td><label>Category Name</label></td>
                        <td><input type="text" name="category_name" value="<?php echo $category[0]->category_name  ?>"/></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="id" value="<?php echo $category['0']->id ?>" />
                            <input type="submit" value="Save Category" />
                        </td>
                    </tr>
                </table>
                </div>
            </form>
        </div>
    </body>
</html>
