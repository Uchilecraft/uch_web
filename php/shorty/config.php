<?php
// Hostname for your URL shortener
$hostname = 'https://uchilecraft.cl/sh';

// PDO connection to the database
$connection = new PDO('mysql:dbname=shorty;host=127.0.0.1', 'shortyuser', '1qaz');

// Esta base de datos es solo accesible por localhost

// Choose your character set (default)
// $chars = str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789');

// The following are shuffled strings of the default character set.
// You can uncomment one of the lines below to use a pre-generated set,
// or you can generate your own using the PHP str_shuffle function.
// Using shuffled characters will ensure your generated URLs are unique
// to your installation and are harder to guess.

$chars = '5sqwdhm1z3iY2kXftMlZeTD6SK87nUPaxur4QjELGbCINoJgRVF9pHWycO0AvB';

// $chars = 'XPzSI6v5DqLuBtVWQARy2mfwkC14F8HUTOG0aJiYpNrl9Zxgbd3Khsno7jMeEc';
// $chars = 'PAC3mfIazxgF1lVK4wJ2WEHY0dcb87TrsZeBpL9vNUMGktROijnSoq5DX6yQhu';
// $chars = 'zFr7ALOJnGRxtKSs0oQT5NeZjdI1iX8DM2lHaCVyg4mUPp63BkEubc9qWfhwYv';
// $chars = 'u7oIws3pVWZMQjA4XhNtyvglkEer1C2J5YdT6zLiFm0ObPc8S9KaDHqRBnfUGx';
// $chars = 'gZ6hdO59XTJmUP31YMG7FvQyqjlKkf8zwitx0AcupDVs2RWCIBaNreob4nLHES';

// If you want your generated URLs to even harder to guess, you can set
// the salt value below to any non empty value. This is especially useful for
// encoding consecutive numbers.
$salt = md5($chars);

// The padding length to use when the salt value is configured above.
// The default value is 3.
$padding = 8;
?>
