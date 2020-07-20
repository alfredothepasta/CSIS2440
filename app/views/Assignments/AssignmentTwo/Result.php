<div class="container">
    <img src="/public/img/AssignmentTwo/YOUFELLFORITFOOL.jpg" alt="YOU FELL FOR IT FOOL">
    <h1 class="text-center">THUNDER CROSS SPLIT ATTACK</h1>

    <h3>Your info:</h3>
    <table class="table">
        <th>First Name:</th>
        <th>Last Name:</th>
        <th>Birth Date:</th>
        <th>E-Mail:</th>
        <th>&nbsp;</th>
        <?php
        echo '<tr><td>' . $_SESSION['FirstName'] . '</td>'
            . '<td>' . $_SESSION['LastName'] . '</td>'
            . '<td>' . $_SESSION['Birthdate'] . '</td>'
            . '<td>' . $_SESSION['eMail'] . '</td>'
            . '<td><a href="/Assignments/A2/UpdateInfo" class="btn btn-secondary">Edit</a></td>';
        ?>
    </table>

    <hr>

    <form method="post" action="/Assignments/A2/Result">

        <div class="form-group">
            <div class="row">
                <div class="col-10">
                    <label for="search">Search the other poor fools who gave me all their info:</label>
                    <input type="text" name="search" class="form-control form-control-lg">
                </div>
                <div class="col">
                    <br>
                    <input class="btn-lg btn-secondary" type="submit" value="submit">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="searchBy" >Search By: </label>
            <select name="searchBy" class="form-control" id="">
                <option value="FirstName">First Name</option>
                <option value="LastName">Last Name</option>
                <option value="eMail">eMail</option>
            </select>
        </div>
    </form>

    <table class="table">
        <th>First Name:</th>
        <th>Last Name:</th>
        <th>Birth Date:</th>
        <th>E-Mail:</th>
        <?php
//        print_r($data['resultSet']);
        foreach ($data['resultSet'] as $row){
            echo '<tr><td>' . $row->FirstName . '</td>'
                . '<td>' . $row->LastName . '</td>'
                . '<td>' . $row->Birthdate . '</td>'
                . '<td>' . $row->eMail . '</td>';
        }


        ?>
    </table>
</div>
