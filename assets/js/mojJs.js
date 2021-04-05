$(document).ready(function () {
    $("#btnRegister").on("click", validateAndRegister);
    $(".countOnMe").on("click", reserveEvent);
    $("#btnReserve").on("click", reserveTable);
    $(".ddls").on("change", getFilterAndSortInfo);
    $("#ddlCategories").on("change", filterByCategory);
    $("#ddlPrice").on("change", filterByPrice);


    var idCategory;
    var sort;
    var str;

    function getFilterAndSortInfo() {
        idCategory = Number($("#ddlCategories").val());
        sort = Number($("#ddlPrice").val());
        str = $(this).find(":selected").data("str");
    }


    function filterByPrice() {
        let sort = $(this).val();
        let idCategoryValue = idCategory;
        let _GETstr = str;

        $.ajax({
            url: "models/filterAndSort/filterAndSort.php",
            method: "POST",
            data: {
                idCategory: idCategoryValue,
                sortValue: sort,
                str: _GETstr,
                sent: true
            },
            dataType: "json",
            success: function (data) {
                console.log(data);
                printFood(data);
            },
            error: function (xhr, error, status) {
                let code = xhr.status;
                switch (code) {
                    case 404:
                        alert("You need to be logged in.");
                        break;
                    case 409:
                        alert("There is already someone who has reserved the same date");
                        break;
                    case 422:
                        alert("Invalid data, please check your entered data.");
                        break;
                    case 500:
                        alert("Server error, please try again");
                        break;
                    default:
                        alert("Error: " + code + ", " + error)
                        break;
                }
            }
        });
    }




    function printFood(data) {
        let print = `<div class="row row-padded" id="foodMenuAndCategories">`;


        for (catItem of data.category) {


            print += `
            <div class="col-md-6">
            <div class="fh5co-food-menu">
                <div class="category">
                    <img src="assets/images/${catItem.src}" alt="${catItem.alt}">
                    <h2 class="">${catItem.name}</h2>
                    <div class="cistac"></div>
                </div>
                <ul>
                `;
            for (let foodItem of data.food) {
                if (foodItem.catName == catItem.name) {

                    print += `
            
                    <li>
                        <div class="fh5co-food-desc">
                            <figure>
                                <img src="assets/images/${foodItem.src}" class="img-responsive" alt="${foodItem.alt}">
                            </figure>
                            <div>
                                <h3>${foodItem.name}</h3>
                                <p>${foodItem.description}</p>
                            </div>
                        </div>
                        <div class="fh5co-food-pricing">
                        ${foodItem.oldPrice}
                        </div>
                    </li>`
                }
            }
            print += `     </ul>
            </div>
        </div>
        `;
        }
        print += `</div>
				<div class="row">
					<div class="col-md-12 col-lg-8 col-md-offset-2 text-center">
                        `;
        for (let i = 1; i <= data.numOfPages; i++) {
            let active = data.str == i ? "activeStrLink" : "";
            print += `
						<a href="index.php?page=home&str=${i}" class="btn btn-primary btn-outline ${active}">${i}</a>
                        `;
        }
        print += `
					</div>
                </div>
            
                `




        document.getElementById("together").innerHTML = print;
    }

    function filterByCategory() {
        let idCategory = $(this).val();
        let sortValue = sort;
        let _GETstr = str;
        console.log(_GETstr);
        $.ajax({
            url: "models/filterAndSort/filterAndSort.php",
            method: "POST",
            data: {
                idCategory: idCategory,
                sortValue: sortValue,
                str: _GETstr,
                sent: true
            },
            dataType: "json",
            success: function (data) {
                console.log(data);
                printFood(data);
            },
            error: function (xhr, error, status) {
                let code = xhr.status;
                switch (code) {
                    case 404:
                        alert("You need to be logged in.");
                        break;
                    case 409:
                        alert("There is already someone who has reserved the same date");
                        break;
                    case 422:
                        alert("Invalid data, please check your entered data.");
                        break;
                    case 500:
                        alert("Server error, please try again");
                        break;
                    default:
                        alert("Error: " + code + ", " + error)
                        break;
                }
            }
        });
    }


    function reserveTable() {
        let time = $("#timeOfReservation").val();
        let date = $("#dateOfReservation").val();
        let numOfPpl = $("#number").val();
        let msg = $("#message").val();
        let idOccasion = $("#occation").val();
        $.ajax({
            url: "models/contactReservationPrice/insertForm.php",
            method: "POST",
            data: {
                time: time,
                date: date,
                numOfPpl: numOfPpl,
                msg: msg,
                idOccasion: idOccasion,
                sent: true
            },
            dataType: "json",
            success: function (data) {
                alert("You successfuly reserved!");
            },
            error: function (xhr, error, status) {
                let code = xhr.status;
                switch (code) {
                    case 404:
                        alert("You need to be logged in.");
                        break;
                    case 409:
                        alert("There is already someone who has reserved the same date");
                        break;
                    case 422:
                        alert("Invalid data, please check your entered data.");
                        break;
                    case 500:
                        alert("Server error, please try again");
                        break;
                    default:
                        alert("Error: " + code + ", " + error)
                        break;
                }
            }
        });
    }

    $(function () {
        var date = new Date();

        let monthNow = date.getMonth() + 1;
        let monthNext = date.getMonth() + 4;
        let day = date.getDate();
        let year = date.getFullYear();

        if (monthNow < 10) {
            monthNow = '0' + monthNow.toString();
        }
        if (monthNext < 10) {
            monthNext = '0' + monthNext.toString();
        }
        if (day < 10) {
            day = '0' + day.toString();
        }

        let minDate = year + '-' + monthNow + '-' + day;
        let maxDate = year + '-' + monthNext + '-' + day;
        $("#dateOfReservation").attr("min", minDate);
        $("#dateOfReservation").attr("max", maxDate);
    })




    function reserveEvent(e) {
        e.preventDefault();
        let idDOE = $(this).data('iddoe');
        let idEvent = $(this).data('idevent');


        $.ajax({
            url: "models/events/countOnMe.php",
            method: "POST",
            data: {
                idDOE: idDOE,
                idEvent: idEvent,
                sent: true
            },
            dataType: "json",
            success: function (data) {
                alert("Thanks, we count on you!");
                $("[data-iddoespan=" + "'" + idDOE + "']").html(data);
            },
            error: function (xhr, error, status) {
                let code = xhr.status;
                switch (code) {
                    case 404:
                        alert("You need to be logged in.");
                        break;
                    case 409:
                        alert("You have already voted.");
                        break;
                    case 422:
                        alert("Invalid data.");
                        break;
                    case 500:
                        alert("Server error, please try again");
                        break;

                    default:
                        alert("Error: " + code + ", " + error)
                        break;
                }
            }
        });
    }

    function validateAndRegister() {
        let valid = true;

        let name = $("#nameReg").val().trim();
        let surname = $("#surnameReg").val().trim();
        let email = $("#emailReg").val().trim();
        let pass = $("#passwordReg").val().trim();
        let confPass = $("#ConfPasswordReg").val().trim();

        let nameSurnameRegex = /^[A-Z][a-z]{1,29}(\s[A-Z][a-z])?$/;
        let emailRegex = /^[\w][\w\_\-\.\d]+\@[\w]+(\.[\w]+)?(\.[a-z]{2,3})$/;
        let passRegex = /^[\w\-\!\@\#\$\%\^\&\*\(\)\_\+\d]{6,}$/;

        if (name == "") {
            $("#nameErr").html("Name mustn't be blank.");
            $("#nameErr").addClass("error");
            valid = false;
        } else if (!nameSurnameRegex.test(name)) {
            $("#nameErr").html("Name can contain maximum 2 words,with first letter uppercase");
            $("#nameErr").addClass("error");
            valid = false;
        } else {
            $("#nameErr").removeClass("error");
            $("#nameErr").html("");
        }

        if (surname == "") {
            $("#surnameErr").html("Surname mustn't be blank.");
            $("#surnameErr").addClass("error");
            valid = false;
        } else if (!nameSurnameRegex.test(surname)) {
            $("#surnameErr").html("Surname can contain maximum 2 words,with first letter uppercase");
            $("#surnameErr").addClass("error");
            valid = false;
        } else {
            $("#surnameErr").removeClass("error");
            $("#surnameErr").html("");
        }

        if (email == "") {
            $("#emailErr").html("Email mustn't be blank.");
            $("#emailErr").addClass("error");
            valid = false;
        } else if (!emailRegex.test(email)) {
            $("#emailErr").html("Email isn't in good format.");
            $("#emailErr").addClass("error");
            valid = false;
        } else {
            $("#emailErr").removeClass("error");
            $("#emailErr").html("");
        }

        if (pass == "") {
            $("#passwordErr").html("Password mustn't be blank.");
            $("#passwordErr").addClass("error");
            valid = false;
        } else if (!passRegex.test(pass)) {
            $("#passwordErr").html("Password should contains at least 6 characters.");
            $("#passwordErr").addClass("error");
            valid = false;
        } else {
            $("#passwordErr").removeClass("error");
            $("#passwordErr").html("");
        }

        if (confPass == "") {
            $("#ConfPasswordErr").html("This filed mustn't be blank.");
            $("#ConfPasswordErr").addClass("error");
            valid = false;
        } else if (confPass != pass) {
            $("#ConfPasswordErr").html("Passwords do not match.");
            $("#ConfPasswordErr").addClass("error");
            valid = false;
        } else {
            $("#ConfPasswordErr").removeClass("error");
            $("#ConfPasswordErr").html("");
        }

        let registerData = {
            name: name,
            surname: surname,
            email: email,
            pass: pass,
            confPass: confPass,
            sent: true
        }

        if (valid) {
            $.ajax({
                url: "models/register.php",
                method: "POST",
                dataType: "json",
                data: registerData,
                success: function (data) {
                    console.log(data);
                    alert("You have successfuly registered!");
                    location.replace("index.php?page=login");
                },
                error: function (xhr, error, status) {
                    let code = xhr.status;

                    let errorsJson = xhr.responseJSON;
                    let errors = "";
                    for (let item of errorsJson) {

                        errors += item + "<br/>";
                    }
                    $("#errorsReg").html(errors);

                    let msg = "Error occured";

                    switch (code) {
                        case 404:
                            msg = "Page not found";
                            break;
                        case 409:
                            msg = "Email already exists";
                            break;
                        case 422:
                            msg = "Data not valid";
                            break;
                        case 500:
                            msg = "Server error please try again";
                            break;
                    }

                    alert(msg);
                }
            });
        }
    }
})