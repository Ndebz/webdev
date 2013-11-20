<!DOCTYPE>
<html>
    <?php echo $head?>
    <body>
        <?php echo $header?>
        <script type="text/javascript">
            $(document).ready(function(){
                
                //on delete contact
                $('#delete-contact').click(function(){
                    
                    //send to delete controller and ignore results
                    $.post( "<?php echo base_url().'index.php/contacts/delete'; ?>", { id: "<?php echo $contact_details['0']->id ?>" } ).done(function( data ) {
                            //redirect back to list page
                            window.location = '<?php echo base_url().'index.php/contacts'?>';
                          });
                    
                    
                });
            });
        </script>
        <div class="container">
            <div class="admin-form-container">
                <div class="errors"><?php echo validation_errors(); ?></div>
                <?php echo form_open('contacts/edit'); ?>
                <table class="admin-form-holder">
                    <tr>
                        <td><label>Category</label></td>
                        <td>
                            <select name="category">
                                <?php foreach($categories as $category ): ?>
                                <option value="<?php echo $category->id ?>" <?php if( $contact_details['0']->category == $category->id ){ echo "selected='selected'" ;} ?> ><?php echo $category->category_name ?></option>
                                <?php endforeach ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Email</label></td>
                        <td><input type="text" name="email" value="<?php echo $contact_details['0']->email ?>"/></td>
                    </tr>
                    <tr>
                        <td><label>Access Level</label></td>
                        <td>
                            <select name="access_level">
                                <option value="1" <?php if($contact_details['0']->access_level == 1){ echo 'selected = "selected"' ;} ?> >Published</option>
                                <option value="0" <?php if($contact_details['0']->access_level == 0){ echo 'selected = "selected"' ;} ?>>Unpublished</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Title</label></td>
                        <td><input type="text" name="title" value="<?php echo $contact_details['0']->title ?>"/></td>
                    </tr>
                    <tr>
                        <td><label>First Name</label></td>
                        <td><input type="text" name="firstname" value="<?php echo $contact_details['0']->firstname ?>"/></td>
                    </tr>
                    <tr>
                        <td><label>Last Name</label></td>
                        <td><input type="text" name="lastname" value="<?php echo $contact_details['0']->lastname ?>"/></td>
                    </tr>                   
                    <tr>
                        <td><label>Company</label></td>
                        <td><input type="text" name="company" value="<?php echo $contact_details['0']->company ?>"/></td>
                    </tr>
                    <tr>
                        <td><label>Street Name</label></td>
                        <td><input type="text" name="street" value="<?php echo $contact_details['0']->street ?>"/></td>
                    </tr>
                    <tr>
                        <td><label>Area</label></td>
                        <td><input type="text" name="area" value="<?php echo $contact_details['0']->area ?>"/></td>
                    </tr>
                    <tr>
                        <td><label>City</label></td>
                        <td><input type="text" name="city" value="<?php echo $contact_details['0']->city ?>"/></td>
                    </tr>
                    <tr>
                        <td><label>Postcode / Zip</label></td>
                        <td><input type="text" name="postcode" value="<?php echo $contact_details['0']->postcode ?>"/></td>
                    </tr>
                    <tr>
                        <td><label>Country</label></td>
                        <td><input type="text" name="country" value="<?php echo $contact_details['0']->country ?>"/></td>
                    </tr>                 
                    <tr>
                        <td><label>Home Phone</label></td>
                        <td><input type="text" name="home_phone" value="<?php echo $contact_details['0']->home_phone ?>"/></td>
                    </tr>
                    <tr>
                        <td><label>Work Phone</label></td>
                        <td><input type="text" name="work_phone" value="<?php echo $contact_details['0']->work_phone ?>"/></td>
                    </tr>
                    <tr>
                        <td><label>Cell Phone</label></td>
                        <td><input type="text" name="cell_phone" value="<?php echo $contact_details['0']->cell_phone ?>"/></td>
                    </tr>
                    <tr>
                        <td><label>Fax Number</label></td>
                        <td><input type="text" name="fax_number" value="<?php echo $contact_details['0']->fax_number ?>"/></td>
                    </tr>
                    <tr>
                        <td><label>Web Address</label></td>
                        <td><input type="text" name="web_address" value="<?php echo $contact_details['0']->web_address ?>"/></td>
                    </tr>
                    <tr>
                        <td><label>Notes</label></td>
                        <td><textarea name="notes" cols="43" rows="5"><?php echo $contact_details['0']->notes  ?></textarea></td>
                    </tr>                   
                    <tr>
                        <td><label>Add To Mailing List?</label></td>
                        <td><input type="checkbox" name="mailing_list" value="1" <?php if($contact_details['0']->mailing_list == 1){ echo "checked='checked'" ;} ?>/></td>
                    </tr>
                    
                    <tr>
                        <td colspan="2"><input type="hidden" name="id" value="<?php echo $contact_details['0']->id ?>" /><input type="submit" value="Save Contact" /> <button id="delete-contact" type="button">Delete Contact</button></td>
                    </tr>
                </table>
                </form>
            </div>
        </div>
        <?php echo $footer?>
    </body>
</html>

