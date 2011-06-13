<h2>Add / Edit Category/Domain</h2>

<?php echo form_open('admin/add_category'); ?>

<p>
   <?php 
      echo form_label('Cateogory/Domain Name', 'name');
      echo form_input('name', set_value('name'), 'id="name" autofocus');
   ?>
</p>
<p>
   <?php 
      echo form_label('Category/Domain Description', 'description');
      echo form_input('description', set_value('description'), 'id="description" ');
   ?>
</p>

<?php 
      echo form_submit('submit', 'Submit');
      echo form_close();
      echo validation_errors();
?>
