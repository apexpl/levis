
# &lt;s:callouts&gt;

The top messages / callouts used to display various success, error, and other information messages.  You as the designer only need to place the tag `&lt;s:callouts&gt;` once generally within the header include, and nothing more.  Syrus will automatically replace that with the appropriate messages and type upon parsing the template.

<h3>Example HTML</h3>

<pre><code class="prettyprint">&lt;s:callouts type="success" message="The action was performed successfully."&gt;

&lt;s:callouts type="error" message="We're sorry, an error occured."&gt;

&lt;s:callouts type="warning" message="Be careful, something might be amiss."&gt;

&lt;s:callouts type="info" message="A quick note you may be interested in."&gt;
</code></pre>

<p>,b>NOTE:</b>  Again, the above are for demonstration purposes only, and you as the designer do not need to place any attributes within this tag.  Instead, within the header tag simply add the `&lt;s:callouts&gt;` tag once, and nothing more.  Syrus will replace it as needed depending on what callout messages the back-end software added during the request.


<h3>Example Output</h3>

<s:callouts type="success" message="The action was performed successfully.">

<s:callouts type="error" message="We're sorry, an error occured.">

<s:callouts type="warning" message="Be careful, something might be amiss.">

<s:callouts type="info" message="A quick note you may be interested in.">


