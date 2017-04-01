<form action="register.php" method = "POST">
    <fieldset>
        E-mail address : <input required="required" type="text" name="email"/><br/>
        Name : <input required="required" type="text" name="name"/><br/>
        College :<select name="college" required="required" placeholder="Select College">
                    <option value="IIT DELHI">IIT DELHI</option>
                    <option value="IIT GUWAHATI">IIT GUWAHATI</option>
                    <option value="BITS PILANI">BITS PILANI</option>
                    <option value="NIT JAIPUR">NIT JAIPUR</option>
                    <option value="DTU New Delhi">DTU New Delhi</option>
                 </select><br/>
        Password : <input required="required" type="password" name="password"/><br/>
        Retype - Password : <input required="required" type="password" name="password-retype"/><br/>
        Gender : <input type="radio" value="male" name="gender" checked>Male &nbsp;&nbsp;<input type="radio" value="female" name="gender">Female <br/>
        <button type="submit">
            Register
        </button><br/>        
    </fieldset>
</form>
<div>
    or <a href="login.php">Log In</a>
</div>