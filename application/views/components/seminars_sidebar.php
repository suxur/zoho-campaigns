<table class="table table-hover table-condensed">
    <thead>
    <tr>
        <th>Location</th>
        <th>Date</th>
        <th>Time</th>
        <th>Results</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($seminars->result_array() as $seminar): ?>
        <tr <?php echo  (isset($seminar['id']) && isset($_GET['id'])) && ($seminar['id'] == $_GET['id']) ? 'class="info"' : ''?>>
            <td><?php echo $seminar['city']?>, <?php echo $seminar['state']?></td>
            <td><?php echo ($seminar['date']=='0000-00-00 00:00:00')?'Not Set':date('M jS, Y',strtotime($seminar['date']))?></td>
            <td><?php echo ($seminar['date']=='0000-00-00 00:00:00')?'Not Set':date('g:i A',strtotime($seminar['date']))?></td>
            <td><?php echo money_format('%n', $seminar['total'])?></td>
            <td>
                <a href="<?php echo site_url('seminar'); ?>?id=<?php echo $seminar['id']; ?>&campaign_id=<?php echo $campaign['campaign_id']; ?>" class="seminar-info" data-toggle="tooltip"><i class="icon-edit"></i></a>
                &nbsp;
                <a href="<?php echo site_url('seminar/duplicate'); ?>?id=<?php echo $seminar['id']; ?>&campaign_id=<?php echo $campaign['campaign_id']; ?>" class="seminar-duplicate" data-toggle="tooltip"><i class="icon-share"></i></a>
                &nbsp;
                <a href="#deleteModal<?php echo $seminar['id']; ?>" role="button" data-toggle="modal"><i class="icon-trash"></i></a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<a href="<?php echo site_url('seminar'); ?>?campaign_id=<?php echo if_set($campaign['campaign_id']); ?>" class="right"><i class="icon-plus"></i> Add Seminar</a>