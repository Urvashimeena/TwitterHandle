# TwitterHandle
We make a simple page that has a simple input box where we can enter a Twitter Handle and click
on a Submit button.
Clicking on the submit button should display answers to the following things below it:<br>
  a. How many followers does that handle have?<br>
  b. How many tweets has that handle done?<br>
  c. The latest tweet that has been done by that handle.<br>
    <b>Followers</b> 12345<br>
    <b>Tweets</b> 645<br>
    <b>Latest Tweet</b> “Text of the tweet”
    

- [Create a twitter app on the twitter developer site](https://dev.twitter.com/apps/)
- Enable read/write access for your twitter app
- Grab your access tokens from the twitter developer site

- Include the class in your PHP code that is index.php

```php
require_once('TwitterAPIExchange.php');
```

**Via Composer:**

```bash
composer require j7mbo/twitter-api-php
```
