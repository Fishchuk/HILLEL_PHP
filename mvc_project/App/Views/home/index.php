<?php
\Core\View::render('parts/header.php', ['title' => 'HomePage']);
?>
<div class="container">
    <div class ="row">
        <div class="col-md-4">
            <h2>Heading</h2>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus.</p>
            <p><a class="btn btn-secondary" href="#" role="button">View details</a> </p>
        </div>
        <div class="col-md-4">
            <h2>Heading</h2>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus.</p>
            <p><a class="btn btn-secondary" href="#" role="button">View details</a> </p>
        </div>
        <div class="col-md-4">
            <h2>Heading</h2>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus.</p>
            <p><a class="btn btn-secondary" href="#" role="button">View details</a> </p>
        </div>
    </div>
    <hr>

</div>
<?php
\Core\View::render('parts/footer.php');?>
