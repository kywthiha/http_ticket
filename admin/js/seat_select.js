var selectedSeatNumbers = [];
var selectedSeatIDs = [];
var maxSeats = $('#seat-table').attr('data-max-seats');

$(document).ready(function(){
    //alert("Hello World");
    $('#seatSelectionSubmitButton').prop('disabled', true);

    $('.seat-available').click(function(event){
        event.preventDefault();

        var seatId = $(this).attr('data-seat-id');
        var seatNumber = $(this).attr('data-seat-number');

        if($(this).hasClass('btn-primary')) {
            selectedSeatNumbers.splice( $.inArray(seatNumber, selectedSeatNumbers), 1 );
            selectedSeatIDs.splice( $.inArray(seatId, selectedSeatIDs), 1 );
            $(this).removeClass('btn-primary');
        } else {
            if(selectedSeatNumbers.length < maxSeats) {
                selectedSeatNumbers.push(seatNumber);
                selectedSeatIDs.push(seatId);
                $(this).addClass('btn-primary');
            }
        }

        $("input#seatIDs").val(selectedSeatIDs.join());
        $("#selectedSeatNumbers").text(selectedSeatNumbers.join(", "));

        if(selectedSeatIDs.length != maxSeats) {
            $('#seatSelectionSubmitButton').prop('disabled', true);
        } else {
            $('#seatSelectionSubmitButton').prop('disabled', false);

        }
    });
});