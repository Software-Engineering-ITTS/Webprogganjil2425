<?php 
include("DBConnection.php");
include("heder.php");
?>

<h1>Tabel Data User</h1>

<?php 
$sql = 'SELECT * FROM user';
$sql = $statement->query($sql);
$data = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- untuk table -->
<table>
    <tr>
        <th>NIM</th>
        <th>Nama</th>
        <th>Status</th>
        <th>Opersa</th>
    </tr>
        echo "<tr>";
        echo "<td>".$row['nim']."</td>";
        echo "<td>".$row['nama']."</td>";
        echo "<td>".$row['status']."</td>";
        echo "<td>
            <a href='edit.php?id=".$row['id']."'>Edit</a> |
            <a href='delete.php?id=".$row['id']."'>Delete</a>
        </td>";
        echo "</tr>";
    }
</table>
<?php include("footer.php");?>

