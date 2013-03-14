<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Foundation :: Profile</title>
                <script type="text/javascript" src="../js/jquery-1.5.1.min.js"></script>
        <script type="text/javascript" src="../js/jquery-validation-1.8.0/jquery.validate.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {    
                $("#form1").validate({
                    rules: {

                        
                        title: {
                            required: true
                        },
                        content: {
                            required: true
                        }
                        
                        
                    }
                });
            });
        </script>
    </head>
    <body>
        <?php include 'FoundationHeader.php'
        
        
        ?>
        <hr>
        <form id="form1" action="FoundationCtrl.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="action"  value="post"/>
            <input type="hidden" name="id"  value="<?php echo $_SESSION['usernameF'];?>"/>
            <table style="border:1px solid" >
                <tr>
                    <td colspan="3">What's New?</td>
                </tr>
                <tr>
                    <td colspan="3"><input type="text" style="width:300px" name="title" id="title" /></td>
                    
                </tr>
                <tr>
                    
                    <td colspan="3"> <textarea name="content" style="width:300px" id="content"></textarea></td>
                 
                </tr>
                <tr>
                    <td width="280px">Photo<input type="file" name="photo" width="70px"/></td>
                    <td width="50px"><input type="submit" value="Post"/></td>
                    <td></td>
                </tr>
            </table>
            
            
           <br/>
            
            
            
        </form>
        
        
        
    </body>
</html>
