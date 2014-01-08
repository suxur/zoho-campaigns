function formatDate(e)
{
	if (dateInput.val() == "Not Set") return '';

    var t = $("." + e + " .bootstrap-timepicker-hour"),
		n = $("." + e + " .bootstrap-timepicker-minute"),
		r = $("." + e + " .bootstrap-timepicker-meridian");

    dateParts = dateInput.val().match(/\d+/g);

    dateFormat = dateParts[2] + "/" + dateParts[0] + "/" + dateParts[1];

    d = new Date(dateFormat + " " + t.val() + ":" + n.val() + " " + r.val());

    h = d.getHours();
	m = d.getMinutes();

    datetime = dateFormat + " " + h + ":" + m;

    return datetime
}

var facilityTab = $('#seminar-tabs a[href="#facility"]'),
    infoTab     = $('#seminar-tabs a[href="#info"]'),
    resultsTab  = $('#seminar-tabs a[href="#results"]'),
    notesTab    = $('#seminar-tabs a[href="#notes"]');

facilityTab.tab("show");

facilityTab.click(function (e) {
	e.preventDefault();
	$(this).tab("show")
});

infoTab.click(function (e) {
	e.preventDefault();
	$(this).tab("show")
});

resultsTab.click(function (e) {
	e.preventDefault();
	$(this).tab("show")
});

notesTab.click(function (e) {
	e.preventDefault();
	$(this).tab("show")
});

var date          = $("#datepicker"),
	dateInput     = date.find("input"),
	time          = $("#timepicker"),
	time2         = $("#timepicker2"),
	datetimeInput = $("#datetime"),
	datetime, d, h, m, dateParts, dateFormat;

date.datepicker({
	format: "mm/dd/yyyy",
	autoclose: true
}).change(function () {
	datetimeInput.val(formatDate("t1"))
});

time.timepicker().change(function () {
	datetimeInput.val(formatDate("t1"))
});

time2.timepicker().change(function () {
	$("#arrival_time").val(formatDate("t2"))
});

if (dateInput.val() !== "Not Set")
{
	datetimeInput.val(formatDate("t1"));
	$("#arrival_time").val(formatDate("t2"))
}

function toggleFP(area, speed, func)
{
    if(func == null)
    {
        func = function(){};
    }

    if(typeof(area) == "object")
    {
        area.slideToggle(speed,func);
    }

    else if(typeof(area) == "string")
    {
        $(area).slideToggle(speed,func);
    }
}

var id  = $('#seminar-note-id').val();

$('#display-notes').load('notes?id='+id, function() {
    if ($('#display-notes').is(':empty')) $('.create-note').show();
});

$('#save-note').on('click', function(e) {

    e.preventDefault();
    var id  = $('#seminar-note-id').val(),
        msg = $('#note-text').val();

    var data = {
        id: id,
        msg: msg
    };

    if (msg !== '' && id !== '') {
        $.ajax({
            url: "/notes/save",
            type: "POST",
            data: data,
            dataType: 'JSON',
            success: function(data) {
                console.log(data);
                var json = $.parseJSON(data);
                console.log(json);
                if (json == true) {
                    $('#display-notes').load('/notes?id='+id);
                    $('#note-text').val('');
                } else {
                    if ($('#note-error').length <= 0) {
                        $('#note-group').append('<p id="note-error" class="text-error">Oops, something went wrong, please refresh your page.</p>');
                    }
                }
            }
        });
    } else {
        $('#note-group').addClass('error');
    }
});