# România creativă [![Build Status](https://travis-ci.org/gov-ithub/romania-creativa.svg?branch=master)](https://travis-ci.org/gov-ithub/romania-creativa) [![Quality Gate](https://sonarqube.com/api/badges/gate?key=govithub:romania-creativa)](https://sonarqube.com/dashboard?id=govithub:romania-creativa)

România trebuie să se alinieze tendințelor globale de trecere de la procesele de producție tradiționale la servicii și inovare și pentru a putea face acest lucru, este nevoie de a facilita trecerea la o economie creativă, prin catalizarea efectelor de propagare ale SCC într-un număr cât mai mare de contexte economice și sociale, astfel încât, în orizontul anul 2020, sectoarele culturale și creative să aibă o contribuție de 10% la PIB-ul României.

## Instalare
### Requirements

* [Ansible](http://docs.ansible.com/ansible/intro_installation.html#latest-releases-via-pip) >= 2.0.2 (except 2.1.0) (Windows users may skip this)
* [Virtualbox](https://www.virtualbox.org/wiki/Downloads) >= 4.3.10
* [Vagrant](https://www.vagrantup.com/downloads.html) >= 1.8.5
* [vagrant-bindfs](https://github.com/gael-ian/vagrant-bindfs#installation) >= 0.3.1 (Windows users may skip this)
* [vagrant-hostmanager](https://github.com/smdahlen/vagrant-hostmanager#installation)
* [PHP](http://php.net/manual/en/install.php) >= 5.6.4
* [Composer](https://getcomposer.org/download/)
* [Node.js](http://nodejs.org/) >= 6.9.x
* [Yarn](https://yarnpkg.com/en/docs/install)
* [Gulp](https://github.com/gulpjs/gulp/blob/master/docs/getting-started.md) >= 3.8.10
* [Bower](https://github.com/bower/bower/blob/master/README.md#install) >= 1.3.12

### Start app
* clone repo (console/repo or using Source Tree)
* go to `trellis` - where you cloned the repo
* !!! For Windows users - set Windows\System32\drivers\etc\host file, Modify permission for your user
* turn off the antivirus (in my case Avira) or set your antivurus to not block editing host file
* run `vagrant up`
* grab a coffee, it will take a while :)

* after your dev session finished, better run `vagrant halt`

test

### Known issues
[VT-x/AMD-V hardware acceleration disabled](https://forums.virtualbox.org/viewtopic.php?f=2&t=70291)

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
