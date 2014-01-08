<div class="tab-pane" id="facility">
    <div class="row">
        <div class="span6">
            <div class="legend">Information</div>
            <div class="row">
                <div class="span3">
                    <div class="input-append bootstrap-datepicker left">
                        <div id="date" class="control-group error">
                            <label class="control-label">Seminar Date</label>
                            <div id="datepicker" class="controls input-append date">
                                <input type="text" name="date" class="datepicker-input" value="<?php echo isset($seminar['date']) && $seminar['date'] !== '0000-00-00 00:00:00' ? date('m/d/Y', strtotime($seminar['date'])) : date('m/d/Y'); ?>">
                                <span class="add-on"><i class="icon-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="span3">
                    <div class="input-append bootstrap-timepicker left t1">
                        <div id="time" class="control-group error">
                            <label class="control-label">Seminar Time</label>
                            <div class="controls input-append">
                                <input type="text" name="time" id="timepicker" class="timepicker-input" value="<?php echo isset($seminar['date']) && $seminar['date'] !== '0000-00-00 00:00:00' ? date('g:i A', strtotime($seminar['date'])) : ''; ?>">
                                <span class="add-on"><i class="icon-time"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="span6">
                    <div id="name" class="control-group error">
                        <label class="control-label">Venue Name</label>
                        <div class="controls">
                            <input type="text" name="name" class="span6" data-required="true" value="<?php if_set($seminar['name']); ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="span3">
                    <div id="contact" class="control-group error">
                        <label class="control-label">Venue Contact</label>
                        <div class="controls">
                            <input type="text" name="contact" data-required="true" value="<?php if_set($seminar['contact']); ?>">
                        </div>
                    </div>
                </div>
                <div class="span3">
                    <div id="phone" class="control-group error">
                        <label class="control-label">Venue Phone Number</label>
                        <div class="controls">
                            <input type="text" name="phone" maxlength="26" data-required="true" value="<?php if_set($seminar['phone']); ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="span3">
                    <div id="cost" class="control-group error">
                        <label class="control-label">Venue Cost</label>
                        <div class="controls">
                            <input type="text" name="cost" maxlength="11" data-input="currency" value="<?php if_set($seminar['cost'], 0.00); ?>">
                        </div>
                    </div>
                </div>
                <div class="span2">
                    <div class="control-group">
                        <label class="control-label">Venue Payment</label>
                        <div class="controls">
                            <select name="payment" class="span2">
                                <option value="">--</option>
                                <option value="50/50" <?php echo isset($seminar['payment']) && ($seminar['payment'] == '50/50') ? 'selected' : ''; ?>>50/50</option>
                                <option value="coop" <?php echo isset($seminar['payment']) && ($seminar['payment'] == 'coop') ? 'selected' : ''; ?>>Co-op</option>
                                <option value="agcompliance" <?php echo isset($seminar['payment']) && ($seminar['payment'] == 'agcompliance') ? 'selected' : ''; ?>>agCompliance</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="legend">Address</div>
            <div class="row">
                <div class="span3">
                    <div id="street" class="control-group error">
                        <label class="control-label">Street</label>
                        <div class="controls">
                            <input type="text" name="street" value="<?php if_set($seminar['street']); ?>">
                        </div>
                    </div>
                </div>
                <div class="span3">
                    <div id="city" class="control-group error">
                        <label class="control-label">City</label>
                        <div class="controls">
                            <input type="text" name="city" value="<?php if_set($seminar['city']); ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="span3">
                    <div id="state" class="control-group error">
                        <label class="control-label">State</label>
                        <div class="controls">
                            <select name="state">
                                <?php echo states($seminar['state']); ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="span3">
                    <div id="zip_code" class="control-group error">
                        <label class="control-label">Zip Code</label>
                        <div class="controls">
                            <input type="text" name="zip_code" maxlength="10" value="<?php if_set($seminar['zip_code']); ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="span6">
                    <div id="county" class="control-group error">
                        <label class="control-label">County</label>
                        <div class="controls">
                            <input type="text" name="county" value="<?php if_set($seminar['county']); ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="legend">Arrival Time</div>
            <div class="row">
                <div class="span3">
                    <div class="input-append bootstrap-timepicker left t2">
                        <div class="control-group error">
                            <label class="control-label">Arrival Time</label>
                            <div class="controls input-append">
                                <input type="hidden" name="arrival_time" id="arrival_time">
                                <input type="text" id="timepicker2" class="timepicker-input" value="<?php if_set($seminar['arrival_time']) ? date('g:i A', strtotime($seminar['arrival_time'])) : ''; ?>">
                                <span class="add-on"><i class="icon-time"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="span3">
                    <label class="control-label">Is Arrival Time Confirmed?</label>
                    <select name="arrival_confirm" class="span3">
                        <option value="">--</option>
                        <option value="yes" <?php echo isset($seminar['arrival_confirm']) && ($seminar['arrival_confirm'] == 'yes') ? 'selected' : ''; ?>>Yes</option>
                        <option value="no" <?php echo isset($seminar['arrival_confirm']) && ($seminar['arrival_confirm'] == 'no') ? 'selected' : ''; ?>>No</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>