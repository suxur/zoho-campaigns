<div class="top-bar">
	<h2>
		<a href="<?php echo site_url('campaign?id=' . if_set($zoho['zoho_id'], '', FALSE)); ?>">Campaign: <?php if_set($zoho['name']); ?></a>
		<span class="right">
			<a class="btn btn-inverse" href="<?php echo site_url('campaign?id=' . if_set($zoho['zoho_id'], '', FALSE)); ?>"><i class="icon-home icon-white"></i></a>
			<a class="btn btn-inverse" href="#" onclick="close_window();return false;"><i class="icon-remove icon-white"></i></a>
		</span>
	</h2>
</div>
<h4 id="status" data-status="<?php if_set($zoho['status']); ?>">
	<strong>
		Campaign: <?php if_set($zoho['name']); ?> - Status: <span id="status-info"><?php if_set($zoho['status']); ?></span>
		<?php if (isset($campaign['id'])): ?>
			<span class="right">
				<a href="<?php echo site_url('campaign?id=' . if_set($zoho['zoho_id'], '', FALSE)); ?>"><i class="icon-edit"></i> Edit</a>
				&nbsp;&nbsp;
				<a href="#deleteCampaign" role="button" data-toggle="modal"><i class="icon-trash"></i> Delete</a>
			</span>
		<?php endif; ?>
	</strong>
</h4>