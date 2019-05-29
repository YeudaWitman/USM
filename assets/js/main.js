$(document).ready(() => {
    
    function initApp() {
        // setInterval(requestData, 3000);
        requestData();
    }
    function requestData() {
        $.ajax({
            type: "GET",
            url: "http://localhost/UMS01/users",
            success: function (data, textStatus, request) {
                console.log(textStatus);
                console.log(request.getResponseHeader('some_header'));
                console.log(JSON.parse(data));
                renderConnectionTable(JSON.parse(data));
                renderTimer()
            },
            error: function (xhr, status, err) {
                console.error(xhr, status, err);
            }
        })
    }

    function renderTimer() {
        $('#timer').empty();
        let time = new Date().toLocaleTimeString('en-US', 
        { 
            hour12: false, 
            hour: "numeric", 
            minute: "numeric",
            second: "numeric"
        });
        $('#timer').append(time);
    }

    function renderConnectionTable(data) {
        $('#connectedTable').empty();
        $('#disconnectedTable').empty();
        let userData = '';
        data.forEach((user, index) => {
            userData= `
            <tr>
                <th>${index +1}</th>
                <td>${user.email}</td>
                <td>${user.connectionTime}</td>
                <td>${user.IP}</td>
            </tr>
            `
            if (user.connected) {
                $('#connectedTable').append(userData);
            } else {
                $('#disconnectedTable').append(userData);
            }
        });
    }

    initApp();
})