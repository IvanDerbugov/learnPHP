ALTER TABLE accounts
ADD COLUMN displayBalance TINYINT NOT NULL DEFAULT 0 CHECK (displayBalance IN (0, 1));