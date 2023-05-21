#!/bin/bash

# Define the path to the .www root folder
root_folder=".www"

# Check if the root folder exists
if [ ! -d "$root_folder" ]; then
    echo "Root folder $root_folder does not exist."
    exit 1
fi

# Navigate to the root folder
cd "$root_folder" || exit

# Create the SQLite database file
db_file="database.sqlite"
if [ -f "$db_file" ]; then
    echo "SQLite database file $db_file already exists."
else
    touch "$db_file"
    echo "SQLite database file $db_file created."
fi

# Create a script to configure the SQLite database
config_script="config_sqlite.php"
cat > "$config_script" << EOL
<?php
error_reporting(0);

// Specify the SQLite database file path
\$dbFile = __DIR__ . '/$db_file';

// Establishing connection to SQLite database
\$conn = new PDO("sqlite:\$dbFile");
if (\$conn === false) {
    die("Connection failed.");
}

// Creating a table if it doesn't exist
\$tableName = "custom_data";
\$sql = "CREATE TABLE IF NOT EXISTS \$tableName (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    column1 TEXT NOT NULL,
    column2 TEXT NOT NULL,
    column3 TEXT NOT NULL
)";
\$conn->exec(\$sql);

// Rest of your code...
?>
EOL

echo "Configuration script $config_script created in $root_folder."

# Set the appropriate permissions
chmod 755 "$config_script"

echo "Script execution completed."