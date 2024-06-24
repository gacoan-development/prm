<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

                                            define('DB_SERVER', 'localhost');
                                define('DB_USERNAME', 'miegacoa_dininaylul');
                                define('DB_PASSWORD', 'K8RzkQV2)AIK');
                                define('DB_NAME', 'miegacoa_employees');
                                
                                /* Attempt to connect to MySQL database */
                                $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function generateRandomPassword() {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $password = '';
    $max = strlen($characters) - 1;
    for ($i = 0; $i < 6; $i++) {
        $password .= $characters[rand(0, $max)];
    }
    return $password;
}

function hashPassword($password) {
    return md5($password);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['currentPassword']) && isset($_POST['newPassword']) && isset($_POST['confirmPassword'])) {
        $currentPassword = hashPassword($_POST['currentPassword']);
        $newPassword = $_POST['newPassword'];
        $confirmPassword = $_POST['confirmPassword'];
        $userLogin = $_SESSION['username'];
    
        $username = $userLogin; 
    
        $sql = "SELECT password FROM ess_user WHERE username = '$username'";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($newPassword == $confirmPassword) {
                if (empty($newPassword)) {
                    $newPassword = generateRandomPassword();
                }
    
                $hashedPassword = hashPassword($newPassword);
    
                $updateSql = "UPDATE ess_user SET password = '$hashedPassword' WHERE username = '$username'";
                if ($conn->query($updateSql) === TRUE) {
                    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
                    echo '<script type="text/javascript">';
                    echo 'setTimeout(function () {';
                    echo 'swal("Permintaan Berhasil", "Password berhasil diubah", "success").then( function(val) { if (val == true) window.location.href = "index.php"; });';
                    echo '}, 100);</script>';
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            } else {
                echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { swal("Error", "Konfirmasi password tidak cocok", "error");';
                echo '}, 100);</script>';
            }
        } else {
            echo "Username not found";
        }
    
    } else {
        
        echo "";
    }
   
}
$conn->close();
?>
