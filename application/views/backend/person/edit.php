<!DOCTYPE html>
<html>
    <?php echo $head ?>
    <body>
        <?php echo $header ?>
        <script type="text/javascript">
            $(document).ready(function(){
               
               //when edit button is clicked
               $('.edit-person-button').click(function(e){
                   
                    //traverse to find input
                    var input = $(this).parent().prev().children('.input');
                        
                   if($(this).text() == "Edit"){
                       //change text value to save
                        $(this).text("Save");
                        //make input box editable
                        $(input).removeAttr('disabled');
                        $(input).focus();
                   }else{
                       
                      
                       
                       //prepare post
                       var post_data = "person_id=<?php echo $person[0]->person_id ?>&" + $(input).attr("name") + "=" + $(input).val();
                       
                       //send post
                       $.post("<?php echo base_url().'index.php/person/editpersonpost' ?>", post_data)
                               .done(function(data){
                                    if(data == 'error'){
                                        
                                        alert('Please choose a valid day. Can\'t be in the future or more than 100 years in the past');
                                        
                                    }else{
                                        $(input).parent().siblings().children('button').text("Edit");
                                         //disable input
                                        $(input).attr('disabled','disabled');
                                         
                                    }
                               });
                       
                      
                        
                   }
                   
               });
               
               //edit attribute
               $('.edit-attribute-button').click(function(){
                     //traverse to find input
                    var input = $(this).parent().prev().children('.input');
                        
                   if($(this).text() == "Edit"){
                       //change text value to save
                        $(this).text("Save");
                        //make input box editable
                        $(input).removeAttr('disabled');
                        $(input).focus();
                   }else{
                       
                       $(this).text("Edit");
                       
                       //prepare post
                       var post_data = "attribute_id="+$(input).siblings('.attribute_id').val()+"&person_id=<?php echo $person[0]->person_id ?>&" + $(input).attr("name") + "=" + $(input).val();
                       
                       //send post
                       $.post("<?php echo base_url().'index.php/person/editpersonattributepost' ?>", post_data)
                               .done(function(data){
                                    
                               });
                       
                       //disable input
                        $(input).attr('disabled','disabled');
                        
                   }
               });
               
            });
        </script>
        <script type="text/javascript">
	$(document).ready(function() {
		$(".fancybox").fancybox({
                    'width':300,
                    'height':200,
                });
	});
        </script>
        <script type="text/javascript">
            $(function() {
                $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd', maxDate: new Date});
            });
        </script>
        <div class="container">
            <div class="inner-container">
                <div class="attribute-assignment-holder">
                    <div class="person left">
                        <h3>Details</h3>
                        <table>
                            <tr>
                                <td>First name: </td>
                                <td><input type="text" name="firstname" value="<?php echo $person[0]->firstname ?>" disabled="disabled" class="input"/></td>
                                <td><button type="button" class="edit-person-button">Edit</button></td>
                            </tr>
                            <tr>
                                <td>Surname: </td>
                                <td><input type="text" name="surname" value="<?php echo $person[0]->surname ?>" disabled="disabled" class="input"/></td>
                                <td><button type="button" class="edit-person-button">Edit</button></td>
                            </tr>
                            <tr>
                                <td>DOB: </td>
                                <td><input type="text" name="dob" value="<?php echo $person[0]->dob ?>" disabled="disabled" id="datepicker" class="input"/></td>
                                <td><button type="button" class="edit-person-button" >Edit</button></td>
                            </tr>
                        </table>
                        <h3>Currently assigned attributes</h3>
                        <?php if(count($assigned_attributes) == 0): ?>
                            Currently no attributes assigned.
                        <?php else: ?>
                            <table>
                                <?php foreach($assigned_attributes as $attribute): ?>
                                    <tr>
                                        <td><label><?php echo $attribute->attribute_name ?>: </label></td>
                                        <td>
                                            <input type="text" class="input" disabled="disabled" name="value" value="<?php echo $attribute->value ?>"/>
                                            <input type="hidden" class="attribute_id" value="<?php echo $attribute->attribute_id ?>"/>
                                        </td>
                                        <td><button class="edit-attribute-button">Edit</button> 
                                         <a href="<?php echo base_url() ?>index.php/person/deleteattribute/<?php echo $person[0]->person_id.'/'.$attribute->attribute_id ?>"><button>Delete</button></a></td>
                                    </tr>
                                <?php endforeach ?>
                                
                            </table>
                        <?php endif ?>
                    </div>
                    <div class="attributes right">
                        <h3>Available attributes</h3>
                        <?php if(count($available_attributes) == 0):?>
                            Currently no attributes available
                        <?php else: ?>
                            <table>
                                <?php foreach($available_attributes as $attribute ): ?>
                                <tr>
                                    <td><label><?php echo $attribute->attribute_name ?></label></td>
                                    <td><a href="<?php echo base_url().'index.php/person/assign/'.$person[0]->person_id.'/'.$attribute->attribute_id ?>" data-fancybox-type="iframe" class="fancybox"><button>Assign</button></a></td>
                                    
                                </tr>
                                <?php endforeach; ?>
                            </table>
                        <?php endif?>
                    </div>
                    <div class="clear">&nbsp;</div>
                </div>
            </div>
        </div>
        <?php echo $footer ?>
    </body>
</html>