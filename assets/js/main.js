$(document).ready(() => {
    
    let intervalAmount = 3000;

    function initApp() {
        requestData();
        setInterval(requestData, intervalAmount);
    }
    function requestData() {
        $.ajax({
            type: "GET",
            url: "http://localhost/UMS01/users",
            success: (data, textStatus, request) => {
                // console.log(textStatus, request);
                // console.log(data);
                // console.log(JSON.parse(data));
                renderTimer();
                try {
                    let parsedData = JSON.parse(data);
                    // console.log(parsedData);
                    renderConnectionTable(parsedData);
                } catch (err) {
                    console.log(err);
                    renderErrorTable('ERROR:', 'No data received');
                    // initApp(); //if failed to load data run again
                }
            },
            error: (xhr, status, err) => {
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

    function renderErrorTable(errMsgHeader, errMsgContent) {
        let errMsg = `<div class="alert alert-danger" id="alertError" role="alert"><b>${errMsgHeader}</b> ${errMsgContent}</div>`
        $('#tableContainer').empty().append(errMsg);
    }

    initApp();
})