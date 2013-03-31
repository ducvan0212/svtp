<h2>Sign up</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('users/create') ?>

  <label for="email">Email</label> 
  <input type="input" name="email" /><br />

  <label for="name">Name</label>
  <input type="input" name="name" /><br />

  <label for="password">Password</label>
  <input type="password" name="password"><br />

  <label for="confirm">Password Confirmation</label>
  <input type="password" name="confirm"><br />

  <input type="submit" name="submit" value="Create news item" /> 
</form>