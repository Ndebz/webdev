<!DOCTYPE>
<html>
    <?php echo $head?>
    <body>
        <?php echo $header?>
        <div class="container">
            <fieldset>
                <legend>Add New Contact</legend>
                <div class="errors"><?php echo validation_errors(); ?></div>
                <?php echo form_open('contacts/add'); ?>
                <table>
                    <tr>
                        <td><label>Category</label></td>
                        <td>
                            <select name="category">
                                <option>Please select</option>
                                <?php foreach($categories as $category ): ?>
                                <option value="<?php echo $category->id ?>"><?php echo $category->category_name ?></option>
                                <?php endforeach ?>
                            </select>
                        </td>
                    </tr>
                     <tr>
                        <td><label>Email *</label></td>
                        <td><input type="text" name="email" /></td>
                    </tr>
                    <tr>
                        <td><label>Access Level</label></td>
                        <td>
                            <select name="access_level">
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label>First Name *</label></td>
                        <td><input type="text" name="firstname" /></td>
                    </tr>
                    <tr>
                        <td><label>Last Name *</label></td>
                        <td><input type="text" name="lastname" /></td>
                    </tr>                   
                    <tr>
                        <td><label>Company *</label></td>
                        <td><input type="text" name="company" /></td>
                    </tr>
                    <tr>
                        <td><label>Street Name</label></td>
                        <td><input type="text" name="street" /></td>
                    </tr>
                    <tr>
                        <td><label>Area</label></td>
                        <td><input type="text" name="area" /></td>
                    </tr>
                    <tr>
                        <td><label>City</label></td>
                        <td><input type="text" name="city" /></td>
                    </tr>
                    <tr>
                        <td><label>Postcode / Zip</label></td>
                        <td><input type="text" name="postcode" /></td>
                    </tr>
                    <tr>
                        <td><label>Country</label></td>
                        <td><input type="text" name="country" /></td>
                    </tr>                 
                    <tr>
                        <td><label>Home Phone</label></td>
                        <td><input type="text" name="home_phone" /></td>
                    </tr>
                    <tr>
                        <td><label>Work Phone</label></td>
                        <td><input type="text" name="work_phone" /></td>
                    </tr>
                    <tr>
                        <td><label>Cell Phone</label></td>
                        <td><input type="text" name="cell_phone" /></td>
                    </tr>
                    <tr>
                        <td><label>Fax Number</label></td>
                        <td><input type="text" name="fax_number" /></td>
                    </tr>
                    <tr>
                        <td><label>Web Address</label></td>
                        <td><input type="text" name="web_address" /></td>
                    </tr>
                    <tr>
                        <td><label>Notes</label></td>
                        <td><textarea name="notes"></textarea></td>
                    </tr>                   
                    <tr>
                        <td><label>Add To Mailing List?</label></td>
                        <td><input type="checkbox" name="mailing_list" value="1"/></td>
                    </tr>                  
                    <tr>
                        <td colspan="2"><input type="submit" value="Save Contact" /></td>
                    </tr>
                </table>
                </form>
            </fieldset>
        </div>
        <?php echo $footer?>
    </body>
</html>
