# Contact Form Mailer

This contact form mailer is a test applicaiton for the Certificate IV in Information Technology Programmign studnets.

The code is meant to:

- accept all input from a web form
- convert content to plain text
- display text on a notification page

No mailing actually happens.

## Setting Up

- Download this code
- Extract the contents of the file
- Copy the files to the folders as given below:
  - ROOT of your site:
    - ... 
  - assets/css folder:
    - ...
- Open Laragon
- Open Laragon's terminal
- cd %userprofile%
- cd Source\Repos
- cd PROJECT_FOLDER
- npm install -D tailwindcss
-  npx tailwindcss -i ./src/mail.css -o ./assets/css/mail.css --watch
## What each file does

### mail.php

- This file accepts the data from your form as a POST.
- Converts all content to PLAIN TEXT (removing any HTML, JS etc)
- Displays the content of the submission to a demo page

### assets/css/mail.css

- This file styles the output of the mail page
- Uses the TailwindCSS framework for speed and simplicity

