<div class="tab-pane" id="notes">
    <div class="notesArea">
        <div class="legend">Notes</div>
        <a href="javascript:" class="add-note btn btn-mini" onclick="toggleFP('.create-note', 350,function(){$('#note-text')[0].focus();});"><i class="icon-plus-sign"></i> Add Note</a>
        <div class="notes-content">
            <div class="create-note clear">
                <div id="note-group" class="control-group clear">
                    <textarea id="note-text" name="noteText" class="expanding"></textarea>
                    <input id="seminar-note-id" type="hidden" value="<?php if_set($seminar['id']); ?>">
                    <button id="save-note" class="save-note btn btn-mini"><i class="icon-ok"></i> Save Note</button>
                </div>
            </div>
            <div id="display-notes"></div>
        </div>
    </div>
</div>