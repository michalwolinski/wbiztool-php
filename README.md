# WbizTool Client PHP Library

A PHP client library for accessing WbizTool API

---
## Installation by Composer
Run
```php   
composer require michalwolinski/wbiztool-php
``` 
in console to install this library.

---

## Usage

First, you need to initialize the Credentials and Client objects.

### Load library and set up credentials

```
$credentials = new Credentials(
    [clientId], [apiKey], [whatsappClientId]
);
$client = new Client(new \GuzzleHttp\Client(), $credentials);
```

---

### Message Types

You can choose one of few message types described below.

#### Text

Text message as argument

```
$type = new Text('message content');
```

#### Image URL

Text message with image

 - Message
 - Image Url

```
$type = ImageUrl('Testing text message', 'https://example.com/image.jpg');
```

#### File URL

Text message with file

 - Message
 - File Url
 - File Name

```
$type = FileUrl('Testing text message', 'https://example.com/Documents.zip', 'Documents.zip');
```

---

### Methods

#### Send Message

This method sends the message directly.

Arguments:
 - SendMessage object
 - Receiver object (Phone number as argument)
 - MessageType object

```
$response = $client->push(
        new SendMessage(),
        new Receiver('123456789'),
        $type
);
```

#### Schedule Message

This method schedule the message.

Arguments:
 - ScheduleMessage object (Carbon object with scheduled date and time, Timezone)
 - Receiver object (Phone number as argument)
 - MessageType object

```
$response = $client->push(
        new ScheduleMessage(Carbon::tomorrow(), 'UTC'),
        new Receiver('123456789'),
        $type
);
```

#### Cancel Message

This method cancel pending message.

Arguments:
 - CancelMessage object (messageId)

```
$response = $client->push(
        new CancelMessage(12345)
);
```

### Response object

Each methods returns Response object, that contains:
 - Status (bool)
 - Message (string)
 - MessageId (int)
 
You can use getters or toArray() method:

```
["status"]=> bool(true)
["message"]=> string(9) "Cancelled"
["messageId"]=> int(123)
```

## Authors

* **Michal Wolinski** - [Haxmedia](https://haxmedia.pl)

## License

This project is licensed under the MIT License.