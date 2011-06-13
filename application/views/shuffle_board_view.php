<h2>Shuffle Board</h2>

<?php echo form_open('site/shuffle'); ?>
    <div class="shMenu">
        <label for='category'>Category: </label>
        <?php echo form_multiselect('category[]', $categories); ?>
    </div>
    <div class="shMenu">
        <label for='domain'>Domain: </label>
        <?php echo form_multiselect('domain[]', $domains); ?>
    </div> 

<?php echo form_submit('submit', 'Shuffle'); ?>
<?php echo form_close(); ?>
