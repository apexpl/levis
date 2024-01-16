
# Designers - Yield / Var Tags

As stated within the [File / Directory Structure](structure.md) page, all page layouts are stored within the /views/theme/layouts/ directory, and you may define which layout is utilized for each template by adding the &lt;s:layout <i>FILENAME</i>&gt; tag anywhere within the template body page.

Within the layout pages you may add &lt;s:yield <i>ALIAS</i>&gt; tags anywhere you wish, then within the body template files, you may place the corresponding &gt;s:var <i>ALIAS</i>&gt; ... &lt;/s:var&gt; tags, the contents of which the yield tags will be replaced with.  This allows you to place customizable blocks within the layout files, the contents of which are then defined within the template body pages themselves.


## Example

For example, you may have a layout file named cool-layout.html with the contents:

<pre><code class="prettyPrint">
&lt;s:include header&gt&gt;

&lt;div class="some-wrapper"&gt;
    &lt;s:yield headline&gt;
&lt;/div&gt;

&lt;s:page_contents&gt;

&lt;s:include footer&gt;
</code></pre>


Within a body template file within the /views/html/ directory, you could then have for example:

<pre><code class="prettyPrint">
&lt;s:layout cool-layout&gt;

&lt;s:var headline&gt;Some Cool Headline&lt;/s:var&gt;

&lt;p&gt;The rest of the page contents...&lt;/p&gt;
</code></pre>

With the above example, when the page is rendered, the &lt;s:yield&gt; tag within the layout file will be replaced with "Some Cool Headline".  Again, this simply allows you to place placeholders within the layout files, and allow the contents to be specific to each page.




