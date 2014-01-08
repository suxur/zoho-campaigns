<?php echo form_open('seminar/save'); ?>
    <input type="hidden" name="campaign_id" value="<?php echo if_set($campaign['campaign_id']); ?>">
    <input type="hidden" name="id" value="<?php if_set($campaign['id']); ?>">
    <input type="hidden" name="seminar_id" value="<?php if_set($seminar['id']); ?>">
    <input type="hidden" name="datetime" id="datetime">
    <div class="span6 seminar-content">
        <ul class="nav nav-tabs" id="seminar-tabs">
            <li><a href="#facility">Facility</a></li>
            <li><a href="#info">Information</a></li>
            <li><a href="#results">Results</a></li>
            <li><a href="#notes">Notes</a></li>
        </ul>
        <div class="tab-content">
            <!-- FACILITY TAB -->
            <?php $this->load->view('components/tabs/facility_tab'); ?>
            <!-- INFORMATION TAB -->
            <?php $this->load->view('components/tabs/information_tab'); ?>
            <!-- RESULTS TAB -->
            <?php $this->load->view('components/tabs/results_tab'); ?>
            <!-- NOTES TAB -->
            <?php $this->load->view('components/tabs/notes_tab'); ?>
        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="buttons">
            <button type="button" name="update_seminar_info" id="update_seminar_info" value="update_seminar_info" class="btn">Save</button>
            <button type="button" name="insert_seminar_add_seminar" id="insert_seminar_add_seminar" value="insert_seminar_add_seminar" class="btn end">Save &amp; Add Seminar</button>
        </div>
    </div>
<?php echo form_close(); ?>
<div class="span6">
    <h3>Campaign Seminars</h3>
    <?php if ($seminars->num_rows() == 0): ?>
        <p class="quiet">
            No seminars have been linked to this campaign.
             <a href="<?php echo site_url('seminar?campaign_id=' . if_set($campaign['campaign_id'])); ?>" class="right"><i class="icon-plus"></i> Add Seminar</a>
        </p>
    <?php else: ?>
        <?php $this->load->view('components/seminars_sidebar'); ?>
    <?php endif; ?>
</div>

<?php $this->load->view('components/modals/delete_seminar'); ?>
<?php $this->load->view('components/modals/delete_campaign'); ?>

<script src="<?php echo (ENVIRONMENT == 'development') ? base_url('js/seminar.js') : base_url('js/seminar.min.js'); ?>"></script>
<script src="<?php echo (ENVIRONMENT == 'development') ? base_url('js/main.js') : base_url('js/main.min.js'); ?>"></script>