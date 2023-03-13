# Online Office
This is a UWDC2023 task. The task was given to the competitors during the event.
The time given for the task was 6 hours.

## Installation steps
For the project to run, you will need to install Docker.

### Optional:
To remove the hassle of typing ```./vendor/bin/sail``` on every command,
you can set an alias for it by running ```alias sail='./vendor/bin/sail'```.
Now you can run every command with the prefix of ```sail```.

### Sail up the application:
```zsh
./vendor/bin/sail up
```

### Install vendors
```zsh
./vendor/bin/sail composer install
```

### Run database migrations
```zsh
./vendor/bin/sail artisan migrate
```

### Run database seeders
```zsh
./vendor/bin/sail artisan db:seed
```

### Install npm dependencies
```zsh
./vendor/bin/sail npm install
```

#### Build the application with Vite
```zsh
./vendor/bin/sail npm run build
```

Then open http://localhost/ to see the application.