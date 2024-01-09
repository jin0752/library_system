<?php
    $Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
    file_put_contents('UIDContainer.php',$Write);
?>

<?php
include 'database.php';

// Fetch and display data from the "STUDENT_LOGS" database
$pdo = Database::connect();
$sql = 'SELECT * FROM student_logs';
$rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
Database::disconnect();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <style>
        html {
            font-family: Arial;
            display: inline-block;
            margin: 0px auto;
            text-align: center;
            padding-top: 40px;
        }

        ul.topnav {
			list-style-type: none;
			margin: auto;
			overflow: hidden;
			
			position: fixed;
    		top: 0;
    		left: 0;
    		width: 100%;
    		background: #379c44;
    		height: 60px;
   			z-index: 100;
		}

        ul.topnav li {float: left;}

        ul.topnav li a {
			display: block;
			color: white;
			text-align: center;
			padding: 20px 100px;
			text-decoration: none;
			height: 60px;
		}

        ul.topnav li a:hover:not(.active) {background-color: #3e8e41;}

        ul.topnav li a.active {background-color: #333;}

        ul.topnav li.right {float: right;}

        @media screen and (max-width: 600px) {
            ul.topnav li.right, 
            ul.topnav li {float: none;}
        }
        
        .table {
            margin: auto;
            width: 90%; 
        }
        
        .thead {
            color: #FFFFFF;
        }

        .search-input {
            margin-bottom: 10px;
        }
    </style>

<script>
    // Function to filter the table based on user input
    function filterTable(columnIndex) {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput" + columnIndex);
        filter = input.value.toUpperCase();
        table = document.getElementById("dataTable");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[columnIndex];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

   function exportTableToPDF() {
    var sTable = document.getElementById('dataTable').cloneNode(true);

    // Remove the "Action" column from the cloned table
    // var headerRow = sTable.getElementsByTagName('tr')[0];
    // headerRow.removeChild(headerRow.lastElementChild);

    var rows = sTable.getElementsByTagName('tr');

    var content = '<table style="width:100%; border-collapse: collapse;">';
    
    // Iterate through each row and column to build the table content
    for (var i = 0; i < rows.length; i++) {
        var cols = rows[i].children;
        content += '<tr>';

        // Exclude the last column (Action) when building the content
        for (var j = 0; j < cols.length; j++) {
            if (j !== cols.length - 1) {
                if (i === 0) {
                    // Use th for the first row (header row)
                    content += '<th style="border: 1px solid #000; padding: 8px; background-color: #10a0c5; color: #FFF;">' + cols[j].innerText + '</th>';
                } else {
                    // Use td for data rows
                    content += '<td style="border: 1px solid #000; padding: 8px; text-align: center;">' + cols[j].innerText + '</td>';
                }
            }
        }

        content += '</tr>';
    }

    content += '</table>';

    var style = "<style>";
    style = style + "table {width: 100%;font: 17px Calibri;}";
    style = style + "th, td {border: solid 1px #000;border-collapse: collapse;padding: 8px;text-align: center;}";
    style = style + "</style>";

    // CREATE A WINDOW OBJECT.
    var win = window.open('', '', 'height=700,width=700');

    win.document.write('<html><head>');
    win.document.write('<title>USER DATA</title>');   // <title> FOR PDF HEADER.
    win.document.write(style);          // ADD STYLE INSIDE THE HEAD TAG.
    win.document.write('</head>');
    win.document.write('<body>');
    win.document.write(content);         // THE TABLE CONTENTS INSIDE THE BODY TAG.
    win.document.write('</body></html>');

    win.document.close();   // CLOSE THE CURRENT WINDOW.

    win.print();    // PRINT THE CONTENTS.
}
</script>

    <title>User Data : NodeMCU V3 ESP8266 / ESP12E with MYSQL Database</title>
</head>

<body>
    <ul class="topnav">
    <li><a href="../dashboard.php">Dashboard</a></li>
        <li><a href="user data.php">User Data</a></li>
        <li><a href="registration.php">Registration</a></li>
        <li><a href="read tag.php">Read Tag ID</a></li>
        <li><a class="active" href="syslog.php">System Log</a></li>
    </ul>
    <br>
    <div class="container">
        <div class="row">
            <h3>Student Log Table</h3>
        </div>
        <div class="row">
            <?php
            // Add a search input for each column
            $columns = ['ID', 'NAME', 'DATE'];
            for ($i = 0; $i < count($columns); $i++) {
                echo '<input type="text" class="search-input" id="searchInput' . $i . '" onkeyup="filterTable(' . $i . ')" placeholder="Search for ' . $columns[$i] . '...">';
            }
            ?>
            <div>
                <button onclick="exportTableToPDF()">Export to PDF</button>
            </div>
            <table class="table table-striped table-bordered" id="dataTable">
                <thead>
                    <tr bgcolor="#379c44" color="#FFFFFF">
                        <th>ID</th>
                        <th>NAME</th>
                        <th>DATE</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($rows as $row) {
                        echo '<tr>';
                        echo '<td>' . $row['id'] . '</td>';
                        echo '<td>' . $row['name'] . '</td>';
                        echo '<td>' . $row['date'] . '</td>';
                        echo '<td><a class="btn btn-danger" href="syslog data delete page.php?id=' . $row['id'] . '">Delete</a>';
                        echo '</td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div> <!-- /container -->
</body>
</html>