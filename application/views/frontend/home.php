<html>
    <head><?php echo $head ?></head>
    <body>
        <?php echo $header ?>
        <div class="container">          
            <div class="nav">
                <h4>Search for contacts</h4>
                <input type="text" class="search-box"/>
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
            <div class="content">
                <?php if (count($contacts) > 0):?>
                <table cellspacing="2" cellpadding="4" class="contacts-home" >
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Company</th>
                            <th>Home Phone</th>
                            <th>Work Phone</th>
                            <th>Cell Phone</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($contacts as $contact): ?>
                        <tr onclick="window.location = '<?php echo base_url().'index.php/contactbook/contact/'.$contact->id ?>'">
                            <td><?php echo $contact->firstname.' '.$contact->lastname ?></td>
                            <td><?php echo $contact->company ?></td>
                            <td><?php echo $contact->home_phone?></td>
                            <td><?php echo $contact->work_phone?></td>
                            <td><?php echo $contact->cell_phone?></td>
                            <td><?php echo $contact->email?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                <?php endif ?>
             
            </div>     <div class="clear">&nbsp;</div>
        </div><?php echo $footer ?>
    </body>
</html>