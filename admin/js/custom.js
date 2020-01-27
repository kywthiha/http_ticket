$(document).ready(function () {
    Date.prototype.addDays = function (days) {
        let date = new Date(this.valueOf());
        date.setDate(date.getDate() + days);
        return date;
    }
    let dateInput = $('.datepicker').pickadate({
        format: 'yyyy-mm-dd',
        min: new Date(),
        max: new Date().addDays(20)

    });

    $('form').submit(function(e) {
        let hello= $("#departureDate").val();
        if(hello == ""){
            $('#alertModal').modal('show');
            e.preventDefault();
        }
    });

});