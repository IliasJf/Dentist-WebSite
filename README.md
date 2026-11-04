# Dental Clinic website

A one-page website for a dental clinic: services, the treatment process, patient reviews, and an appointment form that saves each request to a MySQL database.

![The clinic's home page](screenshot.jpg)

Built in 2022, starting from a web design tutorial. **Stack:** PHP, MySQL, HTML, CSS, JavaScript, Bootstrap 4.

## Run it locally

GitHub Pages can't run PHP, so there's no live demo. Run it with XAMPP, WAMP or any PHP 7.4+ server with MySQL:

1. Copy the folder into your server's web root (for XAMPP, `htdocs/`).
2. In phpMyAdmin, create a database named `contact_db` and import `contact_form.sql`.
3. Open `http://localhost/Dentist-WebSite/`.

The defaults match a fresh XAMPP install (`root`, no password). On a real server, set `DB_HOST`, `DB_USER`, `DB_PASS` and `DB_NAME` as environment variables instead.

## How the form is handled

- Name, email, phone number and date are checked before saving.
- The insert uses a prepared statement, so form values can't change the SQL.
- Messages shown back on the page are escaped.

## Files

```
index.php          the page and the form handler
contact_form.sql   the contact_form table
css/style.css      styles
js/script.js       menu and header behaviour
images/            photos and icons
```
