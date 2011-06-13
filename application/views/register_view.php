<h2>Register</h2>

<?php echo form_open('user/register'); ?>


<p>
   <?php 
      echo form_label('First Name ', 'first_name');
      echo form_input('first_name', set_value('first_name'), 'id="first_name" autofocus');
   ?>
</p>
<p>
   <?php 
      echo form_label('Last Name ', 'last_name');
      echo form_input('last_name', set_value('last_name'), 'id="last_name"');
   ?>
</p>
<p>
   <?php 
      echo form_label('Email Address: ', 'email_address');
      echo form_input('email_address', set_value('email_address'), 'id="email_address"');
   ?>
</p>
<p>
   <?php 
      echo form_label('Location ', 'location');
      echo form_input('location', set_value('location'), 'id="location"');
   ?>
</p>
<p>
   <?php 
      echo form_label('Birth Year ', 'age');
      echo form_input('age', set_value('age'), 'id="age"');
   ?>
</p>
<p class="selectInterests">
    <label for='category'>Interests: </label>
    <?php echo form_multiselect('domains[]', $domains); ?>
</p>
<p>
   <?php 
      echo form_label('Password ', 'password');
      echo form_password('password','', 'id="password"');
   ?>
</p>


<?php echo form_submit('submit', 'Register');  ?>
<?php echo form_close(); ?>
<?php echo validation_errors(); ?>
