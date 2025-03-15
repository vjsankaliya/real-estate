<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">  
    <link rel="stylesheet" href="{{asset('frontend/style.css')}}">
</head>
<body>
    <div id="app">
        <h1>Real Estate Management</h1>
        <div class="alert alert-success" id="successMsg" style="display:none;" role="alert">

        </div>

        <form id="realstateForm">
            <input class="form-control" type="text" name="name" id="name" placeholder="Name" >
            <lable class="error" id="nameErr"></lable>
            <select class="form-select" name="real_state_type" id="real_state_type">
                <option value="house">House</option>
                <option value="department">Department</option>
                <option value="land">Land</option>
                <option value="commercial_ground">Commercial Ground</option>
            </select>
            <lable class="error" id="real_state_typeErr"></lable>
            <input class="form-control" type="text" name="street" id="street" placeholder="Street" >
            <lable class="error" id="streetErr"></lable>
            <input class="form-control" type="text" name="external_number" id="external_number" placeholder="External Number">
            <lable class="error" id="external_numberErr"></lable>
            <input class="form-control" type="text" name="internal_number" id="internal_number" placeholder="Internal Number">
            <lable class="error" id="internal_numberErr"></lable>
            <input class="form-control" type="text" name="neighborhood" id="neighborhood" placeholder="Neighborhood">
            <lable class="error" id="neighborhoodErr"></lable>
            <input class="form-control" type="text" name="city" id="city" placeholder="City">
            <lable class="error" id="cityErr"></lable>
            <input class="form-control" type="text" name="country" id="country" placeholder="Country (ISO 2 code)">
            <lable class="error" id="countryErr"></lable>
            <input class="form-control" type="number" name="rooms" id="rooms" placeholder="Rooms">
            <lable class="error" id="roomsErr"></lable>
            <input class="form-control" type="number" name="bathrooms" id="bathrooms" placeholder="Bathrooms">
            <lable class="error" id="bathroomsErr"></lable>
            <textarea class="form-control" name="comments" id="comments" placeholder="Comments"></textarea>
            <lable class="error" id="commentsErr"></lable>
            <button type="submit" id="addPropertyBtn">Add Property</button>
            <button type="submit" id="editPropertyBtn" data-id="" style="display:none;">Edit Property</button>
        </form>
        
        <h2>Properties List</h2>
        <ul id="properties-list">
            
        </ul>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{asset('frontend/app.js')}}"></script>
</body>
</html>