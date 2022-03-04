window.addEventListener("load", function () {
    var signup_form = document.getElementById("login");
        signup_form.addEventListener("submit", function (event) {
        var XHR = new XMLHttpRequest();
        var form_data = new FormData(signup_form);

        // On success
        XHR.addEventListener("load", signup_success);

        // On error
        XHR.addEventListener("error", on_error);

        // Set up request
        XHR.open("POST", "form_submit.php");

        // Form data is sent with request
        XHR.send(form_data);
        document.getElementById("loading").style.display = 'block';
        event.preventDefault();
    });

        var import_csv = document.getElementById("import");
        import_csv.addEventListener("submit", function (event) {
        var XHRS = new XMLHttpRequest();
        var import_data = new FormData(import_csv);

        // On success
        XHRS.addEventListener("load", import_success);

        // On error
        XHRS.addEventListener("error", on_error);

        // Set up request
        XHRS.open("POST", "import.php");
        // Form data is sent with request
        XHRS.send(import_data);

        document.getElementById("loading").style.display = 'block';
        event.preventDefault();
    });

});

var signup_success = function (event) {
    document.getElementById("loading").style.display = 'none';

    var response = JSON.parse(event.target.responseText);
    if (response.success) {
        alert(response.message);
        window.location.href = "import.php";
    } else {
        alert(response.message);
    }
};

var import_success = function (event) {
    document.getElementById("loading").style.display = 'none';

    var response = JSON.parse(event.target.responseText);
    if (response.success) {
        alert(response.message);
        // window.location.href = "import.php";
    } else {
        alert(response.message);
    }
};



var on_error = function (event) {
    document.getElementById("loading").style.display = 'none';

    alert('Oops! Something went wrong.');
};