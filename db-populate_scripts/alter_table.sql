START TRANSACTION;

ALTER TABLE appears_on ADD COLUMN episode_date date;

ALTER TABLE appears_on ADD PRIMARY KEY (episode_date);

END;