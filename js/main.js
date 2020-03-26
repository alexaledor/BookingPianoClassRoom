$( function() {

    createSelectRooms(1);

    $('#building-name').change(function () {
        var building = $(this).val();
        createSelectRooms(building);
    });

    $('#class-room-number').change(function () {
        updateTable($(this).val());
    })

});

var timeRange = [
    '09.00 - 10.00',
    '10.00 - 11.00',
    '11.00 - 12.00',
    '12.00 - 13.00',
    '13.00 - 14.00',
    '14.00 - 15.00',
    '15.00 - 16.00',
    '16.00 - 17.00',
    '17.00 - 18.00',
    '18.00 - 19.00',
    '19.00 - 20.00',
    '20.00 - 21.00',
    '21.00 - 22.00'
];

function createSelectRooms(building) {
    $.ajax({
        type: "POST",
        url: "models/selectRoom.php",
        data: {
            building: building
        },
        dataType: 'json',
        success: function (response){

            if (response[0] == 'error'){
                alert('You have error!');
                return;
            }

            var str = '';
            response.forEach(function (item){
                str += '<option value="'+item.ID+'">'+ item.NAME +'</option>';

            });
            $('#class-room-number').html(str);
            var id = $('#class-room-number').val();
            updateTable(id);
        }
    })
}

function updateTable(id) {
    $.ajax({
        type: "POST",
        url: "models/mainTable.php",
        data: {id_class_room: id},
        dataType: 'json',
        success: function (response) {

            //console.log(response);

            if (response[0] == 'error'){
                alert('You have error!');
                return;
            }

            var str = '<table class="table table-bordered" >';
            str += '<tr class="btn-info"><td>Time Range</td><td>Student</td><td>Class</td></tr>'

            var timeReserveArr = [];
            var loginArr = [];

            response.forEach(function (item,key){
                timeReserveArr[key] = Number(item.PART_TIME);
                loginArr[key] = item.LOGIN;
            });

            var index = 0;

            timeRange.forEach(function (item, key){
                str += '<tr>';
                //str += '<td>'+ (key) +'.</td>';
                str += '<td>'+ item +' ';

                if (timeReserveArr.indexOf(key) != -1){

                    if (loginArr[index] == response[index].THIS_LOGIN){
                        str += '<span style="margin-left: 15px;"><button class="btn btn-danger btn-sm" onclick="cancelOrder('+ key + ')">Cancel</button></span></td>';
                    } else {
                        str += '</td>';
                    }

                    str += '<td><b>'+ response[index].FIRST_NAME + ' ' + response[index].LAST_NAME + '</b></td>';
                    str += '<td>'+ response[index].UNIT + ', '+response[index].COURSE+ '</td>';

                    index++;

                } else {

                    str += '<span style="margin-left: 15px;"><button class="btn btn-success btn-sm" onclick="makeOrder('+ key + ')">Reserve</button></span></td>';

                    str += '<td style="color: #28A745;"> free time </td>';
                    str += '<td> --- </td>';

                }
                str += '</tr>';
            });

            str += '</table>';

            $('#table').html(str);
        }
    });
}

function makeOrder(key) {

    var id = $('#class-room-number').val();

    $.ajax({
        type: "POST",
        url: "models/makeOrder.php",
        data: {
            part_time: key,
            id_class_room: id
        },
        success: function (response){

            console.log(response);
            if (response == 'error'){
                alert('You have error!');
            }

            if (response == 'late'){
                alert('You are late.');
            }
            updateTable(id);
        }
    })
}

function cancelOrder(key) {

    var id = $('#class-room-number').val();

    $.ajax({
        type: "POST",
        url: "models/cancelOrder.php",
        data: {part_time: key,id_class_room: id},
        success: function (response){

            console.log(response);

            if (response == 'canceled'){
                updateTable(id);
            }
        }
    })
}