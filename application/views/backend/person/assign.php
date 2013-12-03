<!DOCTYPE html>
<html>
    <?php echo $head ?>
    <body style="background : white ;">
        <script type="text/javascript">

            $(document).ready(function(){
                $('#assign-attribute-form').submit(function(e){             
                    e.preventDefault();
                    
                    if($('#value').val() != ""){
                        $.post("<?php echo base_url().'index.php/person/assignpost' ?>" , {person_id: $('#person_id').val() , attribute_id: $('#attribute_id').val() , value: $('#value').val()})
                        .done(function(data){

                            //reload parent page
                            window.top.location.href = "<?php echo base_url().'index.php/person/edit/'?>" + $('#person_id').val();

                        });
                    }else{
                        $('#value').css('border','1px solid red');
                    }
                });
            });
            
        </script>
        <div class="popup-box">
            <form id="assign-attribute-form">
                    <input type="hidden" id="person_id" value="<?php echo $person_id ?>"/>
                    <input type="hidden" id="attribute_id" value="<?php echo $attribute_id ?>"/>
                    <p>
                        <label><?php echo $attribute[0]->attribute_name ?></label><br>
                        <input type="text" id="value" name="value" /><br>
                        <input id="submit-button" type="submit" value="Save" />
                    </p>
                </form>
        </div>
                
    </body>
</html>
