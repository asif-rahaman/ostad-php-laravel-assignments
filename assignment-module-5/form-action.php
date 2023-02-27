<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}
.container {
  border-radius: 5px;
  background-color: #cece;
  padding: 20px;
  width:40%;
  margin:0 auto;
}
</style>
</head>
<body>
<h3 style="text-align:center;">Submited Data</h3>

<div class="container">
<?php
class Person {
  // Properties
  private $name;
  private $email;
  public function __construct($name,$email)
  {
    $this->name=$name;
    $this->email=$email;
  }

  // Methods
  public function setName($name) {
    $this->name = $name;
  }

  public function setEmail($email) {
    $this->email = $email;
  }

  public function getName() {
    return $this->name;
  }

  public function getEmail() {
    return $this->email;
  }
}


// $person = new Person();


// $person->setName("John Doe");
// $person->setEmail("john.doe@example.com");


// echo "Name: " . $person->getName();
// echo "Email: " . $person->getEmail();



    $name = $_POST["name"];
    $email = $_POST["email"];
    
  
    // Creating a new instance of the Person class
    $sperson = new Person($name,$email);
  
    // Seting the name and email properties based on the form data
    $sperson->setName($name);
    $sperson->setEmail($email);
    // $n1= $sperson->getName();
    // echo $n1;
    // var_dump($n1);
  
    // Displaying the properties on the webpage 

    echo "<span>Name: " . $sperson->getName() . "</span><br>";
    echo "<span>Email: " . $sperson->getEmail()."</span>";

  //print_r($_POST);
 ?>
</div>

</body>
</html>