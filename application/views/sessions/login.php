<!DOCTYPE HTML>
<html>
  <head>
    <title>Welcome to svtt</title>
  </head>
  <body>
    <h1>Log in</h1>
    <?php echo validation_errors(); ?>
    <?php echo form_open('sessions/create'); ?>
      <label for="email">Email</label> 
      <input type="text" name="email"><br>
      
      <label for="password">Password</label>  
      <input type="password" name="password"><br>
    
      <input type="submit" value="Login">
    </form>
    or <a href="signup">Sign up</a>
  </body>
</html>