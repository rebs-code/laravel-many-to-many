# Laravel Portfolio

## Description

This portfolio project is a showcase of personal projects and skills. It features an admin area, created using Laravel's built-in authentication system, where the portfolio owner can manage a list of repositories. These repositories represent the projects that are displayed on the portfolio.

## Tech Stack

- Laravel: The project is built using Laravel, a popular PHP framework known for its elegant syntax and rich feature set.
- Laravel Auth: The admin area is secured using Laravel's built-in authentication system.
- SQL: The list of repositories is stored in a SQL database, allowing for efficient storage, retrieval, and manipulation of data.
- Bootstrap: The frontend of the portfolio is styled using Bootstrap, a widely used CSS framework that allows for responsive and mobile-first design.


[x] creare la migration per la tabella technologies
[x] creare il model Technology
[x] creare la migration per la tabella pivot project_technology
[] aggiungere ai model Technology e Project i metodi per definire la relazione many to many
[] visualizzare nella pagina di dettaglio di un progetto le tecnologie utilizzate, se presenti
[] permettere all’utente di associare le tecnologie nella pagina di creazione e modifica di un progetto
[] gestire il salvataggio dell’associazione progetto-tecnologie con opportune regole di validazione