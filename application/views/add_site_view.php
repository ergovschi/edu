<h2>Add Site</h2>

<?php echo form_open('site/add_site'); ?>


<p>
   <?php 
      echo form_label('Site Name', 'name');
      echo form_input('name', set_value('name'), 'id="name" autofocus');
   ?>
</p>
<p>
   <?php 
      echo form_label('Site Url', 'url');
      echo form_input('url', set_value('url'), 'id="url" ');
   ?>
</p>
<p>
   <?php 
      echo form_label('Description', 'description');
      echo form_textarea('description', set_value('description'), 'id="description" ');
   ?>
</p>
<p>
   <?php 
      echo form_label('Category ', 'category');
      echo form_dropdown('category', $cats);
   ?>
</p>
<p>
   <?php 
      echo form_label('Domain ', 'domain');
      echo form_dropdown('domain', $doms);
   ?>
</p>

<?php echo form_submit('submit', 'Add Site'); ?>
<?php echo form_close(); ?>
<?php echo validation_errors(); ?>
