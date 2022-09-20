# Contact Form Mailer

This contact form mailer is a test applicaiton for the Certificate IV in Information Technology Programmign studnets.

The code is meant to:

- accept all input from a web form
- convert content to plain text
- display text on a notification page

No mailing actually happens.

## Setting Up
In this version of the repository, we are going to download and extract 
the repo, then move files to required locations.

Download a copy of this repository, then extract the contents to a 
suitable folder separate from your project.

Copy the files to the folders as given below:
  - ROOT of your site:
    - `send-mail.php`
    - `package.json`
    - `package-lock.json`
    - `composer.json`
    - `composer.lock`
    - `tailwind.config.js`
    - `.gitignore`
    - `src folder`
  - `assets/css` folder:
    - `mail.css`

Next we need to finish the installation:
- Open Laragon
- Open Laragon's terminal (Click the terminal button)

Next run these commands, replacing PROJECT_FOLDER with your project's name.

```shell
cd %userprofile%
cd Source\Repos
cd PROJECT_FOLDER
npm install
composer self-update
composer install
npx tailwindcss -i ./src/mail.css -o ./assets/css/mail.css --watch
```

## What each file does

### send-mail.php

- This file accepts the data from your form as a POST.
- Converts all content to PLAIN TEXT (removing any 'suspicious' 
  HTML, JS, etc).
- Displays the content of the submission to a demo page.

### assets/css/mail.css

- This file styles the output of the mail page
- Uses the TailwindCSS framework for speed and simplicity


