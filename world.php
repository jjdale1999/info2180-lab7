<?php
$host = getenv('IP');
$username = 'jordanne';
$password = 'jjdale';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<ul>
    <?php if(isset($_GET)): ?>
        <?php $country = $_GET['country']; ?>
        <?php $countrieswhere = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");?>
        <?php $whereresults= $countrieswhere->fetchAll(PDO::FETCH_ASSOC);?>

<?php foreach ($whereresults as $row): ?>
  <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>
<?php endforeach; ?>
</ul>