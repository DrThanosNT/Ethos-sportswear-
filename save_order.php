<!DOCTYPE html>
<html lang="el">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style>
       table {
            position: fixed;
            top: 0;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: grey;
        }
        form {
    display: grid;
    grid-template-columns: auto 1fr; 
    gap: 10px;
    max-width: 500px; 
    margin: 0 auto; }

form label {
    text-align: left; 
    font-weight: bold; 
    margin-top: 5px; 
}

form input, 
 form textarea, 
  form select {
    width: 100%; 
    padding: 8px;
    box-sizing: border-box; 
}
.form-buttons {
    grid-column: 1 / -1; 
    display: flex;
    justify-content: flex-start; 
    gap: 10px; 
    margin-top: 10px;
}

input[type="checkbox"] {
 
    width: 18px;
    height: 18px;
    border: 2px solid #007BFF; 
    border-radius: 4px;
    cursor: pointer;
    position: relative;
    vertical-align: middle;
    background-color: #fff; }

    </style>
           <title>Φόρμα Παραγγελίας</title>

</head>
<body>

  

    <h1>Φόρμα Παραγγελίας</h1>
    
    
    <form id="orderForm" action="save_order.php" method="POST"> 
      
        <label for="gender">Φύλο:</label>
        <select id="gender" name="gender" required>

            <option value="">Επιλέξτε</option>
            <option value="Άνδρας">Άνδρας</option>
            <option value="Γυναίκα">Γυναίκα</option>
            <option value="Άλλο">Άλλο</option>

        </select>

        <label for="firstName">Όνομα:</label>
        <input type="text" id="firstName" name="firstName" required pattern="^[\u0370-\u03FF]+$" placeholder="Π.χ. Αθηνά">

        <label for="lastName">Επώνυμο:</label>
        <input type="text" id="lastName" name="lastName" required maxlength="50">

        <label for="birthDate">Ημερομηνία Γέννησης:</label>

        <input type="date" id="birthDate" name="birthDate" required>

 
        <label for="category">Κατηγορία Αθλητικού Είδους:</label>
        <select id="category" name="category" required>
            <option value="">Επιλέξτε</option>
            <option value="Ρούχα">Ρούχα</option>
            <option value="Παπούτσια">Παπούτσια</option>
            <option value="Εξοπλισμός">Εξοπλισμός</option>
            <option value="Άλλα">Άλλα</option>
        </select>



        <label for="size">Μέγεθος:</label>
        <select id="size" name="size">
            <option value="">Επιλέξτε</option>
            <option value="S">S</option>
            <option value="M">M</option>
            <option value="L">L</option>
            <option value="XL">XL</option>
            <option value="40">40</option>
            <option value="41">41</option>
            <option value="42">42</option>
            <option value="43">43</option>
            <option value="44">44</option>
            <option value="45">45</option>
            <option value="46">46</option>
        </select>

        <label for="color">Χρώμα Προτίμησης:</label>
        <select id="color" name="color">
            <option value="red">red</option>
            <option value="green">green</option>
            <option value="yellow">yellow</option>
</select>

        <label for="quantity">Ποσότητα:</label>
        <input type="number" id="quantity" name="quantity" min="1" max="99" required>

        
        <label for="address">Διεύθυνση Αποστολής:</label>
        <input type="text" id="address" name="address" required>

        <label for="city">Πόλη:</label>
        <input type="text" id="city" name="city" required>

        <label for="zip">Ταχυδρομικός Κώδικας:</label>
        <input type="text" id="zip" name="zip" pattern="^[0-9]{5}$" required>

        <label for="phone">Τηλέφωνο Επικοινωνίας:</label>
        <input type="text" id="phone" name="phone" >

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

       
        <label for="password">Συνθηματικό Πρόσβασης:</label>
        <input type="password" id="password" name="password" required pattern="(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*]).{8,}">

        <label for="confirmPassword">Επιβεβαίωση Συνθηματικού:</label>

        <input type="password" id="confirmPassword" name="confirmPassword" required>

        <label>
            <input type="checkbox" id="terms" name="terms"  required>
            Δηλώνω ότι έχω διαβάσει και αποδέχομαι τους Όρους & Προϋποθέσεις.

        </label>

        <div class="actions">
            <button type="submit" onclick="saveOrder()">Αποθήκευση</button>
            <button type="reset">Καθαρισμός</button>
</div>
    </form>


    <form id="searchForm" action="save_order.php"  method="GET">
    <label for="email">Email Search:</label>
    <input type="email" id="email2" name="email2" >
    <button type="submit" onclick="search()" >Αναζήτηση</button>
    



    </form>



    <script>
         document.getElementById('orderForm').addEventListener('input', (e) => {
            if (!e.target.checkValidity()) {
                e.target.classList.add('error');
            } else {
                e.target.classList.remove('error');
            }
        });

        
         
       
        
        function saveOrder() {
            const form = document.getElementById('orderForm');
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            

            
            if (!form.checkValidity() || password !== confirmPassword) {
                document.getElementById("gender").style="background-color: red;"
               document.getElementById("firstName").style="background-color: red;"
               document.getElementById("lastName").style="background-color:red;"
               document.getElementById("birthDate").style="background-color: red;"
               document.getElementById("category").style="background-color: red;"
               document.getElementById("size").style="background-color: red;"
               document.getElementById("color").style="background-color: red;"
               document.getElementById("quantity").style="background-color: red;"
               document.getElementById("address").style="background-color: red;"
               document.getElementById("city").style="background-color:red;"
               document.getElementById("zip").style="background-color: red;"
               document.getElementById("phone").style="background-color: red;"
               document.getElementById("email").style="background-color: red;"
               document.getElementById("password").style="background-color: red;"
               document.getElementById("confirmPassword").style="background-color: red;"
               document.getElementById("terms").style="background-color: white;"
                alert('Παρακαλώ διορθώστε τα λάθη πριν την αποθήκευση.');
                return;
            } else {
               document.getElementById("gender").style="background-color: white;"
               document.getElementById("firstName").style="background-color: white;"
               document.getElementById("lastName").style="background-color: white;"
               document.getElementById("birthDate").style="background-color: white;"
               document.getElementById("category").style="background-color: white;"
               document.getElementById("size").style="background-color: white;"
               document.getElementById("color").style="background-color: white;"
               document.getElementById("quantity").style="background-color: white;"
               document.getElementById("address").style="background-color: white;"
               document.getElementById("city").style="background-color: white;"
               document.getElementById("zip").style="background-color: white;"
               document.getElementById("phone").style="background-color: white;"
               document.getElementById("email").style="background-color: white;"
               document.getElementById("password").style="background-color: white;"
               document.getElementById("confirmPassword").style="background-color: white;"
               document.getElementById("terms").style="background-color: white;"

            } }

           




    </script>



<?php
$db_server = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "sports_store";
$conn = mysqli_connect($db_server, $db_user, $db_password, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $first_name = mysqli_real_escape_string($conn, $_POST['firstName']);
    $last_name = mysqli_real_escape_string($conn, $_POST['lastName']);
    $birth_date = mysqli_real_escape_string($conn, $_POST['birthDate']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $color = mysqli_real_escape_string($conn, $_POST['color']);
    $quantity = (int)$_POST['quantity'];
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $terms = isset($conn, $_POST['terms']) ? 1 : 0;
    $sql = "INSERT INTO orders (gender, first_name, last_name, birth_date, category,  color, quantity, email, terms) 
            VALUES ('$gender', '$first_name', '$last_name',  '$birth_date','$category', '$color', $quantity,'$email', $terms)";
    if (mysqli_query($conn, $sql)) {
        echo "<p style='color:green;'> Record added successfully!</p>";
    } else {
        echo "<p style='color:red;'>Error: " . mysqli_error($conn) . "</p>";
    }
} else   {


    $servername = "localhost";
$username = "root";
$password = "";
$dbname = "sports_store";

$conn = mysqli_connect($db_server, $db_user, $db_password, $db_name);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$mail = mysqli_real_escape_string($conn, $_GET['email2']);




$sql = "SELECT gender, first_name, last_name , birth_date, category, color , quantity , terms FROM orders WHERE email='$mail'";
$result = mysqli_query($conn, $sql);
if ($result && mysqli_num_rows($result) > 0) {
    
    echo "<table >";
    echo "<tr style='background-color: #f2f2f2;'>
            <th>Φύλο</th>
            <th>Όνομα</th>
            <th>Επώνυμο</th>
            <th>Ημερομηνία Γέννησης</th>
            <th>Κατηγορία</th>
            <th>Χρώμα</th>
            <th>Ποσότητα</th>
            <th>Οροι χρησης</th>
          </tr>";
          
    while ($row = mysqli_fetch_assoc($result)) {
        $backgroundColor = htmlspecialchars($row['color']);
        if (htmlspecialchars($row['terms']) == 1) {
            $term = "Agreed";
        }
        else {
            $term = "Disagreed";
        }
        echo "<tr style='background-color: {$backgroundColor};'>
                <td>" . htmlspecialchars($row['gender']) . "</td>
                <td>" . htmlspecialchars($row['first_name']) . "</td>
                <td>" . htmlspecialchars($row['last_name']) . "</td>
                <td>" . htmlspecialchars($row['birth_date']) . "</td>
                <td>" . htmlspecialchars($row['category']) . "</td>
                <td>" . htmlspecialchars($row['color']) . "</td>
                <td>" . htmlspecialchars($row['quantity']) . "</td>
                <td>" . $term . "</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "<p style='color:red;'>No records found for the provided email.</p>";
}









}
mysqli_close($conn);
?>
</body>
</html>
