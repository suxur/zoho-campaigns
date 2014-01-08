<div class="tab-pane" id="results">
    <div class="row">
        <div class="span6">
            <div class="legend">Results</div>
            <div class="row">
                <div class="span3">
                    <div id="attendees" class="control-group">
                        <label class="control-label">Attendees</label>
                        <div class="controls">
                            <input type="text" name="attendees" maxlength="6" data-input="number" value="<?php if_set($seminar['attendees'], 0); ?>">
                        </div>
                    </div>
                </div>
                <div class="span3">
                    <div id="num_under_threshold" class="control-group">
                        <label class="control-label"># Under Threshold</label>
                        <div class="controls">
                            <input type="text" name="num_under_threshold" maxlength="6" data-input="number" value="<?php if_set($seminar['num_under_threshold'], 0); ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="span3">
                    <div id="pe_sold" class="control-group">
                        <label class="control-label">PE's sold</label>
                        <div class="controls">
                            <input type="text" name="pe_sold" maxlength="6" data-input="number" value="<?php if_set($seminar['pe_sold'], 0); ?>">
                        </div>
                    </div>
                </div>
                <div class="span3">
                    <div id="self_cert_sold" class="control-group">
                        <label class="control-label">Self Cert Sold</label>
                        <div class="controls">
                            <input type="text" name="self_cert_sold" maxlength="6" data-input="number" value="<?php if_set($seminar['self_cert_sold'], 0); ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="span3">
                    <div id="pe_containment_sold" class="control-group">
                        <label class="control-label">PE Containment Sold</label>
                        <div class="controls">
                            <input type="text" name="pe_containment_sold" maxlength="6" data-input="number" value="<?php if_set($seminar['pe_containment_sold'], 0); ?>">
                        </div>
                    </div>
                </div>
                <div class="span3">
                    <div id="self_cert_containment_sold" class="control-group">
                        <label class="control-label">Self Cert Containment Sold</label>
                        <div class="controls">
                            <input type="text" name="self_cert_containment_sold" maxlength="6" data-input="number" value="<?php if_set($seminar['self_cert_containment_sold'], 0); ?>">
                        </div>
                    </div>
                </div>
            </div>
			<div class="row">
				<div class="span3">
					<div id="pe_liner_sold" class="control-group">
						<label class="control-label">PE Liners Sold</label>
						<div class="controls">
							<input type="text" name="pe_liner_sold" maxlength="6" data-input="number" value="<?php if_set($seminar['pe_liner_sold'], 0); ?>">
						</div>
					</div>
				</div>
				<div class="span3">
					<div id="self_cert_liner_sold" class="control-group">
						<label class="control-label">Self Cert Liners Sold</label>
						<div class="controls">
							<input type="text" name="self_cert_liner_sold" maxlength="6" data-input="number" value="<?php if_set($seminar['self_cert_liner_sold'], 0); ?>">
						</div>
					</div>
				</div>
			</div>
            <div class="row">
                <div class="span3">
                    <div id="spill_kits_sold" class="control-group">
                        <label class="control-label">Spill Kits Sold</label>
                        <div class="controls">
                            <input type="text" name="spill_kits_sold" maxlength="6" data-input="number" value="<?php if_set($seminar['spill_kits_sold'], 0); ?>">
                        </div>
                    </div>
                </div>
                <div class="span3">
                    <div id="inspection_sold" class="control-group">
                        <label class="control-label">Inspections Sold</label>
                        <div class="controls">
                            <input type="text" name="inspection_sold" maxlength="6" data-input="number" value="<?php if_set($seminar['inspection_sold'], 0); ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="offset3">
                    <div class="legend sub-totals">Plans: <span class="right"><?php echo money_format('%n', if_set($plans_total, 0, FALSE)); ?></span></div>
                    <div class="legend sub-totals">Containment: <span class="right"><?php echo money_format('%n', if_set($containment_total, 0, FALSE)); ?></span></div>
                    <div class="legend totals">Total: <span class="right"><?php echo money_format('%n', if_set($seminar['total'], 0, FALSE)); ?></span></div>
                </div>
            </div>
        </div>
    </div>
</div>