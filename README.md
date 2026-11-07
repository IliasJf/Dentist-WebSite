# Dental Clinic website

> **Learning project, 2022.** One of my first PHP sites, started from a web design tutorial. I keep it as a record of my PHP and MySQL work; my current work is on [my portfolio](https://iliasjf.github.io/).

A one-page website for a sample dental clinic: services, treatment for every age, what patients can expect, and an appointment form that saves each request to a MySQL database.

![The clinic's home page](screenshot.jpg)

**Stack:** PHP, MySQL, HTML, CSS, JavaScript, Bootstrap 4.

## Run it locally

GitHub Pages can't run PHP, so there's no live demo. Run it with XAMPP, WAMP or any PHP 7.4+ server with MySQL:

1. Copy the folder into your server's web root (for XAMPP, `htdocs/`).
2. In phpMyAdmin, create a database named `contact_db` and import `contact_form.sql`.
3. Open `http://localhost/Dentist-WebSite/`.

The defaults match a fresh XAMPP install (`root`, no password). On a real server, set `DB_HOST`, `DB_USER`, `DB_PASS` and `DB_NAME` as environment variables instead.

## How the form is handled

- Name, email, phone number (with or without a country code) and date are checked before saving.
- The insert uses a prepared statement, so form values can't change the SQL.
- Messages shown back on the page are escaped.
- Every field has a visible label, and the mobile menu button tells screen readers whether it is open.

## Files

```
index.php          the page and the form handler
contact_form.sql   the contact_form table
css/style.css      styles
js/script.js       mobile menu and header behaviour
images/            photos and icons
```

The clinic, its address, phone number and email are fictional.
