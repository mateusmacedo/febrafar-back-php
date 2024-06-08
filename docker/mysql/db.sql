CREATE USER febrapar_agenda_api WITH
    LOGIN
    PASSWORD 'Secret*123';
CREATE DATABASE "febrapar_agenda_db" WITH OWNER "febrapar_agenda_api" ENCODING 'UTF8';
GRANT ALL PRIVILEGES ON DATABASE febrapar_agenda_db TO febrapar_agenda_api;
