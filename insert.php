<?php
include 'db.php';

$familyName = $_POST['familyName'];
$names = $_POST['name'];
$dobs = $_POST['dob'];
$ages = $_POST['age'];
$genders = $_POST['gender'];
$pfMethods = $_POST['pfMethod'];
$sterilized = $_POST['sterilized'];
$postpartumRef = $_POST['postpartumRef'];
$visitDates = $_POST['visitDate'];
$phones = $_POST['phone'];
$addresses = $_POST['address'];
$educationLevels = $_POST['educationLevel'];
$schoolNames = $_POST['schoolName'];
$disabilities = $_POST['disability'];
$medicalCare = $_POST['medicalCare'];
$occupations = $_POST['occupation'];
$incomes = $_POST['income'];
$housing = $_POST['housing'];

for ($i = 0; $i < count($names); $i++) {
  $gender = $genders[$i] ?: detectGender($names[$i]);

  $stmt = $conn->prepare("INSERT INTO family_members (
    family_name, name, dob, age, gender, pf_method, sterilized, postpartum_ref,
    visit_date, phone, address, education_level, school_name, disability,
    medical_care, occupation, income, housing
  ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

  $stmt->bind_param("sssisssssssssssssis",
    $familyName, $names[$i], $dobs[$i], $ages[$i], $gender, $pfMethods[$i],
    $sterilized[$i], $postpartumRef[$i], $visitDates[$i], $phones[$i],
    $addresses[$i], $educationLevels[$i], $schoolNames[$i], $disabilities[$i],
    $medicalCare[$i], $occupations[$i], $incomes[$i], $housing[$i]
  );

  $stmt->execute();
}

echo "Datos guardados correctamente.";

function detectGender($name) {
  $name = strtolower($name);
  if (substr($name, -1) == 'a') return 'M';
  if (substr($name, -1) == 'o') return 'H';
  return 'H';
}
?>
