<?php 
include './shared/head.php';
include './shared/nav.php';

include './app/functions.php';
auth();

?>
    
<!-- Home -->
    <div class="container">
        <div class="row">
            <div class="col-12" style="margin: auto; margin-top:1%">
              <h1 class="text-center display-1 pt-1">Homepage</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-11" style="margin: auto; margin-top:5%">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>
<?php 
include './shared/script.php';
?>