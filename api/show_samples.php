<?php
$mysqli = new mysqli("localhost", "root", "", "food_db");
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
?>
<style>

.confetti-button {
  font-family: 'Helvetica', 'Arial', sans-serif;
  display: inline-block;
  font-size: 1em;
  padding: 1em 2em;
  margin-top: 100px;
  margin-bottom: 60px;
  -webkit-appearance: none;
  appearance: none;
  background-color: #2cb34a;
  color: #fff;
  border-radius: 4px;
  border: none;
  cursor: pointer;
  position: relative;
  transition: transform ease-in 0.1s, box-shadow ease-in 0.25s;
}

.confetti-button:focus {
  outline: 0;
}

.confetti-button:before, .confetti-button:after {
  position: absolute;
  content: '';
  display: block;
  width: 140%;
  height: 100%;
  left: -20%;
  z-index: -1000;
  transition: all ease-in-out 0.5s;
  background-repeat: no-repeat;
}

.confetti-button:before {
  display: none;
  top: -75%;
  background-image: radial-gradient(circle, #6dc25a 20%, transparent 20%), radial-gradient(circle, transparent 20%, #2cb34a 20%, transparent 30%), radial-gradient(circle, #2cb34a 20%, transparent 20%), radial-gradient(circle, #2cb34a 20%, transparent 20%), radial-gradient(circle, transparent 10%, #6dc25a 15%, transparent 20%), radial-gradient(circle, #6dc25a 20%, transparent 20%), radial-gradient(circle, #6dc25a 20%, transparent 20%), radial-gradient(circle, #bee461 20%, transparent 20%), radial-gradient(circle, #bee461 20%, transparent 20%);
  background-size: 10% 10%, 20% 20%, 15% 15%, 20% 20%, 18% 18%, 10% 10%, 15% 15%, 10% 10%, 18% 18%;
}

.confetti-button:after {
  display: none;
  bottom: -75%;
  background-image: radial-gradient(circle, #2cb34a 20%, transparent 20%), radial-gradient(circle, #bee461 20%, transparent 20%), radial-gradient(circle, transparent 10%, #bee461 15%, transparent 20%), radial-gradient(circle, #bee461 20%, transparent 20%), radial-gradient(circle, #bee461 20%, transparent 20%), radial-gradient(circle, #2cb34a 20%, transparent 20%), radial-gradient(circle, #2cb34a 20%, transparent 20%);
  background-size: 15% 15%, 20% 20%, 18% 18%, 20% 20%, 15% 15%, 10% 10%, 20% 20%;
}

.confetti-button:active {
  transform: scale(0.9);
  background-color: #6dc25a;
}

.confetti-button.animate:before {
  display: block;
  animation: topBubbles ease-in-out 0.75s forwards;
}

.confetti-button.animate:after {
  display: block;
  animation: bottomBubbles ease-in-out 0.75s forwards;
}

@keyframes topBubbles {
  0% {
    background-position: 5% 90%, 10% 90%, 10% 90%, 15% 90%, 25% 90%, 25% 90%, 40% 90%, 55% 90%, 70% 90%;
  }
  50% {
    background-position: 0% 80%, 0% 20%, 10% 40%, 20% 0%, 30% 30%, 22% 50%, 50% 50%, 65% 20%, 90% 30%;
  }
  100% {
    background-position: 0% 70%, 0% 10%, 10% 30%, 20% -10%, 30% 20%, 22% 40%, 50% 40%, 65% 10%, 90% 20%;
    background-size: 0% 0%, 0% 0%, 0% 0%, 0% 0%, 0% 0%, 0% 0%;
  }
}
@keyframes bottomBubbles {
  0% {
    background-position: 10% -10%, 30% 10%, 55% -10%, 70% -10%, 85% -10%, 70% -10%, 70% 0%;
  }
  50% {
    background-position: 0% 80%, 20% 80%, 45% 60%, 60% 100%, 75% 70%, 95% 60%, 105% 0%;
  }
  100% {
    background-position: 0% 90%, 20% 90%, 45% 70%, 60% 110%, 75% 80%, 95% 70%, 110% 10%;
    background-size: 0% 0%, 0% 0%, 0% 0%, 0% 0%, 0% 0%, 0% 0%;
  }
}

  </style>
<?php
$query = 'SELECT cost,category,name from food';
echo ' <h2>Blood Samples List</h2>
<div class="row"style="box-sizing:border-box;">';
if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
       echo '<div class="column">
        <div class="card">
        
          <div class="container">
            <h2>'.$row['name'].'</h2>
            <p class="title">Cost : '.$row['cost'].'</p>
            <p>Category  :  '.$row['category'].'</p>
            <button onclick=location.href="thank_you.php" class="confetti-button">Add to Order</button>
          </div>
        </div>
      </div>';
    }
    $result->free();
}

echo '</div>';

?>