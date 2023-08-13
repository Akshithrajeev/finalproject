CREATE TABLE admin (
    id INT AUTO_INCREMENT PRIMARY KEY,        -- Unique ID for each admin
    username VARCHAR(255) NOT NULL UNIQUE,    -- Unique admin username
    password VARCHAR(255) NOT NULL,           -- Hashed password
    email VARCHAR(255) NOT NULL UNIQUE,       -- Unique email to avoid duplicate registrations
    date_registered TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- Date and time of registration
);
