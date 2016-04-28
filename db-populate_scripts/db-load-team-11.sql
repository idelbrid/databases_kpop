START TRANSACTION;
SET CONSTRAINTS ALL DEFERRED;
--ALTER TABLE song DISABLE TRIGGER ALL ;
\include db-load-idelbrid.sql
\include db-load-ahe6.sql
\include db-load-jdeng5.sql
\include db-load-ylu21.sql

--ALTER TABLE song ENABLE TRIGGER ALL;
END;