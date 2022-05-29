# Welcome to my portfolio made with Symfony 5 ! 👋
![Version](https://img.shields.io/badge/version-beta-blue.svg?cacheSeconds=2592000)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](#)

> Portfolio web developer

### ✨ [Demo](https://portfolio-alexandre-morlat.herokuapp.com/)

## Usage

Clone this repository.
Run ```composer install``` <br>
Run ```yarn install``` <br>
Run ```yarn encore dev``` to build assets. <br>
Connect the database in the env.local (DATABASE_URL var), don't forget to configure the MAILER_DSN var otherwise the forms contact & reset password won't work (mailtrap is great for dev environment). <br>
Also configure MAILER_FROM_DSN with the email address of your choice.<br>
Run ```php bin/console d:d:c``` <br>
Run ```php bin/console doctrine:migrations:migrate``` <br>
You can load fixtures if needed with ```php bin/console doctrine:fixtures:load``` <br>


## Show your support

Give a ⭐️ if this project helped you!


***
_This README was generated with ❤️ by [readme-md-generator](https://github.com/kefranabg/readme-md-generator)_% 