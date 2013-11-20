<!DOCTYPE html>
<html>
    <?php echo $head ?>
    <body>
        <?php echo $header ?>
        <div class="container">
            <div class="nav">
                <div class="nav-inner">
                    <h4>Search for contacts</h4>
                <form method="post" action="<?php echo base_url() ?>index.php/contactbook/search">
                    <input type="text" name="search" class="search-box" autocomplete="off"/><br>
                    <div class="ajax-search-box">
                            
                    </div>
                    <input type="submit" value="Search" />
                </form>
                
                <h4>Filter by Category</h4>
                <ul>
                    <li><a href="<?php echo base_url() ?>index.php/contactbook/">All Contacts</a></li>
                <?php if(count($categories > 0)): ?>                
                    <?php foreach($categories as $category): ?>
                    <li><a href="<?php echo base_url() ?>index.php/contactbook/index/<?php echo $category->id ?>"><?php echo $category->category_name ?></a></li>
                    <?php endforeach; ?>     
                <?php endif; ?>
                </ul>
                </div>
            </div>
            <div class="content">
                <table class="view-contact">
                    <tr>
                        <td width="120px"><label>Category</label></td>
                        <td width="120px">
                           <?php echo $contact_details['0']->category_name ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Email</label></td>
                        <td><?php echo $contact_details['0']->email ?></td>
                    </tr>
                    <tr>
                        <td><label>First Name</label></td>
                        <td><?php echo $contact_details['0']->firstname ?></td>
                    </tr>
                    <tr>
                        <td><label>Last Name</label></td>
                        <td><?php echo $contact_details['0']->lastname ?></td>
                    </tr>                   
                    <tr>
                        <td><label>Company</label></td>
                        <td><?php echo $contact_details['0']->company ?></td>
                    </tr>
                    <tr>
                        <td><label>Street Name</label></td>
                        <td><?php echo $contact_details['0']->street ?></td>
                    </tr>
                    <tr>
                        <td><label>Area</label></td>
                        <td><?php echo $contact_details['0']->area ?></td>
                    </tr>
                    <tr>
                        <td><label>City</label></td>
                        <td><?php echo $contact_details['0']->city ?></td>
                    </tr>
                    <tr>
                        <td><label>Postcode / Zip</label></td>
                        <td><?php echo $contact_details['0']->postcode ?></td>
                    </tr>
                    <tr>
                        <td><label>Country</label></td>
                        <td><?php echo $contact_details['0']->country ?></td>
                    </tr>                 
                    <tr>
                        <td><label>Home Phone</label></td>
                        <td><?php echo $contact_details['0']->home_phone ?></td>
                    </tr>
                    <tr>
                        <td><label>Work Phone</label></td>
                        <td><?php echo $contact_details['0']->work_phone ?></td>
                    </tr>
                    <tr>
                        <td><label>Cell Phone</label></td>
                        <td><?php echo $contact_details['0']->cell_phone ?></td>
                    </tr>
                    <tr>
                        <td><label>Fax Number</label></td>
                        <td><?php echo $contact_details['0']->fax_number ?></td>
                    </tr>
                    <tr>
                        <td><label>Web Address</label></td>
                        <td><?php echo $contact_details['0']->web_address ?></td>
                    </tr>
                    <tr>
                        <td><label>Notes</label></td>
                        <td><?php echo $contact_details['0']->notes  ?></td>
                    </tr>
                </table>
            </div>
            <div class="clear">&nbsp;</div>
        </div>
        <?php echo $footer?>
    </body>
</html>