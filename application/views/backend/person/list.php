<!DOCTYPE html>
<html>
    <?php echo $head ?>
    <body>
        <?php echo $header ?>
        <div class="container">
            <div class="inner-container">
                <p><a href="<?php echo base_url().'index.php/person/add' ?>"><button>Add new person</button></a></p>
                <?php if(count($people) == 0): ?>
                No people
                <?php else: ?>
                <table width="100%">
                    <thead>
                        <tr>
                            <th>Firstname</th>
                            <th>Surname</th>
                            <th>DOB</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($people as $person):?>
                        <tr>
                            <td><?php echo $person->firstname ?></td>
                            <td><?php echo $person->surname ?></td>
                            <td><?php echo $person->dob ?></td>
                            <td>
                                <a href="<?php echo base_url().'index.php/person/edit/'.$person->person_id ?>"><button>Edit</button></a> 
                                <a href="<?php echo base_url().'index.php/person/deletepersonpost/'.$person->person_id ?>"><button>Delete</button></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php endif ?>
            </div>
        </div>
    </body>
</html>
