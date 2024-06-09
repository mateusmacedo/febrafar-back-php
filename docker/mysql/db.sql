CREATE DATABASE febrapar_agenda_db;
CREATE USER 'febrapar_agenda_api'@'%' IDENTIFIED BY 'Secret*123';
GRANT ALL PRIVILEGES ON febrapar_agenda_db.* TO 'febrapar_agenda_api'@'%';
