#!/bin/bash
root_folder=".www"
if [ ! -d "$root_folder" ]; then
    echo "Root folder $root_folder does not exist."
    exit 1
fi

# Navigate to the root folder
cd "$root_folder" || exit;

# Create the SQLite database file
db_file="database.sqlite";
if [ -f "$db_file" ]; then
    echo "SQLite database file $db_file already exists."
else
    touch "$db_file"
    echo "SQLite database file $db_file created."
fi

# Create a script to configure the SQLite database
config_script="config_sqlite.php";
cat > "$config_script" << EOL
<?php
$dbFile = __DIR__ . '/$db_file';
$conn = new PDO("sqlite:$dbFile");
if ($conn === false) {
    die("Connection failed.");
}
$tableName = "custom_data";
$sql = "CREATE TABLE IF NOT EXISTS \$tableName (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    column1 TEXT NOT NULL,
    column2 TEXT NOT NULL,
    column3 TEXT NOT NULL
)";
$conn->exec($sql);

// Rest of your code...
?>

echo "Configuration script $config_script created in $root_folder.";
chmod 755 "$config_script";
