<!DOCTYPE html>
<html>
    <head><?php echo $head ?></head>
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
                <?php if (isset($filter)): ?>
                <div class="filter-holder">
                    <span>Filtered by : </span><?php echo $filter ?>
                </div>
                <?php endif ?>
                <?php if (count($contacts) > 0):?>
                <table class="home-list">
                    <thead>
                        <tr>
                            <th width="150">Name</th>
                            <th width="120">Company</th>
                            <th width="100">Home Phone</th>
                            <th width="100">Work Phone</th>
                            <th width="100">Cell Phone</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($contacts as $contact): ?>
                        <tr>
                            <td><a href="<?php echo base_url().'index.php/contactbook/contact/'.$contact->id ?>"><?php echo $contact->firstname.' '.$contact->lastname ?></a></td>
                            <td><?php echo $contact->company ?></td>
                            <td><?php echo $contact->home_phone?></td>
                            <td><?php echo $contact->work_phone?></td>
                            <td><?php echo $contact->cell_phone?></td>
                            <td><?php echo $contact->email?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                <?php else: ?>
                No Contacts
                <?php endif ?>
             
            </div>     <div class="clear">&nbsp;</div>
        </div><?php echo $footer ?>
    </body>
</html>