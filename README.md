# România creativă [![Build Status](https://travis-ci.org/gov-ithub/romania-creativa.svg?branch=master)](https://travis-ci.org/gov-ithub/romania-creativa) [![Quality Gate](https://sonarqube.com/api/badges/gate?key=govithub:romania-creativa)](https://sonarqube.com/dashboard?id=govithub:romania-creativa)

România trebuie să se alinieze tendințelor globale de trecere de la procesele de producție tradiționale la servicii și inovare și pentru a putea face acest lucru, este nevoie de a facilita trecerea la o economie creativă, prin catalizarea efectelor de propagare ale SCC într-un număr cât mai mare de contexte economice și sociale, astfel încât, în orizontul anul 2020, sectoarele culturale și creative să aibă o contribuție de 10% la PIB-ul României.

## Instalare
### Requirements

* [PHP](http://php.net/manual/en/install.php) >= 5.6.4
* [Composer](https://getcomposer.org/download/)
* [Node.js](http://nodejs.org/) >= 6.9.x
* [Yarn](https://yarnpkg.com/en/docs/install)
* [Gulp](https://github.com/gulpjs/gulp/blob/master/docs/getting-started.md) >= 3.8.10
* [Bower](https://github.com/bower/bower/blob/master/README.md#install) >= 1.3.12

### Setup
* create mysql database: `rocreativa`
* create website that points to `site\web` (Apache, NGINX etc.) 
* clone & branch `romania-creativa` repository
* navigate to `\\romania-creativa`
* copy `.env.example` as `.env`
* update `.env` file with valid configuration settings
* open shell and navigate to `\\romania-creativa` 
```
cd site
composer install
cd web\wp\wp-content\themes\
for /D %f in (twenty*) do rm -rf %f

cd ..\..\..\app\themes\romania-creativa\
composer install
yarn
```

### Start app
* open shell and navigate to `\\romania-creativa\site\web\app\themes\romania-creativa\`
* `yarn start`


## Contribuie

Dacă vrei să contribui - ești binevenit(ă) - but we don't have cookies (yet) 

### Proces
- Vezi lista de tehnologii folosite - îți sunt familiare?
- Dacă nu ești încă înscris(ă) în comunitate, te rog fă-o pe [site-ul de voluntari GovITHub](http://voluntari.ithub.gov.ro/)
- Aruncă o privire la [guidelines](https://github.com/gov-ithub/guidelines/blob/master/CODE_REVIEW.md) pentru code review 
- Caută în issues un task interesant pentru tine (sau, dacă ai o propunere, deschide un issue / trimite un pull request). 
- După ce trecem prin code review - celebrate! :star: :star2: :star:

## Cum poti intra in contact cu echipa?
- Email: oana.talpalaru@ithub.gov.ro; alexandru.chiraples@ithub.gov.ro
- [Slack](https://govithub.slack.com/messages/romania-creativa/details/). Pentru invite intrați pe http://govitslack.herokuapp.com/

Mai multe detalii în curând! 

**Made with :heart: by [GovITHub](http://ithub.gov.ro)**
