<?php
  try
  {
    /**
     * Connection configuration
     */
    $host = '';
    $db = '';
    $user = '';
    $password = '';

    /**
     * Get the term sent by the autocomplete widget
     */
    $name = trim(strip_tags($_GET['term']));

    /**
     * Connect to BD
     */
    $con = new PDO("mysql:host=$host;dbname=$db", $user, $password);
    $con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $con->exec('SET CHARACTER SET utf8');

    /**
     * Prepare and execute query
     */
    $stmt = $con->prepare('SELECT * FROM population WHERE location LIKE ? ORDER BY population DESC LIMIT 0, 10');
    $stmt->bindValue(1, "%$name%", PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll();

    /**
     * Check the result and build a result array if necessary
     */
    if (count($result))
    {
      $locations = [];

      foreach ($result as $row)
      {
        $city = [];
        $city['value'] = $row['location'];
        $city['slug'] = $row['slug'];
        $locations[] = $city;
      }

      echo json_encode($locations);
    }
  }
  catch(PDOException $e)
  {
    echo $e->getMessage();
  }
