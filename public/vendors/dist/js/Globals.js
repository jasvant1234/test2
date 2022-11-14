function CheckUncheckAll(obj) {
    var chkSelect = document.getElementsByTagName('input');
    for (var i = 0; i < chkSelect.length; i++) {
        if (chkSelect[i].type == 'checkbox' && chkSelect[i].id.indexOf('chkSelect') != -1) {
            chkSelect[i].checked = obj.checked;
        }
    }
}

function SelectedRecordsCount() {
    var chkSelect = document.getElementsByTagName('input');
    var count = 0;
    for (var i = 0; i < chkSelect.length; i++) {
        if (chkSelect[i].type == 'checkbox' && chkSelect[i].id.indexOf('chkSelect') != -1) {
            if (chkSelect[i].checked) {
                count++;
            }
        }
    }
    return count;
}

function CheckUncheckAllByGroup(Elementid, elementname, checkstate) {
    var prefix = Elementid.substring(0, Elementid.indexOf(elementname));
    var CheckBoxes = document.getElementsByTagName("input");
    for (i = 0; i < CheckBoxes.length; i++) {
        if (CheckBoxes[i].type == "checkbox") {
            if (CheckBoxes[i].id.indexOf(prefix) != -1) {
                CheckBoxes[i].checked = checkstate;
            }
        }
    }
}

function CheckUncheckHeader(listid) {
    var chkSelect = document.getElementsByTagName('input');
    var chkHeader = document.getElementById(listid + '_chkHeader');
    if (chkHeader != null) {
        chkHeader.checked = true;
        for (var i = 0; i < chkSelect.length; i++) {
            if (chkSelect[i].type == 'checkbox' && chkSelect[i].id.indexOf(listid) != -1 && chkSelect[i].id.indexOf('chkSelect') != -1) {
                if (!chkSelect[i].checked) {
                    chkHeader.checked = false;
                    break;
                }
            }
        }
    }
}

function ConfirmIsActiveDeActive() {
    return confirm("Are you sure want to perform this Operation?");
}

function ConfirmDeleteAll() {
    return confirm("Are you sure you want to delete all records?");
}

function ConfirmDeleteSelected() {
    if (SelectedRecordsCount() > 0) {
        return confirm("Are you sure you want to delete selected record(s)?");
    }
    else {
        alert("Please select atleast one record.");
        return false;
    }
}

function ConfirmDelete() {
    return confirm("Are you sure you want to delete this record?");
}

function BlockElement(elementid) {
    $.blockUI.defaults.css = {};
    $('#' + elementid).block({
        message: '<div class=\"processtable\" style=\"text-align: center\">Please wait...<div class=\"process\" style=\"width: 100%\"></div></div>',
        overlayCSS: { backgroundColor: '#000000' }
    });
}

function UnblockElement(elementid) {
    $('#' + elementid).unblock();
}

function CheckSpecialKeys(e) {
    if (e.keyCode != 8 && e.keyCode != 46 && e.keyCode != 37 && e.keyCode != 38 && e.keyCode != 39 && e.keyCode != 40) {
        return false;
    }
    else {
        return true;
    }
}

function CheckTextAreaMaxLength(textbox, e, length) {
    var maxlength = parseInt(length);

    if (!CheckSpecialKeys(e)) {
        if (textbox.value.length > maxlength - 1) {
            if (window.event) {
                e.returnValue = false;
            }
            else {
                e.preventDefault();
            }
        }
    }
}

function BlockContent() {
    BlockElement('divContent');
}

function UnblockContent() {
    UnblockElement('divContent');
}

function OnGetFailure(error, userContext, methodName) {
    alert(error.get_message());
}

function ConvertDateTimeToString(dateTime) {
    if (dateTime == null) {
        return "";
    }
    else {
        return (new Date(dateTime)).format("MM/dd/yyyy hh:mm:ss tt");
    }
}

function ConvertDateToString(dateTime) {
    if (dateTime == null) {
        return "";
    }
    else {
        return (new Date(dateTime)).format("MM/dd/yyyy");
    }
}

function ConvertTimeToString(dateTime) {
    if (dateTime == null) {
        return "";
    }
    else {
        return (new Date(dateTime)).format("hh:mm:ss tt");
    }
}

function StartBlink() {
    window.blinker = setInterval(function() {
        if (window.blink) {
            $('.blink').css('visibility', 'visible');
            window.blink = false;
        }
        else {
            $('.blink').css('visibility', 'hidden');
            window.blink = true;
        }
    }, 500);
}

function ShowHideFilter(elementid, isReset) {
    var hdnFilter = document.getElementById("hdnFilter");
    var aFlter = document.getElementById("aFlter");
    if (isReset) {
        if (hdnFilter.value == 1) {
            document.getElementById(elementid).style.display = 'block';
            aFlter.innerHTML = 'Hide filter&nbsp;&nbsp;<img id="imgExpand" src="Images/up.png" border="0" alt="" />'
        }
        return false;
    }
    if (hdnFilter.value == 0) {
        $("#" + elementid).fadeIn("slow");
        hdnFilter.value = 1;
        aFlter.innerHTML = 'Hide filter&nbsp;&nbsp;<img id="imgExpand" src="Images/up.png" border="0" alt="" />'
    }
    else {
        $("#" + elementid).slideUp();
        hdnFilter.value = 0;
        aFlter.innerHTML = 'Show filter&nbsp;&nbsp;<img id="imgExpand" src="Images/down.png" border="0" alt="" />'
    }
    return false;
}