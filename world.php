<?php
$host = getenv('IP');
$username = 'jordanne';
$password = 'jordanne';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
 $country = $_GET['country'];
 $countrieswhere = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
$whereresults= $countrieswhere->fetchAll(PDO::FETCH_ASSOC);

?>
 <table>
    <tr>
                <th> Country Name</th>
                <th> Continent</th>
                <th> Independence Year</th>
                <th> Head of State</th>
            </tr>
    <?php if(isset($_GET)): ?>
            <?php foreach ($whereresults as $row): ?>
                <tr>
                    <td><?= $row['name']; ?></td>
                    <td><?= $row['continent']; ?></td>
                    <td><?=$row['independence_year']; ?></td>
                    <td><?= $row['head_of_state']; ?> </td>
</tr>
            <?php endforeach; ?>
       
    <?php endif; ?>
 </table>