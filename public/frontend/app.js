$(document).ready(function () {
    const apiUrl = "api/real-estates";
    const propertiesList = $("#properties-list");
    const createForm = $("#createForm");

    // Fetch properties and display them
    function fetchProperties() {
        $.get(apiUrl, function (res) {
            const data = res.data;
            let listItems = "";
            $.each(data, function (index, property) {
                listItems += `<li>
                    <strong>${property.name}</strong> (${property.real_state_type})<br>
                    ${property.city}, ${property.country}<br>
                    <button class="edit-btn" onclick="editProperty(${property.id})">Edit</button>
                    <button class="delete-btn" onclick="deleteProperty(${property.id})">Delete</button>
                </li>`;
            });
            propertiesList.html(listItems);
        }).fail(function (error) {
            console.error("Error fetching properties:", error);
        });
    }

    // Add a new property
    $("#addPropertyBtn").on("click", function(e){
        e.preventDefault();
        $(".error").html('');

        const newProperty = {
            name: $("#name").val(),
            real_state_type: $("#real_state_type").val(),
            street: $("#street").val(),
            external_number: $("#external_number").val(),
            internal_number: $("#internal_number").val(),
            neighborhood: $("#neighborhood").val(),
            city: $("#city").val(),
            country: $("#country").val(),
            rooms: $("#rooms").val(),
            bathrooms: $("#bathrooms").val(),
            comments: $("#comments").val(),
        };

        $.ajax({
            url: apiUrl,
            method: "POST",
            contentType: "application/json",
            data: JSON.stringify(newProperty),
            success: function (res) {
                if (res.status) {
                    fetchProperties();
                    $("#realstateForm")[0].reset();
                    $("#successMsg").html(res.message).show();
                    setTimeout(function () {
                        $("#successMsg").html("").hide();
                    }, 3000);
                }
            },
            error: function (error) {
                if(!error.responseJSON.status){
                    var err = error.responseJSON.errors;
                    $.each(err, function (index, value) {
                        $(`#${index}Err`).html(value);
                    });
                }
                console.error("Error creating property:", error);
            },
        });
    });
    // Edit property
    $("#editPropertyBtn").on("click", function(e){
        e.preventDefault();
        $(".error").html('');

        const newProperty = {
            name: $("#name").val(),
            real_state_type: $("#real_state_type").val(),
            street: $("#street").val(),
            external_number: $("#external_number").val(),
            internal_number: $("#internal_number").val(),
            neighborhood: $("#neighborhood").val(),
            city: $("#city").val(),
            country: $("#country").val(),
            rooms: $("#rooms").val(),
            bathrooms: $("#bathrooms").val(),
            comments: $("#comments").val(),
        };
        var pId = $(this).attr('data-id');
        $.ajax({
            url: `${apiUrl}/${pId}`,
            method: "PATCH",
            contentType: "application/json",
            data: JSON.stringify(newProperty),
            success: function (res) {
                if (res.status) {
                    fetchProperties();
                    $("#realstateForm")[0].reset();
                    $("#editPropertyBtn").attr("data-id", '');
                    $("#editPropertyBtn").hide();
                    $("#addPropertyBtn").show();
                    $("#successMsg").html(res.message).show();
                    setTimeout(function () {
                        $("#successMsg").html("").hide();
                    }, 3000);
                }
            },
            error: function (error) {
                if(!error.responseJSON.status){
                    var err = error.responseJSON.errors;
                    $.each(err, function (index, value) {
                        $(`#${index}Err`).html(value);
                    });
                }
                console.error("Error creating property:", error);
            },
        });
    });

    // Delete a property
    window.deleteProperty = function (id) {
        $.ajax({
            url: `${apiUrl}/${id}`,
            method: "DELETE",
            success: function (res) {
                if(res.status){
                    fetchProperties();
                }
            },
            error: function (error) {
                console.error("Error deleting property:", error);
            },
        });
    };
    // Edit a property
    window.editProperty = function (id) {
        $.ajax({
            url: `${apiUrl}/${id}`,
            method: "GET",
            success: function (res) {
                if(res.status){
                    data = res.data;
                    $("#name").val(data.name);
                    $("#real_state_type").val(data.real_state_type);
                    $("#street").val(data.street);
                    $("#external_number").val(data.external_number);
                    $("#internal_number").val(data.internal_number);
                    $("#neighborhood").val(data.neighborhood);
                    $("#city").val(data.city);
                    $("#country").val(data.country);
                    $("#rooms").val(data.rooms);
                    $("#bathrooms").val(data.bathrooms);
                    $("#comments").val(data.comments);
                    $("#addPropertyBtn").hide();
                    $("#editPropertyBtn").attr("data-id", data.id);
                    $("#editPropertyBtn").show();
                }
            },
            error: function (error) {
                console.error("Error Editing property:", error);
            },
        });
    };
    fetchProperties();
});
