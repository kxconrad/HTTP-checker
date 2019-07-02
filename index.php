<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>RBDev recrutation task</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>

    <body>
        <div class="container">

            <div class="d-flex align-items-center justify-content-center mt-5 flex-column" id="fields">
                <h3>Check your web url HTTP status</h3>
                <div class="flex-row">
                    <button type="button" class="btn btn-primary" id="new-btn">Add new</button>
                    <button type="button" class="btn btn-success" id="check-btn">Check</button>
                </div>
                <div class="input-group mt-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Web url</span>
                    </div>
                    <input type="text" class="form-control url-input" placeholder="url" data-id="1">
                    <button type="button" class="btn btn-danger ml-2 disabled remove-btn">Remove</button>
                </div>

            </div>
            <div class="d-flex align-items-center justify-content-center mt-5 flex-column response"></div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="js/main.js"></script>
    </body>

</html> 
