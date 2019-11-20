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
<ul>
    
    <?php if(isset($_GET)): ?>
        <?php foreach ($whereresults as $row): ?>
      <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>
        <?php endforeach; ?>
        <?php endif; ?>
</ul>