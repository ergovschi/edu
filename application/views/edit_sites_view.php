<h2>Edit Sites</h2>

<ul>
    <?php foreach($sites as $row): ?> 

        <li>
            <?php echo anchor($row->url, $row->name).
            ' | '.anchor('admin/make_site_active/'.$row->id, 'Make Active').
            ' | '.anchor('admin/delete_site/'.$row->id, 'Delete Site'); ?>   
        </li>

    <?php endforeach; ?>
</ul>
