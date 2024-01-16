
# Creating Views

All views have both, a .html and .php file located within the /views/html and /views/php directories respectively.  With auto-routing, you should name the views corresponding to the path within the web browser.  For example, the URL https://domain.com/services/hosting would display the view located at /views/html/services/hosting.html.


### Create New View

You may create a new view with the <a href="../cli/view.md">create view</a> command, such as:

> `./levis create view services/hosting`

This will create two new files at:

* /views/html/services/hosting.html
* /views/php/services/hosting.php

Add any desired contents to the hosting.html file, then open your browser to http://localhost/services/hosting to see the page.  With auto-routing enabled by default, the path viewed within your browser will be mapped to the appropriate file located relative to the /views/html/ directory.


#### Page Titles

Within each view, you should always place the page title at the very top surrounded by `<h1> .. </h1>` tags.  Upon rendering the view, it will be automatically extracted and used as a replacement to the &lt;s:page_title&gt; tag, allowing designers to place page titles within complex HTML structures.

For example:

~~~
<h1>Hosting Services</h1>

<p>Below details our hosting services that are on offer.</p>
~~~

When the view is rendered, `<h1>Hosting Services</h1>` will be extracted out of the view, and used in place of all occurrences of the &lt;s:page_title&gt; tag.  This allows designers to place page titles within complex HTML snippets, while keeping things simplistic for back-end developers.




