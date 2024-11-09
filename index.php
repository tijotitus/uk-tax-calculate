<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UK Income Tax Calculator</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header text-center bg-primary text-white">
                        <h2>UK Income Tax Calculator</h2>
                    </div>
                    <div class="card-body">
                        <form id="taxForm">
                            <div class="form-group">
                                <label for="income">Enter Your Income (£):</label>
                                <input type="number" id="income" name="income" class="form-control" placeholder="e.g., 50000" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Calculate Tax</button>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <h4>Tax Payable: £<span id="taxOutput">0.00</span></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#taxForm').on('submit', function(event) {
                event.preventDefault();
                let income = $('#income').val();

                $.ajax({
                    url: 'calculate_tax.php',
                    type: 'POST',
                    data: { income: income },
                    success: function(response) {
                        $('#taxOutput').text(response);
                    },
                    error: function() {
                        alert('An error occurred while calculating the tax.');
                    }
                });
            });
        });
    </script>
</body>
</html>
