<div class="tab-pane" id="info">
    <div class="row">
        <div class="span6">
            <div class="legend">Co-op Contact</div>
            <div class="row">
                <div class="span3">
                    <div class="control-group">
                        <label class="control-label">Contact</label>
                        <div class="controls">
                            <input type="text" name="coop_contact" value="<?php if_set($seminar['coop_contact']); ?>">
                        </div>
                    </div>
                </div>
                <div class="span3">
                    <div class="control-group">
                        <label class="control-label">Contact Phone Number</label>
                        <div class="controls">
                            <input type="text" name="coop_phone" maxlength="26" value="<?php if_set($seminar['coop_phone']); ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="legend">Refreshments</div>
            <div class="row">
                <div class="span6">
                    <div class="control-group">
                        <label class="control-label">Refreshments Cost</label>
                        <div class="controls">
                            <input type="text" name="refreshments_cost" maxlength="10" data-input="currency" value="<?php if_set($seminar['refreshments_cost'], 0.00); ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="span2">
                    <div class="control-group">
                        <label class="control-label">Offered</label>
                        <div class="controls">
                            <select name="refreshments_offered" class="span2">
                                <option value="">--</option>
                                <option value="yes" <?php echo isset($seminar['refreshments_offered']) && ($seminar['refreshments_offered'] == 'yes') ? 'selected' : ''; ?>>Yes</option>
                                <option value="no" <?php echo isset($seminar['refreshments_offered']) && ($seminar['refreshments_offered'] == 'no') ? 'selected' : ''; ?>>No</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="span2">
                    <div class="control-group">
                        <label class="control-label">Type</label>
                        <div class="controls">
                            <select name="refreshments_type" class="span2">
                                <option value="">--</option>
                                <option value="breakfast" <?php echo isset($seminar['refreshments_type']) && ($seminar['refreshments_type'] == 'breakfast') ? 'selected' : ''; ?>>Breakfast</option>
                                <option value="lunch" <?php echo isset($seminar['refreshments_type']) && ($seminar['refreshments_type'] == 'lunch') ? 'selected' : ''; ?>>Lunch</option>
                                <option value="dinner" <?php echo isset($seminar['refreshments_type']) && ($seminar['refreshments_type'] == 'dinner') ? 'selected' : ''; ?>>Dinner</option>
                                <option value="snacks" <?php echo isset($seminar['refreshments_type']) && ($seminar['refreshments_type'] == 'snacks') ? 'selected' : ''; ?>>Snacks</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="span2">
                    <div class="control-group">
                        <label class="control-label">Payment</label>
                        <div class="controls">
                            <select name="refreshments_payment" class="span2">
                                <option value="">--</option>
                                <option value="50/50" <?php echo isset($seminar['refreshments_payment']) && ($seminar['refreshments_payment'] == '50/50') ? 'selected' : ''; ?>>50/50</option>
                                <option value="coop" <?php echo isset($seminar['refreshments_payment']) && ($seminar['refreshments_payment'] == 'coop') ? 'selected' : ''; ?>>Co-op</option>
                                <option value="agcompliance" <?php echo isset($seminar['refreshments_payment']) && ($seminar['refreshments_payment'] == 'agcompliance') ? 'selected' : ''; ?>>agCompliance</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="legend">Advertising</div>
            <div class="row">
                <div class="span6">
                    <div class="control-group">
                        <label class="control-label">Radio Station</label>
                        <div class="controls">
                            <input type="text" name="radio_station" value="<?php if_set($seminar['radio_station']); ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="span3">
                    <div class="control-group">
                        <label class="control-label">Radio Station Contact</label>
                        <div class="controls">
                            <input type="text" name="radio_contact" value="<?php if_set($seminar['radio_contact']); ?>">
                        </div>
                    </div>
                </div>
                <div class="span3">
                    <div class="control-group">
                        <label class="control-label">Radio Station Phone Number</label>
                        <div class="controls">
                            <input type="text" name="radio_phone" value="<?php if_set($seminar['radio_phone']); ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="span3">
                    <div class="control-group">
                        <label class="control-label">Radio Station Cost</label>
                        <div class="controls">
                            <input type="text" name="radio_cost" maxlength="10" data-input="currency" value="<?php if_set($seminar['radio_cost'], 0.00); ?>">
                        </div>
                    </div>
                </div>
                <div class="span3">
                    <div class="control-group">
                        <label class="control-label">Radio Station Payment</label>
                        <div class="controls">
                            <select name="radio_payment">
                                <option value="">--</option>
                                <option value="50/50" <?php echo isset($seminar['radio_payment']) && ($seminar['radio_payment'] == '50/50') ? 'selected' : ''; ?>>50/50</option>
                                <option value="coop" <?php echo isset($seminar['radio_payment']) && ($seminar['radio_payment'] == 'coop') ? 'selected' : ''; ?>>Co-op</option>
                                <option value="agcompliance" <?php echo isset($seminar['radio_payment']) && ($seminar['radio_payment'] == 'agcompliance') ? 'selected' : ''; ?>>agCompliance</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="span6">
                    <div class="control-group">
                        <label class="control-label">Newspaper Name</label>
                        <div class="controls">
                            <input type="text" name="newspaper_name" value="<?php if_set($seminar['newspaper_name']); ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="span3">
                    <div class="control-group">
                        <label class="control-label">Newspaper Contact</label>
                        <div class="controls">
                            <input type="text" name="newspaper_contact" value="<?php if_set($seminar['newspaper_contact']); ?>">
                        </div>
                    </div>
                </div>
                <div class="span3">
                    <div class="control-group">
                        <label class="control-label">Newspaper Phone Number</label>
                        <div class="controls">
                            <input type="text" name="newspaper_phone" value="<?php if_set($seminar['newspaper_phone']); ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="span3">
                    <div class="control-group">
                        <label class="control-label">Newspaper Cost</label>
                        <div class="controls">
                            <input type="text" name="newspaper_cost" maxlength="10" data-input="currency" value="<?php if_set($seminar['newspaper_cost'], 0.00); ?>">
                        </div>
                    </div>
                </div>
                <div class="span3">
                    <div class="control-group">
                        <label class="control-label">Newspaper Payment</label>
                        <div class="controls">
                            <select name="newspaper_payment">
                                <option value="">--</option>
                                <option value="50/50" <?php echo isset($seminar['newspaper_payment']) && ($seminar['newspaper_payment'] == '50/50') ? 'selected' : ''; ?>>50/50</option>
                                <option value="coop" <?php echo isset($seminar['newspaper_payment']) && ($seminar['newspaper_payment'] == 'coop') ? 'selected' : ''; ?>>Co-op</option>
                                <option value="agcompliance" <?php echo isset($seminar['newspaper_payment']) && ($seminar['newspaper_payment'] == 'agcompliance') ? 'selected' : ''; ?>>agCompliance</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="legend">Facility Amenities</div>
            <div class="row">
                <div class="span2">
                    <div class="control-group">
                        <label class="control-label">Projector Screen</label>
                        <div class="controls">
                            <select name="projector_screen" class="span2">
                                <option value="">--</option>
                                <option value="yes" <?php echo isset($seminar['projector_screen']) && ($seminar['projector_screen'] == 'yes') ? 'selected' : ''; ?>>Yes</option>
                                <option value="no" <?php echo isset($seminar['projector_screen']) && ($seminar['projector_screen'] == 'no') ? 'selected' : ''; ?>>No</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="span2">
                    <div class="control-group">
                        <label class="control-label">WiFi</label>
                        <div class="controls">
                            <select name="wifi" class="span2">
                                <option value="">--</option>
                                <option value="yes" <?php echo isset($seminar['wifi']) && ($seminar['wifi'] == 'yes') ? 'selected' : ''; ?>>Yes</option>
                                <option value="no" <?php echo isset($seminar['wifi']) && ($seminar['wifi'] == 'no') ? 'selected' : ''; ?>>No</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="span2">
                    <div class="control-group">
                        <label class="control-label">Cell Phone Reception</label>
                        <div class="controls">
                            <select name="cell_reception" class="span2">
                                <option value="">--</option>
                                <option value="yes" <?php echo isset($seminar['cell_reception']) && ($seminar['cell_reception'] == 'yes') ? 'selected' : ''; ?>>Yes</option>
                                <option value="no" <?php echo isset($seminar['cell_reception']) && ($seminar['cell_reception'] == 'no') ? 'selected' : ''; ?>>No</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>