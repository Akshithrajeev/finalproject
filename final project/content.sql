CREATE TABLE content (
    id INT AUTO_INCREMENT PRIMARY KEY,       -- Unique ID for each content piece
    title VARCHAR(255) NOT NULL,             -- Content title
    body TEXT NOT NULL,                      -- Actual content text
    image_path VARCHAR(255),                 -- Path to any associated image; can be NULL if no image
    author_id INT,                           -- ID of the admin who posted this content
    date_posted TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Date and time of posting
    FOREIGN KEY (author_id) REFERENCES admin(id)     -- Make sure the author_id references an actual admin
);
