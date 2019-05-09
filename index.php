<?php include 'header.php';
include 'config.php';?>
<div class="container">
    <div class="row">
        <div class="col-md">
        </div>
        <div class="col-md-8">
            <form class="form" action="" method="POST">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Add your item 🙃</label>
                    <input type="text" name="text" class="form-control" id="exampleFormControlInput1" placeholder="Add your item" required>
                </div><button type="submit" class="btn btn-primary mb-2">Add</button>
            </form>
            <div class="blockItem">
                <?php include 'todo.php';?>
            </div>
        </div>
        <div class="col-md">
        </div>
    </div>
</div>
<?php include 'footer.php'?>