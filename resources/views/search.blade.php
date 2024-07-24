<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<body style="background-color: #d5d8db;">
    <div class="container">
        <h2>Search</h2>
        <input type="text" id="search" class="form-control mb-3">
        <div id="userCardContainer" class="row">
            <!-- Cards will be appended here -->
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#search').on('keyup', function() {
                var value = $(this).val();
                $.ajax({
                    url: '{{ route("search") }}',
                    type: 'GET',
                    data: {
                        value: value
                    },
                    success: function(response) {
                        $('#userCardContainer').empty();
                        response.users.forEach(function(user) {
                            var card = `
                                <div class="col-md-4 mb-3">
                                    <div class="card" style="background-color: #ffffff;">
                                        <div class="card-body">
                                            <h5 class="card-title">${user.name}</h5>
                                            <p class="card-text">${user.department ? user.department.name : 'null'}</p>
                                            <p class="card-text">${user.designation ? user.designation.name : 'null'}</p>
                                            <p class="card-text">${user.phone_number}</p>
                                        </div>
                                    </div>
                                </div>`;
                            $('#userCardContainer').append(card);
                        });
                    }
                });
            });
        });
    </script>
</body>

</html>