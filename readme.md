# Rekap Plugin

rekap formatter

## Installation

### Requirements
- PHP >=5.5.0
- composer, <https://getcomposer.org/>

## Installation

Add this composer.json file

```json
{
    "repositories": [
        {
            "type": "vcs",
            "url": "git@github.com:harryosmar/plugin-rekap.git"
        }
    ],
    "require": {
        "harryosmar/plugin-rekap": "^1.0"
    }
}
```

Then running
```bash
$ composer install
```

## Documentation
```php
use PluginRekap\Libraries\Formatter;
$result = $this->formatter->format('1234x2.7.6'); // result : array (0 => '1234|2',1 => '234|7',2 => '34|6')
```

## About


### Submitting bugs and feature requests

Harry Osmar Sitohang - <harry@olx.co.id> - <https://github.com/harryosmar><br />
