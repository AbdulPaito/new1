<?php
// Step 1: Establish database connection
$host = 'localhost';  // Replace with your host
$user = ' ';   // Replace with your database username
$password = ' '; // Replace with your database password
$database = 'login'; // Replace with your database name

$connection = mysqli_connect($host, $user, $password, $database);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Step 2: Execute query to fetch data
$query = "SELECT * FROM registration";
$result = mysqli_query($connection, $query);

// Check if query execution was successful
if (!$result) {
    die("Query failed: " . mysqli_error($connection));
}

?>
<body>
<section id="registration-section">
    <div class="container">
        <h1>Registration</h1>
        <div class="table-responsive">
            <table class="registration-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>I.D Picture</th>
                        <th>ULI Number</th>
                        <th>Entry Date</th>
                        <th>Last Name, Extension Name (Jr., Sr.)</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Number, Street</th>
                        <th>Barangay</th>
                        <th>District</th>
                        <th>City/Municipality</th>
                        <th>Province</th>
                        <th>Region</th>
                        <th>Email Address/Facebook Account</th>
                        <th>Contact No:</th>
                        <th>Nationality</th>
                        <th>Sex</th>
                        <th>Civil Status</th>
                        <th>Employment Status (before the training)</th>
                        <th>Month of Birth</th>
                        <th>Day of Birth</th>
                        <th>Year of Birth</th>
                        <th>Age</th>
                        <th>City/Municipality</th>
                        <th>Province</th>
                        <th>Region</th>
                        <th>Educational Attainment</th>
                        <th>Parent/Guardian</th>
                        <th>Complete Permanent Mailing Address</th>
                        <th>Learner/Trainee/Student (Clients) Classification</th>
                        <th>Type of Disability (for Persons with Disability Only): To be filled up by the TESDA personnel</th>
                        <th>Causes of Disability (for Persons with Disability Only): To be filled up by the TESDA personnel</th>
                        <th>Taken NCAE/YP4SC Before</th>
                        <th>Where</th>
                        <th>When</th>
                        <th>Name of Course/Qualification</th>
                        <th>If Scholar, What Type of Scholarship Package (TWSP, PESFA, STEP, others)?</th>
                        <th>Privacy Disclaimer</th>
                        <th>Applicant Signature Over Printed Name</th>
                        <th>Date ACCOMPLISHED</th>
                        <th>Registrar/School Administrator</th>
                        <th>Date Received</th>
                        <th>Picture</th>

                    </tr>
                </thead>
                <tbody>
                <?php
            $counter = 1;
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?php echo $counter++; ?></td>
                    <td><img src="<?= $row['profile_image'] ?>" alt="Profile Image"></td>
                    <td><?php echo htmlspecialchars($row['uli_number']); ?></td>
                    <td><?php echo htmlspecialchars($row['entry_date']); ?></td>
                    <td><?php echo htmlspecialchars($row['last_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['first_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['middle_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['address_number_street']); ?></td>               
                    <td><?php echo htmlspecialchars($row['address_barangay']); ?></td>
                    <td><?php echo htmlspecialchars($row['address_district']); ?></td>
                    <td><?php echo htmlspecialchars($row['address_city_municipality']); ?></td>
                    <td><?php echo htmlspecialchars($row['address_province']); ?></td>
                    <td><?php echo htmlspecialchars($row['address_region']); ?></td>
                    <td><?php echo htmlspecialchars($row['email_facebook']); ?></td>
                    <td><?php echo htmlspecialchars($row['contact_no']); ?></td>
                    <td><?php echo htmlspecialchars($row['nationality']); ?></td>
                    <td><?php echo htmlspecialchars($row['sex']); ?></td>
                    <td><?php echo htmlspecialchars($row['civil_status']); ?></td>
                    <td><?php echo htmlspecialchars($row['employment_status']); ?></td>
                    <td><?php echo htmlspecialchars($row['month_of_birth']); ?></td>
                    <td><?php echo htmlspecialchars($row['day_of_birth']); ?></td>
                    <td><?php echo htmlspecialchars($row['year_of_birth']); ?></td>
                    <td><?php echo htmlspecialchars($row['age']); ?></td>
                    <td><?php echo htmlspecialchars($row['birthplace_city_municipality']); ?></td>
                    <td><?php echo htmlspecialchars($row['birthplace_province']); ?></td>
                    <td><?php echo htmlspecialchars($row['birthplace_region']); ?></td>
                    <td><?php echo htmlspecialchars($row['educational_attainment']); ?></td>
                    <td><?php echo htmlspecialchars($row['parent_guardian_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['parent_guardian_address']); ?></td>

                    <td><?php echo htmlspecialchars($row['classification']); ?></td>
                    <td><?php echo htmlspecialchars($row['disability']); ?></td>
                    <td><?php echo htmlspecialchars($row['cause_of_disability']); ?></td>
                    <td><?php echo htmlspecialchars($row['taken_ncae']); ?></td>
                    <td><?php echo htmlspecialchars($row['where_ncae']); ?></td>
                    <td><?php echo htmlspecialchars($row['when_ncae']); ?></td>
                    <td><?php echo htmlspecialchars($row['qualification']); ?></td>
                    <td><?php echo htmlspecialchars($row['scholarship']); ?></td>
                    <td><?php echo htmlspecialchars($row['privacy_disclaimer']); ?></td>
                    <td><?php echo htmlspecialchars($row['applicant_signature']); ?></td>
                    <td><?php echo htmlspecialchars($row['date_accomplished']); ?></td>
                    <td><?php echo htmlspecialchars($row['registrar_signature']); ?></td>
                    <td><?php echo htmlspecialchars($row['date_received']); ?></td>
                    <td><img src="<?= $row['imageUpload'] ?>" alt="ID Picture"></td>
                    
                   

                </tr>
            <?php
            }
            ?>
             
                </tbody>
            </table>
        </div>
    </div>
</section>
</body>
<style>

/* Sets the background color for the entire page */
body {
    font-family: Arial, sans-serif;
    background-color: white; /* Page background color */
    margin: 0;
    padding: 0;


}
#registration-section{
  background-color: rgba(7, 147, 235, 0.808);
  position: relative;
  padding: 15px;
  position: relative;
  width: auto;
  margin-top: -20px;
  margin-left: -20px;
 }

/* Header styling within the registration section */
#registration-section h1 {
    background: #1182fa; /* Teal background for the header */
    color: white; /* White text color */
    padding: 20px;
    text-align: center;
    margin: 0;
    border-radius: 10px 10px 0 0; /* Rounded corners for top left and right */
}

/* Additional styling for form elements if needed */
.registration-form {
    background-color: #ffffff; /* White background for the form itself */
    border: 1px solid #ccc;    /* Light grey border for the form */
    padding: 20px;             /* Padding inside the form */
    border-radius: 5px;        /* Rounded corners for the form */
}


.table-responsive {
    overflow-x: auto;
}

.registration-table {
    width: 100%;
    border-collapse: collapse;
    background-color: #ccc;
}

.registration-table th, .registration-table td {
    padding: 10px;
    text-align: center;
    border-bottom: 1px solid #ddd;
}

.registration-table th {
    background: white;
    font-size: larger;
}

.registration-table td {
    font-size: large;
}

.registration-table tr:nth-child(even) {
    background: #f9f9f9;
}

.registration-table tr:hover {
    background: #f1f1f1;
}

</style>
