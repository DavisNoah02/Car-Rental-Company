<?php
require_once('Car Rental Company/scripts/database.php');

class UserAuth {
    private $db;

    function __construct() {
        $this->db = new Database();
    }

    public function registerUser($name, $email, $password) {
        $name = $this->db->escapeString($name);
        $email = $this->db->escapeString($email);

        // Check if the email is already registered
        $query = "SELECT id FROM users WHERE email='$email'";
        $result = $this->db->query($query);

        if ($result->num_rows > 0) {
            return "Email already in use";
        }

        // Hashing the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert the user into the database
        $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashedPassword')";

        if ($this->db->query($query)) {
            return "Registration successful";
        } else {
            return "Registration failed";
        }
    }

    public function loginUser($email, $password) {
        $email = $this->db->escapeString($email);

        // Fetch user data from the database
        $query = "SELECT id, name, email, password FROM users WHERE email='$email'";
        $result = $this->db->query($query);

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();

            if (password_verify($password, $row["password"])) {
                session_start();
                $_SESSION["user_id"] = $row["id"];
                $_SESSION["user_name"] = $row["name"];
                $_SESSION["user_email"] = $row["email"];

                return "Login successful";
            } else {
                return "Incorrect email or password";
            }
        } else {
            return "User not found";
        }
    }

    public function logoutUser() {
        session_start();
        session_unset();
        session_destroy();
    }

    public function isLoggedIn() {
        session_start();
        return isset($_SESSION["user_id"]);
    }
}
?>
