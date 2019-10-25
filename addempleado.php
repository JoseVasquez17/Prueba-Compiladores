<?php


session_start();
        
if(!isset($_SESSION['admin_login'])) 
    header('location:adminlogin.php');   
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Agregar personal</title>
        
        <link rel="stylesheet" href="newcss.css">
    </head>

<?php include 'header.php'; ?>
    
        <div class='content_addstaff'>
            <?php include 'admin_navbar.php'?>
            <div class='addstaff'>
        <form action="add_staff.php" method="POST">
             <table align='center'>
                 <tr><td colspan='2' align='center' style='color:#2E4372;'><h3><u>Agregar personal</u></h3></td></tr>
                <tr>
                    <td> Nombre del Personal</td>
                    <td><input type="text" name="staff_name" required=""/></td>
                </tr>
                <tr>
                    <td>Genero</td>
                    <td>
                        M<input type="radio" name="staff_gender" value="M" checked/>
                        F<input type="radio" name="staff_gender" value="F" />
                        
                    </td>
                </tr>
                <tr>
                    <td>
                        Fecha de Nacimiento
                    </td>
                    <td>
                        <input type="date" name="staff_dob" required=""/>
                    </td>
                </tr>
               
                <tr>
                    <td>Estado Civil</td>
                    <td>
                        <select name="staff_status">
                            <option>soltero</option>
                            <option>casado</option>
                            <option>divorciado</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Departamento</td>
                    <td>
                        <select name="staff_dept">
                            <option>ingresos</option>
                            <option>desarrollador</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                    
                    </td>
                </tr>
                
                <tr>
                    <td>Direccion:</td>
                    <td><textarea name="staff_address" required=""></textarea></td>
                </tr>
                <tr>
                    <td>Cel</td>
                    <td><input type="text" name="staff_mobile" required=""/></td>
                </tr>

                <tr>
                    <td>Email id</td>
                    <td><input type="email" name="staff_email" required=""/></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="staff_pwd" required=""/></td>
                </tr>
                
                <tr >
                    <td colspan="2" align='center' style='padding-top:20px' ><input type="submit" name="add_staff" value="AGREGAR" class='addstaff_button'/></td>
                </tr>
                </table>
        </form>
                </div>
        </div>
<?php include 'footer.php';?>
    </body>
</html>