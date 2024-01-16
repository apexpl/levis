

# Send E-Mail

The `Levis/Svc/Emailer` class is an implementation of [Apex Mercury](https://github.com/apexpl/mercury/) and allows you to easily send e-mail.

The below code shows a quick example of how to send an e-mail:

~~~php
<?php

namespace App\MyPackage;

use Levis\Svc\Emailer;
use Apex\Mercury\Email\{Emailer, EmailMessage};

class SomeClass
{

    #[Inject(Emailer::class)]
    private Emailer $emailer;

    /**
     * Process
     */
    public function process(string $recipient_email, string $recipient_name):void
    {

        // Define e-mail message
        $message = new EmailMessage(
            to_email: $recipient_email,
            to_name: $recipient_name,
            from_email: 'me@company.com', 
            from_name: 'Company XYZ', 
            content_type: 'text/plain', 
            subject: 'Checking In with Test', 
            text_message: "This is a test e-mail message",
            html_message: "<p>This is a test e-mail message</p>"
        );

        // Send the e-mail message
        $this->emailer->send($message);
    }

}
~~~


There's three steps to sending an e-mail:

1. Inject the `Levis\Svc\Emailer` class as shown above.
2. Instantiate the [EmailMessage object](https://github.com/apexpl/mercury/blob/master/docs/email_message.md) to define the message you would like to send.
3. Pass the object via the `send()` method.
4. That's it, e-mail sent.



