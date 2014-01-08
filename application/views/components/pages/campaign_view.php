<?php echo form_open('campaign/save'); ?>
	<!-- HIDDEN FIELDS -->
    <input type="hidden" name="id" value="<?php if_set($campaign['id']); ?>">
	<input type="hidden" name="name" value="<?php if_set($zoho['name']); ?>">
	<input type="hidden" name="status" value="<?php if_set($zoho['status']); ?>">
	<input type="hidden" name="zoho_id" value="<?php if_set($zoho['zoho_id']); ?>">
    <input type="hidden" name="campaign_id" value="<?php if_set($zoho['campaign_id']); ?>">
	<input type="hidden" name="coop_commission" value="<?php if_set($zoho['coop_commission']); ?>">
	
	<div class="span6">
		<h3>Campaign Expenses</h3>
		<div class="row">
			<div class="span6">
				<div class="legend">Seminar Expenses</div>
				<div class="row">
					<div class="span3">
						<div id="days" class="control-group error">
							<label class="control-label">Days On Road</label>
							<div class="controls">
								<input type="text" name="days_on_road" maxlength="2" value="<?php if_set($campaign['days_on_road'], 0); ?>">
							</div>
						</div>
					</div>
					<div class="span3">
						<div id="employees" class="control-group error">
							<label class="control-label"># Employees</label>
							<div class="controls">
								<input type="text" name="num_employees" maxlength="2" value="<?php if_set($campaign['num_employees'], 0); ?>">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="span3">
						<div id="hotel" class="control-group error">
							<label class="control-label">Hotel Cost</label>
							<div class="controls">
								<input type="text" name="hotel_cost" maxlength="10" data-input="currency" value="<?php if_set($campaign['hotel_cost'], 0); ?>">
							</div>
						</div>
					</div>
					<div class="span3">
						<div id="catering" class="control-group error">
							<label class="control-label">Catering Cost</label>
							<div class="controls">
								<input type="text" name="catering_cost" maxlength="10" data-input="currency" readonly value="<?php if_set($campaign['catering_cost'], 0); ?>">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="span3">
						<div id="rental" class="control-group error">
							<label class="control-label">Location Rental</label>
							<div class="controls">
								<input type="text" name="location_rental" maxlength="10" data-input="currency" readonly value="<?php if_set($campaign['location_rental'], 0); ?>">
							</div>
						</div>
					</div>
					<div class="span3">
						<div id="miles" class="control-group error">
							<label class="control-label">Estimated Vehicle Miles</label>
							<div class="controls">
								<input type="text" name="est_vehicle_miles" maxlength="6" data-input="number" value="<?php if_set($campaign['est_vehicle_miles'], 0); ?>">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="span3">
						<div id="plane" class="control-group error">
							<label class="control-label">Plane Ticket Cost</label>
							<div class="controls">
								<input type="text" name="plane_ticket_cost" maxlength="10" data-input="currency" value="<?php if_set($campaign['plane_ticket_cost'], 0); ?>">
							</div>
						</div>
					</div>
					<div class="span3">
						<div id="vehicle" class="control-group error">
							<label class="control-label">Vehicle Cost</label>
							<div class="controls">
								<input type="text" name="vehicle_cost" maxlength="10" data-input="currency" value="<?php if_set($campaign['vehicle_cost'], 0); ?>">
							</div>
						</div>
					</div>
				</div>
				<div class="legend">Marketing Expenses</div>
				<div class="row">
					<div class="span3">
						<div id="packets" class="control-group error">
							<label class="control-label">Farmer Packets and Pens</label>
							<div class="controls">
								<input type="text" name="packets_and_pens" maxlength="6" data-input="number" value="<?php if_set($campaign['packets_and_pens'], 0); ?>">
							</div>
						</div>
					</div>
					<div class="span3">
						<div id="fliers" class="control-group error">
							<label class="control-label">Fliers</label>
							<div class="controls">
								<input type="text" name="fliers" maxlength="6" data-input="number" value="<?php if_set($campaign['fliers'], 0); ?>">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="span3">
						<div id="radio" class="control-group error">
							<label class="control-label">Radio</label>
							<div class="controls">
								<input type="text" name="radio" maxlength="10" data-input="currency" readonly value="<?php if_set($campaign['radio'], 0); ?>">
							</div>
						</div>
					</div>
					<div class="span3">
						<div id="newspaper" class="control-group error">
							<label class="control-label">Newspaper</label>
							<div class="controls">
								<input type="text" name="newspaper" maxlength="10" data-input="currency" readonly value="<?php if_set($campaign['newspaper'], 0); ?>">
							</div>
						</div>	
					</div>
				</div>
				<div class="row">
					<div class="span3">
						<div id="mail" class="control-group error">
							<label class="control-label">Direct Mail</label>
							<div class="controls">
								<input type="text" name="direct_mail" maxlength="6" data-input="number" value="<?php if_set($campaign['direct_mail'], 0); ?>">
							</div>
						</div>
					</div>
					<div class="span3">
						<div id="calls" class="control-group error">
							<label class="control-label">Automated Calls</label>
							<div class="controls">
								<input type="text" name="automated_calls" maxlength="6" data-input="number" value="<?php if_set($campaign['automated_calls'], 0); ?>">
							</div>
						</div>
					</div>
				</div>
				<div class="legend">Price Costs</div>
				<div class="row">
					<div class="span2">
						<div class="control-group">
							<label class="control-label">T1/T2</label>
							<div>
								<select name="self_cert_price" class="span2">
									<option value="1800" <?php echo isset($campaign['self_cert_price']) && ($campaign['self_cert_price'] == 1800) ? 'selected' : ''; ?>>$1,800</option>
									<option value="2250" <?php echo isset($campaign['self_cert_price']) && ($campaign['self_cert_price'] == 2250) ? 'selected' : ''; ?>>$2,250</option>
									<option value="1348" <?php echo isset($campaign['self_cert_price']) && ($campaign['self_cert_price'] == 1348) ? 'selected' : ''; ?>>$1,348</option>
									<option value="1750" <?php echo isset($campaign['self_cert_price']) && ($campaign['self_cert_price'] == 1750) ? 'selected' : ''; ?>>$1,750</option>
								</select>
							</div>
						</div>
					</div>
					<div class="span2">
						<div class="control-group">
							<label class="control-label">PE</label>
							<div>
								<select name="pe_price" class="span2">
									<option value="3980" <?php echo isset($campaign['pe_price']) && ($campaign['pe_price'] == 3980) ? 'selected' : ''; ?>>$3,980</option>
									<option value="4780" <?php echo isset($campaign['pe_price']) && ($campaign['pe_price'] == 4780) ? 'selected' : ''; ?>>$4,780</option>
									<option value="3680" <?php echo isset($campaign['pe_price']) && ($campaign['pe_price'] == 3680) ? 'selected' : ''; ?>>$3,680</option>
									<option value="4280" <?php echo isset($campaign['pe_price']) && ($campaign['pe_price'] == 4280) ? 'selected' : ''; ?>>$4,280</option>
								</select>
							</div>
						</div>
					</div>
					<div class="span2">
						<div class="control-group">
							<label class="control-label">Spill Kit</label>
							<div>
								<select name="spill_kit_price" class="span2">
									<option value="49">$49</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="span2">
						<div class="control-group">
							<label class="control-label">T1/T2 Containment</label>
							<div>
								<select name="self_cert_containment_price" class="span2">
									<option value="5445" <?php echo isset($campaign['self_cert_containment_price']) && ($campaign['self_cert_containment_price'] == 5445) ? 'selected' : ''; ?>>$5,445</option>
									<option value="4445" <?php echo isset($campaign['self_cert_containment_price']) && ($campaign['self_cert_containment_price'] == 4445) ? 'selected' : ''; ?>>$4,445</option>
									<option value="4447" <?php echo isset($campaign['self_cert_containment_price']) && ($campaign['self_cert_containment_price'] == 4447) ? 'selected' : ''; ?>>$4,447</option>
									<option value="4895" <?php echo isset($campaign['self_cert_containment_price']) && ($campaign['self_cert_containment_price'] == 4895) ? 'selected' : ''; ?>>$4,895</option>
									<option value="7195" <?php echo isset($campaign['self_cert_containment_price']) && ($campaign['self_cert_containment_price'] == 7195) ? 'selected' : ''; ?>>$7,195</option>
								</select>
							</div>
						</div>
					</div>
					<div class="span2">
						<div class="control-group">
							<label class="control-label">PE Containment</label>
							<div>
								<select name="pe_containment_price" class="span2">
									<option value="7215" <?php echo isset($campaign['pe_containment_price']) && ($campaign['pe_containment_price'] == 7215) ? 'selected' : ''; ?>>$7,215</option>
									<option value="5115" <?php echo isset($campaign['pe_containment_price']) && ($campaign['pe_containment_price'] == 5115) ? 'selected' : ''; ?>>$5,115</option>
									<option value="5915" <?php echo isset($campaign['pe_containment_price']) && ($campaign['pe_containment_price'] == 5915) ? 'selected' : ''; ?>>$5,915</option>
									<option value="11495" <?php echo isset($campaign['pe_containment_price']) && ($campaign['pe_containment_price'] == 11495) ? 'selected' : ''; ?>>$11,495</option>
								</select>
							</div>
						</div>
					</div>
					<div class="span2">
						<div class="control-group">
							<label class="control-label">Inspection</label>
							<div>
								<select name="inspection_price" class="span2">
									<option value="500" <?php echo isset($campaign['inspection_price']) && ($campaign['inspection_price'] == 500) ? 'selected' : ''; ?>>$500</option>
									<option value="350" <?php echo isset($campaign['inspection_price']) && ($campaign['inspection_price'] == 350) ? 'selected' : ''; ?>>$350</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<br>
				<br>
				<br>
				<br>
				<div class="buttons">
					<button type="button" name="update_campaign" id="update_campaign" value="update_campaign" class="btn">Save</button>
					<button type="button" name="insert_campaign_add_seminar" id="insert_campaign_add_seminar" value="insert_campaign_add_seminar" class="btn end">Save &amp; Add Seminar</button>
				</div>							
			</div>

		</div>
	</div>
<?php echo form_close(); ?>

<div class="span6">
	<h3>Campaign Seminars</h3>
    <?php if (isset($seminars)): ?>
        <?php if ($seminars->num_rows() > 0): ?>
            <?php $this->load->view('components/seminars_sidebar'); ?>
        <?php else: ?>
            <p class="quiet">
                No seminars have been linked to this campaign.
                <a href="<?php echo site_url('seminar'); ?>?campaign_id=<?php if_set($zoho['campaign_id']); ?>" class="right"><i class="icon-plus"></i> Add Seminar</a>
            </p>
        <?php endif; ?>
    <?php else: ?>
        <p class="quiet">Please save Campaign Information before adding a seminar.</p>
    <?php endif; ?>
</div>

<?php $this->load->view('components/modals/delete_seminar'); ?>
<?php $this->load->view('components/modals/delete_campaign'); ?>

<script src="<?php echo (ENVIRONMENT == 'development') ? base_url('js/main.js') : base_url('js/main.min.js'); ?>"></script>