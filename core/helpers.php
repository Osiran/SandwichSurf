<?php
/**
 * Nutze diese Funktion um einfach eine Ausgabe
 * mit htmlspecialchars() zu erstellen.
 */
function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8', false);
}

/**
 * Nutze diese Funktion um auf einen POST-Wert
 * zuzugreifen.
 */
function post(string $key, $default = '')
{
    return $_POST[$key] ?? $default;
}

/**
 * Base path of the app under the web root (e.g. "/sandwichsurf"), used to build
 * redirect Location headers and links that work whether the app is served from a
 * subdirectory or the domain root.
 */
function basePath(): string
{
    return rtrim(dirname($_SERVER['SCRIPT_NAME'] ?? ''), '/');
}

/** Redirect helper: sends a Location header relative to the app base and stops. */
function redirect(string $path): void
{
    header('location: ' . basePath() . '/' . ltrim($path, '/'));
    exit;
}

/**
 * Stellt eine Verbindung zur Datenbank her und gibt die
 * Datenbankverbindung als PDO zurück.
 *
 * Connection settings come from environment variables (DB_HOST/DB_PORT/DB_NAME/
 * DB_USER/DB_PASS) and fall back to the original local defaults, so the app runs
 * unchanged in the default XAMPP-style setup but can point at another database
 * (e.g. for automated testing) without editing code.
 */
$dbInstance = null;

function db()
{
    global $dbInstance;

    if ($dbInstance) {
        return $dbInstance;
    }

    $host = getenv('DB_HOST') ?: '127.0.0.1';
    $port = getenv('DB_PORT') ?: '3306';
    $name = getenv('DB_NAME') ?: 'sandwichsurf';
    $user = getenv('DB_USER') ?: 'root';
    $pass = getenv('DB_PASS');
    if ($pass === false) {
        $pass = '';
    }

    try {
        $dbInstance = new PDO("mysql:host=$host;port=$port;dbname=$name", $user, $pass, [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4',
        ]);
    } catch (PDOException $e) {
        die('Keine Verbindung zur Datenbank möglich: ' . $e->getMessage());
    }
    return $dbInstance;
}

/**
 * Auth helpers. A staff member is "logged in" once loginControl stores their id
 * in the session. Employee-only pages (order overview, ingredient list, status
 * updates) call these guards so they can no longer be reached by URL alone.
 */
function currentStaffId(): ?int
{
    return isset($_SESSION['staff_id']) ? (int) $_SESSION['staff_id'] : null;
}

function currentStaffRole(): ?string
{
    return $_SESSION['staff_role'] ?? null;
}

function requireLogin(): void
{
    if (currentStaffId() === null) {
        redirect('login');
    }
}

function requireAdmin(): void
{
    requireLogin();
    if (strtolower((string) currentStaffRole()) !== 'admin') {
        // A non-admin staff member is sent to the order overview they may see.
        redirect('overview');
    }
}
