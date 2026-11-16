CREATE TABLE delegate (
    owner_id INT UNSIGNED NOT NULL,
    delegate_id INT UNSIGNED NOT NULL,
    PRIMARY KEY (owner_id, delegate_id),
    CHECK (owner_id <> delegate_id),
    FOREIGN KEY (owner_id) REFERENCES accounts(id) ON DELETE CASCADE,
    FOREIGN KEY (delegate_id) REFERENCES accounts(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=UTF8mb4;