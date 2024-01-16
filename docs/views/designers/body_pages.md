
# Designers - Body Content Pages

The ~views/html/ directory contains all the body content pages for the site, and although not always, are generally named by the URI being viewed within the browser.  For example, visiting http://domain.com/services will render the template located at ~/views/html/services.html.

When a template is rendered, the appropriate layout will be determined and applied.  The <code>&lt;s:page_contents&gt;</code> tag within the layout will be replaced with the contents of the body file.
For example, the initial default.html layout is:

<pre><code ckass="prettyPrint">
&lt;s:theme include="header.html"&gt;

&lt;s:page_contents&gt;

&lt;s:theme include="footer.html"&gt;
</code></pre>

If visiting the URL at https://domain.com/services/hosting, the <code>&lt;s:page_contents&gt;</code> tag in the above layout will be replaced with the contents of the file located at ~/views/html/services/hosting.html.

### Page Titles

When a template is rendered, the first set of <code>&lt;h1&gt; ... &gt;/h1&gt;</code> tags will be extracted from the template, and used as the replacement ofr the <code>&lt;s:page_title&gt;</code> tag.

This allows you as the designer to place the page title within a more complex HTML snippet, generally within the ~/includes/header.html file, while the back-end developers only need to place a set of <code>&lt;h1&gt; ... &lt;/h1&gt;</code> tags within each template.


