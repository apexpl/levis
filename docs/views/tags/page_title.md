
# &lt;s:page_title&gt;

<p>Simply gets replaced with the title of the web page currently being viewed, and generally only needs to be placed within the header inside the `&lt;title&gt;` tag, and once at the top of the header inside `&lt;h1&gt;` tags or similar.</p>

<p><b>NOTE:</b> If auto extracting of page titles is turned on, Syrus will search for and remove the first occurrence of `&lt;&gt;h1&lt;/h1&gt;` tags within the body file of the template, and use that as the page title.  This allows you as the designer to place page titles within more complex HTML structures, while back-end developers only need to place `&lt;h1&gt;` tags at the top of each template.  Auto extraction of page titles is turned on by default, but can be turned off within the /config/container.php file.</p>


<h3>Example HTML</h3>

<pre><code class="prettyprint">
&lt;s:page_title&gt;
</code></pre><br />

<h3>Example Output</h3>

My Web Site


