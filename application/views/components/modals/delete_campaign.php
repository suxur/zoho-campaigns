<!-- Hidden Confirm Modal -->
<div id="deleteCampaign" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="deleteCampaign" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h2>Are You Sure?</h2>
    </div>
    <div class="modal-body">
        <p>You are about to delete the information for the campaign: <?php if_set($campaign['name']); ?>. This action will also delete any seminar information linked to this campaign and cannot be undone.</p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
        <a href="<?php echo site_url('campaign/delete?id=' . if_set($campaign['id'], '', FALSE) . '&zoho_id=' . if_set($campaign['zoho_id'], '', FALSE) . '&campaign_id=' . if_set($campaign['campaign_id'], '', FALSE)); ?>" class="btn btn-danger">Delete</a>
    </div>
</div>
<div class="overlay">
    <img class="ajax-loader" src="<?php echo base_url('img/ajax-loader-white.gif'); ?>" alt="ajax-loader">
</div>