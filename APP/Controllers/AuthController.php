<?php
namespace App\Controllers;

use App\Models\User;
use App\Helpers\Captcha;

require_once __DIR__. '/../Helpers/Captcha.php';
require_once __DIR__. '/../Models/User.php';
$captcha = new Captcha(); // This should now work
class AuthController 
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Verifica captcha
            $captcha = new Captcha();
            if ($captcha->verifyCaptcha($_POST['g-recaptcha-response'])) {
                // Valida datos del formulario
                $username = $_POST['username'];
                $password = $_POST['password'];

                // Encuentra usuario en la base de datos
                $user = new User(); // Corrected here
                $foundUser = $user->findByUsername($username);

                if ($foundUser) {
                    // Verifica contraseña con hash
                    $hashedPassword = $foundUser->password;
                    if (password_verify($password, $hashedPassword)) {
                        // Autentica usuario
                        $_SESSION['autenticado'] = true;
                        $_SESSION['user_id'] = $foundUser->id;
                        $_SESSION['username'] = $foundUser->username;

                        // Redirige a index
                        header("Location: index.php");
                        exit();
                    } else {
                        // Error de contraseña inválida
                        $error = "Contraseña inválida";
                    }
                } else {
                    // Error de usuario no encontrado
                    $error = "Usuario no encontrado";
                }
            } else {
                // Error de captcha
                $error = "Verifique que ha completado el captcha correctamente";
            }
        }

        // Renderiza la vista del login
        require_once 'Views/login.php'; 
    }
}