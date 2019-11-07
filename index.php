<?php include 'view/header.php'; ?>
<div class="container">

    <h1>ToDo List</h1>

    <form method="post">
        <div class="mb-2">

            <table class="table table-borderless">
                <tbody>
                <tr>
                    <td class="largeBox"><input type="text" name="listName" class="form-control" placeholder="enter a mame for the list"
                               required></td>
                    <td class="smallBox">
                        <button type="submit" name="btn" class="btn btn-dark mb-2">Add list</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </form>
    <?php
    include 'config/listsConfig.php';
    global $page, $pageCount;
    ?>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col" class="largeBox">Lists</th>
            <th scope="col" class="smallBox">Edit</th>
            <th scope="col" class="smallBox">Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($res as $re) {
            $id = $re['id'] . ' ';

            ?>
            <tr>
                <td class="largeBox"><?= ' <a href="tasks.php?id=' . $re['id'] . '">' . $re['list_name'] . '</a>'; ?></td>
                <td class="smallBox"><?= ' <a href="edit/editList.php?edit=' . $re['id'] . '">Edit</a>'; ?></td>
                <td class="smallBox"><?= ' <a href="?del=' . $re['id'] . '">Delete</a><br>'; ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <nav>
        <ul class="pagination">
            <li class="page-item">
                <?php
                if ($page != 1) {
                    $prev = $page - 1;

                    echo '<a class="page-link" href="?page=' . $prev . '" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>';
                }
                ?>
            </li>
            <?php
            for ($i = 1; $i <= $pageCount; $i++) {
                echo '<li class="page-item">';
                echo '<a class="page-link" href="?page=' . $i . '">' . $i . '</a >';
                echo '</li>';
            }
            ?>
            <li class="page-item">
                <?php
                if ($page != $pageCount) {
                    $prev = $page + 1;
                    echo '<a class="page-link" href="?page=' . $prev . '" aria-label = "Next" >
                <span aria-hidden = "true" >&raquo;</span>
            </a>';
                }
                ?>
            </li>
        </ul>
    </nav>
</div>
</body>
</html>