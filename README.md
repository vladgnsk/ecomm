# ecomm
symfony 7.0.6 --webapp

composer require symfonycasts/tailwind-bundle

./bin/console tailwind:init

./bin/console tailwind:build -w

create .symfony.local.yaml :
"
    workers:
        tailwind:
            cmd: ['symfony', 'console', 'tailwind:build', '--watch']
"