<?php
require_once './vendor/autoload.php';
$config = HTMLPurifier_Config::createDefault();
$config->set('Cache.DefinitionImpl', null);
$purifier = new HTMLPurifier();
$errors = [];
$expected_fields = ["given_name", "family_name", "dob", "subject", "country", "message", "subject"];
if (isset($_POST)) {
    foreach ($expected_fields as $key) {
        if (!isset($_POST[$key]) || $_POST[$key] == "") {
            $errors[str_replace("_", " ", mb_strtoupper($key))] = "{$key} field is missing";
        }
    }
} else {
    $errors["WRONG FORM METHOD"] = "Form used a GET request not a POST.";
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="/assets/css/mail.css" rel="stylesheet">

</head>
<body class="flex flex-col min-h-screen">
<header class="bg-stone-800">
    <div class="flex items-center h-16 px-4 mx-auto max-w-screen-xl gap-8 sm:px-6 lg:px-8">
        <a class="block text-lime-600" href="/"> YOUR NAME </a>

        <div class="flex items-center justify-end flex-1 md:justify-between">
            <nav class="hidden md:block" aria-labelledby="header-navigation">
                <h2 class="sr-only" id="header-navigation">Header navigation</h2>

                <ul class="flex items-center text-sm gap-6">
                    <li>
                        <a class="text-stone-300 transition hover:text-stone-400" href="/">
                            Home
                        </a>
                    </li>

                    <li>
                        <a class="text-gray-500 transition hover:text-gray-500/75"
                           onclick="javascript: history.back(); return false;">
                            Back
                        </a>
                    </li>
                </ul>
            </nav>

        </div>
    </div>
</header>

<main class="w-4/5 bg-stone-100 mx-auto p-8 mt-8 rounded-lg text-stone-800 border border-stone-300/75 shadow grow">
    <h1 class="text-3xl font-bold pb-8 text-stone-500">
        Contact Form Submission Results
    </h1>

    <?php
    foreach ($errors as $errorType => $errorMessage) {
        ?>
        <div class="my-2 rounded-full flex justify-start shadow">
            <div class="w-44 rounded-full rounded-r-none pl-3 pr-2 py-1 bg-red-800 text-white/90 ">
                <?= $errorType ?>
            </div>
            <div class="px-2 py-1 flex-1 text-red-800 bg-white ">
                Error! <?= $errorMessage ?>
            </div>
            <div class="bg-red-800 text-white pl-2 pr-3 py-1 rounded-full rounded-l-none ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/>
                </svg>
            </div>
        </div>
        <?php
    } /* end foreach */
    ?>

    <?php
    if (isset($_POST)) {
        foreach ($_POST as $key => $value) {
            if ($value > "") {
                if (is_array($value)) {
                    $value = http_build_query($value, '', ', ');
                }
                $value = $purifier->purify($value);
                ?>
                <div class="bg-stone-50 text-stone-700 my-2 rounded-full flex flex-start shadow">
                    <div class="w-44 pl-3 pr-2 py-1 rounded-full rounded-r-none bg-stone-700 text-stone-100">
                        <?= $key ?>
                    </div>
                    <div class="px-2 py-1 rounded-full rounded-l-none flex-1">
                        <?= $value ?>
                    </div>
                </div>
                <?php
            } /* end if */
        } /* end foreach */
    }
    ?>
    <p class="pt-8 mb-6">
        <a class="transition hover:text-white text-blue-600 hover:bg-green-500 duration-500 bg-white shadow rounded-full px-8 py-2 border hover:border-blue-500 border-blue-800 font-medium"
           onclick="javascript: history.back(); return false;">
            Back
        </a>
    </p>
</main>
<footer class="w-100 mt-8 py-8 bg-stone-300 grid grid-cols-2 flex-none">
    <div class="pl-48 pr-8">
        <p>This form display page was developed by Adrian Gould, 2022.</p>
    </div>
    <div class="pl-8 pr-48">
        <ul>
            <li><a href="https://heroicons.com/">HeroIcons</a></li>
            <li><a href="https://php.net">PHP</a></li>
            <li><a href="https://tailwind.css">TailwindCSS</a></li>
            <li><a href="http://htmlpurifier.org/">HTML Purifier</a></li>
            <li>
                <a href="https://www.ionos.com/digitalguide/domains/domain-extensions/cctlds-a-list-of-every-country-domain/">Country
                    Codes / Ionos.com</a></li>
        </ul>

    </div>
</footer>
</body>
</html>
