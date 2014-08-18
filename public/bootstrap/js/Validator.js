/**
 * Created by zzhitong on 8/16/14.
 */
function Validator(fieldId, MessagefieldId) {
    this.fieldId = fieldId;
    this.MessagefieldId = MessagefieldId;
}

Validator.prototype.checkRequiredField = function () {
    if ($('#' + this.fieldId).val() == '') {
        $('#' + this.MessagefieldId).html('Required field');
        $('#' + this.MessagefieldId).css('color', 'red');
        return false;
    }
    else {
        $('#' + this.MessagefieldId).html('');
        return true;
    }
}

Validator.prototype.checkDateTimeField = function () {
    var dtRegex = new RegExp(/\b\d{4}[\/-]\d{1,2}[\/-]\d{1,2}\b/);
    var is_date = dtRegex.test($('#' + this.fieldId).val());
    if ($('#' + this.fieldId).val() == '' || is_date) {
        $('#' + this.MessagefieldId).html('');
        return true;
    }
    else {
        $('#' + this.MessagefieldId).html('Invalid Date');
        return false;
    }
}