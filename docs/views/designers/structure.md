
# Designers - File / Directory Structure

There are three pertinent directories:

Directory | Description
------------- |------------- 
views/theme/ | The theme itself, see below for details.
public/theme/ | All public assets for the theme (ie. CSS, Javascript, images, et al).
views/html/ | The body contents of pages.


## Theme Structure

The theme itself is located within the ~/views/theme/ directory, and consists of the following:

File / Directory | Description
------------- |------------- 
layouts/ | The supported page layouts (eg. full width, 2 column left sidebar, et al).  One layout is overlayed onto each template rendered.  See below for details.
includes/ | Any includes necessary for the theme, such as header and footer.
tags.txt | Contains all HTML snippets the various &lt;s:...&gt; tags are replaced with. 


## Public Assets

All public assets (ie. images, CSS, Javascript, et al) should be placed within the ~/public/theme/ directory.  Within the templates or layout files, simply link to this directory with `/members`/, for example:

<pre><code class="prettyPrint">
    &lt;link href="/theme/css/styles.css" rel="stylesheet" type="text/css" /&gt;
</code></pre>


### Includes

Within the ~/views/theme/includes directory you will find a default header and footer, which are rather self-exclamatory.  You may add files as desired to this directory, and the contents can be included within any file via &lt;s:include <i>filename</i>&gt; tags, for example:

<pre><code>&lt;s:include sidebar&gt;</code></pre>

That's it, and that tag will be replaced with the contents of the ~/views/theme/includes/sidebar.html file.


### Layouts

One layout is applied to every template rendered, allowing different pages to have different layouts (eg. full width, two column left sidebar, et al).  The /layouts/ sub-directory of the theme contains all layouts, which can be named anything you wish.  

Structure the layout any way as you wish using the includes described above for components such as header and footer.  Within each layout, place the following template tag:

<pre><code>&lt;s:page_contents&gt;</code></pre>

The above tag will be replaced with the body contents of the page being viewed.  You may define which layout to use for each page by adding a &lt;s:layout <i>FILENAME</i>&gt; tag anywhere within the body page, for example:

<pre><code>&lt;s:layout gallery&gt;</code></pre>

If the above tag is present within the template, the page will be rendered utilizing the gallery.html layout.  If no &lt;s:layout&gt; tag is found within the template, it will utilize the default.html layout.


### tags.txt File

This file contains all the various HTML snippets that the <code>&lt;s:...&gt;</code> template tags are replaced with, such as tab controls, data tables, callouts, et al.  This provides standardization to the templates, and allows the themes to be interchangeable.  Although the <code>&lt;s:...&gt;</code> tags remain the same, the HTML snippets they are replaced with can differ from theme to theme.

The file itself should be rather straight forward, but each entry is the same, for example:

~~~
[[form_table]]
@default(width=95%, align=left)

<table border="0" cellpadding="6" cellspacing="6" style="width: ~width~; align: ~align~;">
    ~contents~
</table>
~~~

The <code>&lt;s:form_table&gt;</code> tag would be replaced with the above snippet, which allows for the attributes "width" and "align" that default to "95%" and "left" respectively.




