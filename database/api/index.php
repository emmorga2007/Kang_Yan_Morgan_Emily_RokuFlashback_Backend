<?php
  // route requests for CRUD
  require('../config/connect.php');

  $query = "SELECT * FROM movies";

  if (isset($_GET['id'])) {
    $movID = $_GET['id'];
    $query .= ' WHERE id="'.$movID.'"';
  }

  if (isset($_GET['rating_id'])) {
    $movRating = $_GET['rating_id'];
    //$query .= ' WHERE rating_id = "' . $movRating . '"';
      switch ($movRating) {
        case "1":
          $query .= ' WHERE rating_id = 1';
          break;
        case "2":
          $query .= ' WHERE rating_id <= 2';
          break;
        case "3":
          $query .= ' WHERE rating_id <= 3';
          break;
        case "4":
          $query .= ' WHERE rating_id <= 4';
          break;
        case "5":
          $query .= ' WHERE rating_id <= 5';
          break;
      }
          
  }

  $result = array();
  $runQuery = $pdo->query($query);

  while($row = $runQuery->fetchAll(PDO::FETCH_ASSOC)) {
    $result[] = $row;
  }

  echo json_encode($result);
