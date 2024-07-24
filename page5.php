<?php
session_start(); // Start the session

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Save form data into session variables from Page 5
    $_SESSION['applicant_signature'] = $_POST['applicant_signature'] ?? '';
    $_SESSION['date_accomplished'] = $_POST['date_accomplished'] ?? '';
    $_SESSION['registrar_signature'] = $_POST['registrar_signature'] ?? '';
    $_SESSION['date_received'] = $_POST['date_received'] ?? '';


    if (isset($_FILES['imageUpload']) && $_FILES['imageUpload']['error'] == 0) {
        $uploadedFile = $_FILES['imageUpload'];
        $uploadDir = 'picture/'; // Ensure this directory exists and is writable
        $uploadFile = $uploadDir . basename($uploadedFile['name']);

        // Validate file type
        $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
        $allowedTypes = ['jpg', 'jpeg', 'png'];
        if (!in_array($imageFileType, $allowedTypes)) {
            echo 'Sorry, only JPG, JPEG & PNG files are allowed.';
            exit();
        }

        // Validate file size (limit to 500KB)
        if ($uploadedFile['size'] > 500000) {
            echo 'Sorry, your file is too large.';
            exit();
        }

        // Move uploaded file to target directory
        if (move_uploaded_file($uploadedFile['tmp_name'], $uploadFile)) {
            $_SESSION['imageUpload'] = $uploadFile; // Save file path to session
        } else {
            echo 'File upload failed!';
            exit();
        }
    }

    header('Location: final_submit.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form - Page 5</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f4f4f9;
        }

        .page {
            max-width: 1700px;
            height: 1400px;
            margin: 20px auto;
            padding: 90px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 20px;
            overflow: hidden;
        }

        h2, h1, h3, p {
            text-align: center;
            margin-bottom: 10px;
        }

        form {
            width: 100%;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 2px solid #007bff;
            font-size: 22px;
        }

        th {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            text-align: center;
        }

        td input[type="text"] {
            width: calc(100% - 16px);
            padding: 6px;
            border: 1px solid black;
            border-radius: 4px;
            margin-top: 5px;
        }

        .center {
            text-align: center;
            margin-top: 20px;
        }

        button[type="submit"], button[type="button"] {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover, button[type="button"]:hover {
            background-color: #0056b3;
        }


        .image-upload-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin-bottom: 20px;
        }

        .image-preview {
            width: 300px;
            height: 200px;
            border: 1px solid #007bff;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f0f0f0;
            margin-bottom: 10px;
            overflow: hidden;
        }

        .image-preview img {
            max-width: 100%;
            max-height: 100%;
        }

        .image-upload-label {
            cursor: pointer;
            color: #007bff;
            text-decoration: underline;
        }

       
        @media (max-width: 768px) {
            .page {
                padding: 20px;
            }

            th, td {
                font-size: 14px;
            }

            button[type="submit"], button[type="button"] {
                width: 100%;
                padding: 12px;
            }

            .picture-box {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>
<body>
<div class="page">
    <h1>Technical Education and Skills Development Authority</h1>
    <h1><p>Pangasiwaan sa Edukasyong Teknikal at Pagpapaunlad ng Kasanayan</p></h1>
    <h1>Registration Form - Page 5/5</h1>
    <form action="final_submit.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <th colspan="2">Applicant's Signature</th>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">This is to certify that the information stated above is true and correct.</td>
            </tr>
            <tr>
                <td><label for="applicant_signature">APPLICANT'S SIGNATURE OVER PRINTED NAME:</label></td>
                <td><input type="text" id="applicant_signature" placeholder="APPLICANT'S SIGNATURE OVER PRINTED NAME" name="applicant_signature"></td>
            </tr>
            <tr>
                <td><label for="date_accomplished">DATE ACCOMPLISHED:</label></td>
                <td><input type="text" id="date_accomplished" placeholder="DATE ACCOMPLISHED" name="date_accomplished"></td>
            </tr>
            <tr>
                <td><label for="registrar_signature">REGISTRAR/SCHOOL ADMINISTRATOR:</label></td>
                <td><input type="text" id="registrar_signature" placeholder="REGISTRAR/SCHOOL ADMINISTRATOR" name="registrar_signature"></td>
            </tr>
            <tr>
                <td><label for="date_received">DATE RECEIVED:</label></td>
                <td><input type="text" id="date_received" placeholder="DATE RECEIVED" name="date_received"></td>
            </tr>
        </table>
        
        <table> 
            <tr>
                <td>
                <div class="image-upload-container">
                <div class="image-preview" id="imagePreview">
                    <?php if (isset($_SESSION['imageUpload'])): ?>
                        <img src="<?= $_SESSION['imageUpload'] ?>" alt="Profile Image">
                    <?php else: ?>
                        <span>I.D Picture</span>
                    <?php endif; ?>
                </div>
                <label class="image-upload-label" for="imageUpload">Choose Image</label>
                <input type="file" name="imageUpload" id="imageUpload" accept="image/*" style="display: none;" onchange="previewImage(event)">
            </div>
                    </div>
                </td>
            </tr>
        </table>
        
        <div class="center">
            <button type="button" onclick="window.location.href='page4.php'">Back</button>
            <button type="submit">Submit</button>
        </div>
        
    </form>
</div>
<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('imagePreview');
            output.innerHTML = `<img src="${reader.result}" alt="Profile Image">`;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
</body>
</html>
