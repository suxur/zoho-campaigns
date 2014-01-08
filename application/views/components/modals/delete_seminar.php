<?php if (!empty($seminars)): ?>
    <?php foreach ($seminars->result_array() as $seminar): ?>
        <!-- Hidden Confirm Modal -->
        <div id="deleteModal<?php echo $seminar['id']; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="deleteModal<?php echo $seminar['id']; ?>" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h2>Are You Sure?</h2>
            </div>
            <div class="modal-body">
                <p>You are about to delete the seminar information for the campaign: <?php if_set($campaign['name']); ?>. This action cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                <a href="<?php echo site_url('seminar/delete?seminar_id=' . $seminar['id'] . '&zoho_id=' . $campaign['zoho_id'] . '&id=' . $campaign['id'] . '&campaign_id=' . $campaign['campaign_id']); ?>" class="btn btn-danger">Delete</a>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>